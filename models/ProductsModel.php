<?php

class ProductsModel extends Model {

    public function getAllProducts() {
        $result = array();
        $sql = 'SELECT * FROM products';
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $result[$row['id']] = $row;
        }

        return $result;

    }

    public function addFromCSV($data) {
        $sql = "SELECT EXISTS(SELECT 1 FROM products WHERE name=:name LIMIT 1)";
        $nameExists = $this->db->prepare($sql);
        $nameExists->bindValue(":name", $data[0], PDO::PARAM_STR);
        $nameExists->execute();

        if (!$nameExists->fetch(PDO::FETCH_NUM)[0]) {
            $sql = 'INSERT INTO products(name, price) VALUES(:name, :price)';

            $stmt = $this->db->prepare($sql);
            $stmt->bindValue(':name', $data[0], PDO::PARAM_STR);
            $stmt->bindValue(':price', $data[1], PDO::PARAM_INT);
            $stmt->execute();

        }

    }
}