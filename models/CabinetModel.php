<?php

class CabinetModel extends Model {

    public function getOrdersCount() {
        $sql = "SELECT COUNT(*) FROM orders";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $res = $stmt->fetchColumn();
        return $res;
    }

    public function getProductsCount() {
        $sql = "SELECT COUNT(*) FROM products";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $res = $stmt->fetchColumn();
        return $res;
    }

    public function getUsersCount() {
        $sql = "SELECT COUNT(*) FROM users";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $res = $stmt->fetchColumn();
        return $res;
    }

    public function getOrders() {
        $sql = "SELECT 
                    orders.id as id,
                    orders.amount as total,
                    users.fullName,
                    users.email
                FROM orders
                INNER JOIN users ON users.id = orders.user_id
                ";
        $result = array();
        $stmt = $this->db->prepare($sql);
        $stmt->execute();

        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $result[$row['id']] = $row;
        }
        return $result;

    }


}