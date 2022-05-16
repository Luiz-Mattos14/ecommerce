<?php
namespace Models;

use \Core\Model;

class Categories extends Model {

    public function getAllCategories(){
        $array = array();

        $sql = "SELECT * FROM categories";
        $sql = $this->db->query($sql);
        $sql->execute();

        if($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }

        return $array;

    }

    public function getCategoryName($id) {
        $sql = "SELECT category_name FROM categories WHERE id_category = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql ->execute();

        if($sql->rowCount() > 0) {
            $sql = $sql->fetch();

            return $sql['category_name'];
        }
    }


}