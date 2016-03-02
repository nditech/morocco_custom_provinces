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
    'overwrite' => TRUE,
    'countryIso' => 'MA',
    'states' => array(
      // 'state name' => 'abbreviation',
      'AGADIR IDA OU TANAN' => 'AGD',
      'AL HAOUZ' => 'HAO',
      'AL HOCEIMA' => 'HOC',
      'AOUSSERD' => 'OUS',
      'ASSA ZAG' => 'ASZ',
      'AZILAL' => 'AZI',
      'BENI MELLAL' => 'MEL',
      'BENSLIMANE' => 'BSL',
      'BERCHID' => 'BER',
      'BERKANE' => 'BRK',
      'BOUJDOUR' => 'BJD',
      'BOULEMANE' => 'BLM',
      'CASABLANCA' => 'CAS',
      'CHEFCHAOUEN' => 'CHF',
      'CHICHAOUA' => 'CHI',
      'CHTOUKA AIT BAHA' => 'BAH',
      'DARYOUCH' => 'DRY',
      'EL HAJEB' => 'HAJ',
      'EL JADIDA' => 'JAD',
      'EL KELAA DES SRAGHNA' => 'KES',
      'ERRACHIDIA' => 'ERR',
      'ESSAOUIRA' => 'SOU',
      'ESSEMARA' => 'SMA',
      'FAHS ANJRA' => 'FHS',
      'FES' => 'FES',
      'FIGUIG' => 'FIG',
      'FQUIH BEN SALEH' => 'FBS',
      'GUELMIM' => 'GLM',
      'GUERSIF' => 'GRF',
      'IFRANE' => 'IFR',
      'INEZGANE AIT MELLOUL' => 'INZ',
      'JERADA' => 'JER',
      'KENITRA' => 'KEN',
      'KHEMISSET' => 'KHM',
      'KHENIFRA' => 'KHN',
      'KHOURIBGA' => 'KHG',
      'LAAYOUNE' => 'LAY',
      'LARACHE' => 'LAR',
      'MARRAKECH' => 'MAR',
      "M'DIQ - FNIDQ" => 'MDQ',
      'MEDIOUNA' => 'MDN',
      'MEKNES' => 'MEK',
      'MIDELT' => 'MID',
      'MOHAMMEDIA' => 'MOH',
      'MOULAY YACOUB' => 'MLY',
      'NADOR' => 'NAD',
      'NOUACEUR' => 'NCR',
      'OUARZAZATE' => 'OAR',
      'OUAZZAN' => 'OAZ',
      'OUED ED-DAHAB' => 'ODH',
      'OUJDA ANGAD' => 'OUJ',
      'RABAT' => 'RBA',
      'RHAMNA' => 'RHA',
      'SAFI' => 'SAF',
      'SALE' => 'SAL',
      'SEFROU' => 'SEF',
      'SETTAT' => 'SET',
      'SIDI BANOUR' => 'BEN',
      'SIDI IFNI' => 'IFN',
      'SIDI KACEM' => 'SKA',
      'SIDI SLIMAN' => 'SLM',
      'SKHIRATE-TEMARA' => 'SKH',
      'TAN TAN' => 'TAN',
      'TANGER ASSILAH' => 'TNG',
      'TAOUNATE' => 'TAO',
      'TAOURIRT' => 'TOR',
      'TAROUDANNT' => 'TAR',
      'TATA' => 'TAT',
      'TAZA' => 'TAZ',
      'TARFAYA' => 'TRF',
      'TETOUAN' => 'TET',
      'TINGHIR' => 'TIN',
      'TIZNIT' => 'TIZ',
      'YOUSSOUFIA' => 'YSF',
      'ZAGORA' => 'ZAG',
      
    ),
    'rewrites' => array(
      // List states to rewrite in the format:
      // 'Default State Name' => 'Corrected State Name',
      'Agadir' => 'AGADIR IDA OU TANAN',
      'Al Haouz' => 'AL HAOUZ',
      'Al Hoceïma' => 'AL HOCEIMA',
      'Assa-Zag' => 'ASSA ZAG',
      'Azilal' => 'AZILAL',
      'Beni Mellal' => 'BENI MELLAL',
      'Ben Sllmane' => 'BENSLIMANE',
      'Berkane' => 'BERKANE',
      'Boujdour' => 'BOUJDOUR',
      'Boulemane' => 'BOULEMANE',
      'Casablanca [Dar el Beïda]' => 'CASABLANCA',
      'Chefchaouene' => 'CHEFCHAOUEN',
      'Chichaoua' => 'CHICHAOUA',
      'El Hajeb' => 'EL HAJEB',
      'El Jadida' => 'EL JADIDA',
      'Errachidia' => 'ERRACHIDIA',
      'Essaouira' => 'ESSAOUIRA',
      'Es Smara' => 'ESSEMARA',
      'Fès' => 'FES',
      'Figuig' => 'FIGUIG',
      'Guelmim' => 'GUELMIM',
      'Ifrane' => 'IFRANE',
      'Jerada' => 'JERADA',
      'Kénitra' => 'KENITRA',
      'Khemisaet' => 'KHEMISSET',
      'Khenifra' => 'KHENIFRA',
      'Khouribga' => 'KHOURIBGA',
      'Laâyoune (EH)' => 'LAAYOUNE',
      'Larache' => 'LARACHE',
      'Marrakech' => 'MARRAKECH',
      'Meknsès' => 'MEKNES',
      'Nador' => 'NADOR',
      'Ouarzazate' => 'OUARZAZATE',
      'Oued ed Dahab (EH)' => 'OUED ED-DAHAB',
      'Oujda' => 'OUJDA ANGAD',
      'Rabat-Salé' => 'RABAT',
      'Safi' => 'SAFI',
      'Sefrou' => 'SEFROU',
      'Settat' => 'SETTAT',
      'Sidl Kacem' => 'SIDI KACEM',
      'Tan-Tan' => 'TAN TAN',
      'Tanger' => 'TANGER ASSILAH',
      'Taounate' => 'TAOUNATE',
      'Taroudannt' => 'TAROUDANNT',
      'Tata' => 'TATA',
      'Taza' => 'TAZA',
      'Tétouan' => 'TETOUAN',
      'Tiznit' => 'TIZNIT',
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

  $statesToAdd = $stateConfig['states'];

  try {
    $countryId = civicrm_api3('Country', 'getvalue', array(
      'return' => 'id',
      'iso_code' => $stateConfig['countryIso'],
    ));
  }
  catch (CiviCRM_API3_Exception $e) {
    $error = $e->getMessage();
    CRM_Core_Error::debug_log_message(ts('API Error: %1', array(
      'domain' => 'org.ndi.moroccoprovinces',
      1 => $error,
    )));
    return FALSE;
  }

  // Rewrite states.
  if (!empty($stateConfig['rewrites'])) {
    foreach ($stateConfig['rewrites'] as $old => $new) {
      $sql = 'UPDATE civicrm_state_province SET name = %1 WHERE name = %2 and country_id = %3';
      $stateParams = array(
        1 => array(
          $new,
          'String',
        ),
        2 => array(
          $old,
          'String',
        ),
        3 => array(
          $countryId,
          'Integer',
        ),
      );
      CRM_Core_DAO::executeQuery($sql, $stateParams);
    }
  }

  // Find states that are already there.
  $stateIdsToKeep = array();
  foreach ($statesToAdd as $state => $abbr) {
    $sql = 'SELECT id FROM civicrm_state_province WHERE name = %1 AND country_id = %2 LIMIT 1';
    $stateParams = array(
      1 => array(
        $state,
        'String',
      ),
      2 => array(
        $countryId,
        'Integer',
      ),
    );
    $foundState = CRM_Core_DAO::singleValueQuery($sql, $stateParams);

    if ($foundState) {
      unset($statesToAdd[$state]);
      $stateIdsToKeep[] = $foundState;
      continue;
    }
  }

  // Wipe out states to remove.
  if (!empty($stateConfig['overwrite'])) {
    $sql = 'SELECT id FROM civicrm_state_province WHERE country_id = %1';
    $params = array(
      1 => array(
        $countryId,
        'Integer',
      ),
    );
    $dbStates = CRM_Core_DAO::executeQuery($sql, $params);
    $deleteIds = array();
    while ($dbStates->fetch()) {
      if (!in_array($dbStates->id, $stateIdsToKeep)) {
        $deleteIds[] = $dbStates->id;
      }
    }

    // Go delete the remaining old ones.
    foreach ($deleteIds as $id) {
      $sql = "DELETE FROM civicrm_state_province WHERE id = %1";
      $params = array(
        1 => array(
          $id,
          'Integer',
        ),
      );
      CRM_Core_DAO::executeQuery($sql, $params);
    }
  }

  // Add new states.
  $insert = array();
  foreach ($statesToAdd as $state => $abbr) {
    $stateE = $dao->escape($state);
    $abbrE = $dao->escape($abbr);
    $insert[] = "('$stateE', '$abbrE', $countryId)";
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
