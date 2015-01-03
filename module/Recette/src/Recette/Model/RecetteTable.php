<?php
namespace Recette\Model;

 use Zend\Db\TableGateway\TableGateway;

 class RecetteTable
 {
     protected $tableGateway;

     public function __construct(TableGateway $tableGateway)
     {
         $this->tableGateway = $tableGateway;
     }

     public function fetchAll()
     {
         $resultSet = $this->tableGateway->select();
         return $resultSet;
     }

     public function getRecette($idRecette)
     {
         $idRecette  = (int) $idRecette;
         $rowset = $this->tableGateway->select(array('idRecette' => $idRecette));
         $row = $rowset->current();
         if (!$row) {
             throw new \Exception("Could not find row $idRecette");
         }
         return $row;
     }

     public function saveRecette(Recette $recette)
     {
         $data = array(
             'aliments' => $recette->aliments,
             'titre'  => $recette->titre,
         );

         $idRecette = (int) $recette->idRecette;
         if ($idRecette == 0) {
             $this->tableGateway->insert($data);
         } else {
             if ($this->getRecette($idRecette)) {
                 $this->tableGateway->update($data, array('idRecette' => $idRecette));
             } else {
                 throw new \Exception('La recette n\'existe pas ');
             }
         }
     }

     public function deleteRecette($idRecette)
     {
         $this->tableGateway->delete(array('idRecette' => (int) $idRecette));
     }
 }
 ?>