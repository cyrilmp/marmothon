<?php 
	namespace Recette\Form;

 use Zend\Form\Form;

 class RecetteForm extends Form
 {
     public function __construct($name = null)
     {
         // we want to ignore the name passed
         parent::__construct('recette');

         $this->add(array(
             'name' => 'idRecette',
             'type' => 'Hidden',
         ));
         $this->add(array(
             'name' => 'titre',
             'type' => 'Text',
             'options' => array(
                 'label' => 'titre',
             ),
         ));
         $this->add(array(
             'name' => 'aliments',
             'type' => 'Text',
             'options' => array(
                 'label' => 'aliments',
             ),
         ));
         $this->add(array(
             'name' => 'submit',
             'type' => 'Submit',
             'attributes' => array(
                 'value' => 'Go',
                 'id' => 'submitbutton',
             ),
         ));
     }
 }
 ?>