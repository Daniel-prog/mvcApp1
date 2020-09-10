<?php

class ProductsController extends Controller {

    private $pageTpl = "/views/products.tpl.php";

    public function __construct() {
        $this->model = new ProductsModel();
        $this->view = new View();
    }

    public function index() {
        if(!$_SESSION['user']) {
            header("Location: /");
        }
        //$this->pageData['products'] = $this->model->getAllProducts();
        $this->pageData['title'] = "Товары";
        $this->view->render($this->pageTpl, $this->pageData);
    }

}