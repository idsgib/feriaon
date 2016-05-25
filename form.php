<?php
//moodleform is defined in formslib.php
require_once("$CFG->libdir/formslib.php");
 
class simplehtml_form extends moodleform {
    //Add elements to form
    public function definition() {
        global $CFG;
 
        $mform = $this->_form; // Don't forget the underscore! 
 
        $mform->addElement('text', 'nombre', get_string('name')); // AGREGAR NOMBRE
        $mform->setType('nombre', PARAM_NOTAGS);                   //
        
        
        $mform->addElement('text', 'email', get_string('email')); // EMAIL
        $mform->setType('email', PARAM_NOTAGS);                   //
      
        
        $mform->addElement('text', 'telefono', get_string('phone')); // TELEFONO
        $mform->setType('telefono', PARAM_NOTAGS);                   //
      
        // AGREGAR DESCRIPCION DE PROYECTO
        $mform->addElement('textarea', 'introduction', get_string("descripcion", "survey"), 'wrap="virtual" rows="6" cols="90"');
        
        //AGREGAR ARCHIVOS COMO PDF, PPT, ETC
        $mform->addElement('filepicker', 'userfile', get_string('file'), null,
                   array('maxbytes' => $maxbytes, 'accepted_types' => '*'));
        
        // BOTON DE UPLOAD
    $mform->addElement('button', 'intro', get_string("upload"));       
    
    $this->add_action_buttons();
    }
    
    //VALIDACION EXIGIDA POR MOODLE
    function validation($data, $files) {
        return array();
    }
}
        ?>
