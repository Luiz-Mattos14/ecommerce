<?php
namespace Models;

use \Core\Model;

class Options extends model {

    public function getName($id) {
        $sql = "SELECT option_name FROM options WHERE id_prions = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->execute();

        if($sql->rowCount() > 0) {
            $sql = $sql->fetch();
            return $sql['option_name'];
        }
    }
}