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

        if ($_FILES) {
            if ($_FILES['csv']['type'] != 'text/csv' &&  $_FILES['csv']['type'] != 'application/vnd.ms-excel'
                    || $_FILES['csv']['type'] == '') {
                $this->pageData['errors'] = "Ошибка! Возможно данный файл имеет некорректный формат.";
            } else {
                if (move_uploaded_file($_FILES['csv']['tmp_name'], UPLOAD_DIR . $_FILES['csv']['name'])) {
                    $file = fopen(UPLOAD_DIR . $_FILES['csv']['name'], 'r');
                    unset($_FILES['csv']);

                    $row = 1;
                    while ($data = fgetcsv($file, 200, ';')) {
                        if ($row == 1) {
                            $row++;
                            continue;
                        } else {
                            $this->model->addFromCSV($data);
                        }

                    }
                    fclose($file);
                }

            }
        }
        $this->pageData['title'] = "Товары";
        $this->pageData['products'] = $this->model->getAllProducts();
        $this->view->render($this->pageTpl, $this->pageData);

    }

    public function getProduct() {
        if(!$_SESSION['user']) {
            header("Location: /");
            return;
        }

        if(!isset($_GET['id'])) {
            echo json_encode(array("success" => false));
        } else {
            $productId = $_GET['id'];
            $productInfo = json_encode($this->model->getProductById($productId));
            echo $productInfo;
        }
    }

}