<?php

class ProductsController extends Controller {

    private $pageTpl = "/views/products.tpl.php";

    public function __construct() {
        $this->model = new ProductsModel();
        $this->view = new View();
    }

    public function index() {
        echo 1;
    }

}