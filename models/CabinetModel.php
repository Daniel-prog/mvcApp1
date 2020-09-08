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


}