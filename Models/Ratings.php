<?php
namespace Models;

use \Core\Model;

class Ratings extends model {

    public function getRates($id, $qt) {
        $array = array();

        $sql = "SELECT 
        *,
        (select users.user_name from users WHERE users.id_user = assessments.id_user) as user_name
        FROM assessments 
        WHERE id_product = :id 
        ORDER BY date_assessments DESC 
        LIMIT ".$qt;

        $sql = $this->db->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->execute();

        if($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }

        return $array;
    }
}