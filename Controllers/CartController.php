<?php
namespace Controllers;

use \Core\Controller;
use \Models\Products;
use \Models\Categories;

class CartController extends Controller {
	
	public function index() {
		$array = array();

		$category = new Categories();
		$products = new Products();

		

		$this->loadTemplate('cart', $array);
	}

    public function add() {

        if(!empty($_POST['id_product'])) {
            $id = intval($_POST['id_product']);
            $qt = intval($_POST['qt_product']);

            

            if(!isset($_SESSION['cart'])) {
                $_SESSION['cart'] = array();
            }

            if(isset($_SESSION['cart'][$id])) {
                $_SESSION['cart'][$id] += $qt;
            }else {
                $_SESSION['cart'][$id] = $qt;
            }
        }

        header("Location: ".BASE_URL."cart");
        exit;
    }

}