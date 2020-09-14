<?php

class IndexModel extends Model {

    public function checkUser() {

        $login = $_POST['login'];
        $password = md5($_POST['password']);

        $sql = "SELECT * FROM users WHERE login = :login AND password = :password";

        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(":login", $login, PDO::PARAM_STR);
        $stmt->bindValue(":password", $password, PDO::PARAM_STR);
        $stmt->execute();


        $res = $stmt->fetch(PDO::FETCH_ASSOC);


        if(!empty($res)) {
            $_SESSION['user'] = $_POST['login'];
            $_SESSION['userId'] = $res['id'];
            $_SESSION['role_id'] = $res['role_id'];
            header("Location: /cabinet");
        } else {
            return false;
        }

    }

}