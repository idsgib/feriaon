<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 *
 * @package local
 * @subpackage tics331
 * @copyright 2012-onwards Jorge Villalon <jorge.villalon@uai.cl>
 * @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
// Minimum for Moodle to work, the basic libraries
require_once(dirname(dirname(dirname(__FILE__))) . '/config.php');


// Moodle pages require a context, that can be system, course or module (activity or resource)
$context = context_system::instance();
$PAGE->set_context($context);

// Check that user is logued in the course.
require_login();

// Page navigation and URL settings(DATOS DE LA PAGINA).
$PAGE->set_url(new moodle_url('/local/tics331'));
$PAGE->set_pagelayout('incourse');
$PAGE->set_title('Sube tu proyecto!');

$PAGE->navbar->ignore_active();
$PAGE->navbar->add(get_string('home'), new moodle_url('/a/link/if/you/want/one.php'));
$PAGE->navbar->add(get_string('upload'), new moodle_url('/a/link/if/you/want/one.php'));

// Show the page header(ENCABEZADO DE PAGINA)
echo $OUTPUT->header();

// Here goes the content
echo 'SUBE TU PROYECTO';


//FORMULARIO PARA SUBIR PROYECTOS
require_once('/form.php');
 
//Instantiate simplehtml_form 
$mform = new simplehtml_form();
 
//Form processing and displaying is done here
if ($mform->is_cancelled()) {
    //Handle form cancel operation, if cancel button is present on form
} else if ($fromform = $mform->get_data()) {
  //In this case you process validated data. $mform->get_data() returns data posted in form.
    
    // Acá sabemos que nos mandaron data
    var_dump($mform->get_data());echo "<hr>";
    var_dump($mform->get_data()->nombre_proyecto);
    die();
    $proyecto = new stdClass();
    $proyecto->nombre_proyecto = $mform->get_data()->nombre_proyecto;
    $proyecto->clasificacion = $mform->get_data()->clasificacion;
    
    $exitoso = $DB->insert_record('proyecto', $proyecto); // La tabla proy hay que crearla
} else {
  // this branch is executed if the form is submitted but the data doesn't validate and the form should be redisplayed
  // or on the first display of the form.
 
  //Set default data (if any)
  $mform->set_data($toform);
          
          $proyectos = $DB->get_records('proyecto', array('id'=>0));
          
          foreach($proyectos as $proyecto) {
              echo $proyecto->nombre_proyecto;
          }
          
  //DESPLEGAR FORMULARIO
  $mform->display();
}     


// Show the page footer
echo $OUTPUT->footer();