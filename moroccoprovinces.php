<?php

/**
 * Provide config options for the extension.
 *
 * @return array
 *   Array of:
 *   - whether to remove existing states/provinces,
 *   - ISO abbreviation of the country,
 *   - list of states/provinces with abbreviation,
 *   - list of states/provinces to rename,
 */
function moroccoprovinces_stateConfig() {
  $config = array(
    // CAUTION: only use `overwrite` on fresh databases.
    'overwrite' => FALSE,
    'countryIso' => 'MA',
    'states' => array(
      // 'state name' => 'abbreviation',
      'AGADIR IDA OU TANAN' => '1',
      'AL HAOUZ' => '2',
      'AL HOCEIMA' => '3',
      'AOUSSERD' => '4',
      'ASSA ZAG' => '5',
      'AZILAL' => '6',
      'BENI MELLAL' => '7',
      'BENSLIMANE' => '8',
      'BERCHID' => '9',
      'BERKANE' => '10',
      'BOUJDOUR' => '11',
      'BOULEMANE' => '12',
      'CASABLANCA' => '13',
      'CHEFCHAOUEN' => '14',
      'CHICHAOUA' => '15',
      'CHTOUKA AIT BAHA' => '16',
      'DARYOUCH' => '17',
      'EL HAJEB' => '18',
      'EL JADIDA' => '19',
      'EL KELAA DES SRAGHNA' => '20',
      'ERRACHIDIA' => '21',
      'ES SEMARA' => '22',
      'ESSAOUIRA' => '23',
      'FAHS ANJRA' => '24',
      'FES' => '25',
      'FIGUIG' => '26',
      'FQUIH BEN SALEH' => '27',
      'GUELMIM' => '28',
      'GUERSIF' => '29',
      'IFRANE' => '30',
      'INEZGANE AIT MELLOUL' => '31',
      'JERADA' => '32',
      'KENITRA' => '33',
      'KHEMISSET' => '34',
      'KHENIFRA' => '35',
      'KHOURIBGA' => '36',
      'LAAYOUNE' => '37',
      'LARACHE' => '38',
      'M\'DIQ - FNIDQ' => '39',
      'MARRAKECH' => '40',
      'MEDIOUNA' => '41',
      'MEKNES' => '42',
      'MIDELT' => '43',
      'MOHAMMEDIA' => '44',
      'MOULAY YACOUB' => '45',
      'NADOR' => '46',
      'NOUACEUR' => '47',
      'OUARZAZATE' => '48',
      'OUAZZAN' => '49',
      'OUED ED-DAHAB' => '50',
      'OUJDA ANGAD' => '51',
      'RABAT' => '52',
      'RHAMNA' => '53',
      'SAFI' => '54',
      'SALE' => '55',
      'SEFROU' => '56',
      'SETTAT' => '57',
      'SIDI BANOUR' => '58',
      'SIDI IFNI' => '59',
      'SIDI KACEM' => '60',
      'SIDI SLIMAN' => '61',
      'SKHIRATE-TEMARA' => '62',
      'TAN TAN' => '63',
      'TANGER ASSILAH' => '64',
      'TAOUNATE' => '65',
      'TAOURIRT' => '66',
      'TARFAYA' => '67',
      'TAROUDANNT' => '68',
      'TATA' => '69',
      'TAZA' => '70',
      'TETOUAN' => '71',
      'TINGHIR' => '72',
      'TIZNIT' => '73',
      'YOUSSOUFIA' => '74',
      'ZAGORA' => '75',
    ),
    'rewrites' => array(
      // List states to rewrite in the format:
      // 'Default State Name' => 'Corrected State Name',
    ),
  );
  return $config;
}

/**
 * Check and load states/provinces.
 *
 * @return bool
 *   Success true/false.
 */
function moroccoprovinces_loadProvinces() {
  $stateConfig = moroccoprovinces_stateConfig();

  if (empty($stateConfig['states']) || empty($stateConfig['countryIso'])) {
    return FALSE;
  }

  static $dao = NULL;
  if (!$dao) {
    $dao = new CRM_Core_DAO();
  }

  // Get array of states.
  try {
    $result = civicrm_api3('Country', 'getsingle', array(
      'iso_code' => $stateConfig['countryIso'],
      'api.Address.getoptions' => array(
        'field' => 'state_province_id',
        'country_id' => '$value.id',
        'sequential' => 0,
      ),
    ));
  }
  catch (CiviCRM_API3_Exception $e) {
    $error = $e->getMessage();
    CRM_Core_Error::debug_log_message(ts('API Error: %1', array(
      'domain' => 'com.aghstrategies.moroccoprovinces',
      1 => $error,
    )));
    return FALSE;
  }

  if (empty($result['api.Address.getoptions']['values'])) {
    return FALSE;
  }
  $states = $result['api.Address.getoptions']['values'];

  $foundStates = array();

  // Walk through states to add/remove them.
  foreach ($states as $key => $value) {
    if (empty($stateConfig['states'][$value])) {
      // No state found: check for rewrite.
      if (!empty($stateConfig['rewrites'][$value])) {
        // Rewrite the name.
        $query = "UPDATE civicrm_state_province SET name = %1 WHERE id = %2";
        $params = array(
          1 => $stateConfig['rewrites'][$value],
          2 => $key,
        );
        $foundStates[] = $stateConfig['rewrites'][$value];
      }
      // No rewrite--maybe overwrite?
      elseif (!empty($stateConfig['overwrite'])) {
        // NOTICE: this could cause data loss: only use `overwrite` on fresh
        // databases.
        $query = "DELETE FROM civicrm_state_province WHERE id = %1";
        $params = array(
          1 => $key,
        );
      }
    }
    else {
      $foundStates[] = $value;
    }
  }

  $statesToAdd = array_diff(array_keys($stateConfig['states']), $foundStates);

  $insert = array();
  foreach ($statesToAdd as $state) {
    $stateE = $dao->escape($state);
    $abbr = $dao->escape($stateConfig['states'][$state]);
    $insert[] = "('$stateE', $abbr, {$stateConfig['countryIso']})";
  }

  // Put it into queries of 50 states each.
  for ($i = 0; $i < count($insert); $i = $i + 50) {
    $inserts = array_slice($insert, $i, 50);
    $query = "INSERT INTO civicrm_state_province (name, abbreviation, country_id) VALUES ";
    $query .= implode(', ', $inserts);
    CRM_Core_DAO::executeQuery($query);
  }

  return TRUE;
}

/**
 * Implements hook_civicrm_install().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_install
 */
function moroccoprovinces_civicrm_install() {
  moroccoprovinces_loadProvinces();
}

/**
 * Implements hook_civicrm_enable().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_enable
 */
function moroccoprovinces_civicrm_enable() {
  moroccoprovinces_loadProvinces();
}

/**
 * Implements hook_civicrm_upgrade().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_upgrade
 */
function moroccoprovinces_civicrm_upgrade($op, CRM_Queue_Queue $queue = NULL) {
  moroccoprovinces_loadProvinces();
}
