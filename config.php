<?php  // Moodle configuration file

unset($CFG);
global $CFG;
$CFG = new stdClass();

$CFG->dbtype    = 'mariadb';
$CFG->dblibrary = 'native';
$CFG->dbhost    = 'localhost';
$CFG->dbname    = 'bitnami_moodle';
$CFG->dbuser    = 'bn_moodle';
$CFG->dbpass    = 'c3da59bac0';
$CFG->prefix    = 'mdl_';
$CFG->dboptions = array (
  'dbpersist' => 0,
  'dbport' => 3306,
  'dbsocket' => '',
);

if (empty($_SERVER['HTTP_HOST'])) {
    $_SERVER['HTTP_HOST'] = '127.0.0.1:80';
};

if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') {
    $CFG->wwwroot   = 'https://' . $_SERVER['HTTP_HOST'] . '/moodle';
} else {
    $CFG->wwwroot   = 'http://' . $_SERVER['HTTP_HOST'] . '/moodle';
};
$CFG->dataroot  = 'C:/xampp/apps/moodle/moodledata';
$CFG->admin     = 'admin';

$CFG->directorypermissions = 02775;

$CFG->passwordsaltmain = '37bcb8155dcc734cc980af3304608ee3e58fcc13de334050d71d8fa5456fc700';
require_once(dirname(__FILE__) . '/lib/setup.php');

// There is no php closing tag in this file,
// it is intentional because it prevents trailing whitespace problems!
