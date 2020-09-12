<?php

class ProfileModel extends Model {


    public function getAccountInfo($id) {

        $result = array();
        $sql = "SELECT id, login, email FROM users WHERE id = :id";

        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;

    }


    public function updateProfile($id, $login, $email) {

        $sql = "UPDATE users
				SET login = :login, email = :email
				WHERE id = :id";

        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(":login", $login, PDO::PARAM_STR);
        $stmt->bindValue(":email", $email, PDO::PARAM_STR);
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        return true;

    }

    public function updatePassword($id, $password) {

        $sql = "UPDATE users
				SET password = :password
				WHERE id = :id";

        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(":password", $password, PDO::PARAM_STR);
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        return true;

    }

}