<?php

namespace Recette\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Recette\Model\Recette;          // <-- Add this import
use Recette\Form\RecetteForm;

class RecetteController extends AbstractActionController {

    protected $recetteTable;

    public function indexAction() {
        return new ViewModel(array(
            'recettes' => $this->getRecetteTable()->fetchAll(),
        ));
    }

    public function editAction() {
        $id = (int) $this->params()->fromRoute('idRecette', 0);
        if (!$id) {
            return $this->redirect()->toRoute('recette', array(
                        'action' => 'add'
            ));
        }

        // Get the Album with the specified id.  An exception is thrown
        // if it cannot be found, in which case go to the index page.
        try {
            $recette = $this->getRecetteTable()->getRecette($id);
        } catch (\Exception $ex) {
            return $this->redirect()->toRoute('recette', array(
                        'action' => 'index'
            ));
        }

        $form = new RecetteForm();
        $form->bind($recette);
        $form->get('submit')->setAttribute('value', 'Edit');

        $request = $this->getRequest();
        if ($request->isPost()) {
            $form->setInputFilter($recette->getInputFilter());
            $form->setData($request->getPost());

            if ($form->isValid()) {
                $this->getRecetteTable()->saveRecette($recette);

                // Redirect to list of albums
                return $this->redirect()->toRoute('recette');
            }
        }

        return array(
            'idRecette' => $id,
            'form' => $form,
        );
    }

    public function deleteAction() {
        $id = (int) $this->params()->fromRoute('idRecette', 0);
        if (!$id) {
            return $this->redirect()->toRoute('recette');
        }

        $request = $this->getRequest();
        if ($request->isPost()) {
            $del = $request->getPost('del', 'No');

            if ($del == 'Yes') {
                $id = (int) $request->getPost('idRecette');
                $this->getRecetteTable()->deleteRecette($id);
            }

            // Redirect to list of albums
            return $this->redirect()->toRoute('recette');
        }

        return array(
            'idRecette' => $id,
            'recette' => $this->getRecetteTable()->getRecette($id)
        );
    }

    public function getRecetteTable() {
        if (!$this->recetteTable) {
            $sm = $this->getServiceLocator();
            $this->recetteTable = $sm->get('Recette\Model\RecetteTable');
        }
        return $this->recetteTable;
    }

    public function addAction() {
        $form = new RecetteForm();
        $form->get('submit')->setValue('Add');

        $request = $this->getRequest();
        if ($request->isPost()) {
            $recette = new Recette();
            $form->setInputFilter($recette->getInputFilter());
            $form->setData($request->getPost());

            if ($form->isValid()) {
                $recette->exchangeArray($form->getData());
                $this->getRecetteTable()->saveRecette($recette);

                // Redirect to list of albums
                return $this->redirect()->toRoute('recette');
            }
        }
        return array('form' => $form);
    }
    
   

}

?>