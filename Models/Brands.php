<?php
namespace Models;

use \Core\Model;

class Brands extends Model {

   public function getList() {
       $array = array();

       $sql = "SELECT * FROM brands";
       $sql = $this->db->query($sql);

       if($sql->rowCount() > 0){
           $array = $sql->fetchAll();
       }

       return $array;
   }

   public function getNameById($id) {

    $sql = "SELECT * FROM brands WHERE id_brand = :id";
    $sql = $this->db->prepare($sql);
    $sql = bindValue(":id", $id);
    $sql->execute();

    if($sql->rowCount() > 0){
        $array = $sql->fetch();

        return $array['brand_name'];
    } else {
        return '';
    }
   }

}