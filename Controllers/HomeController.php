<?php
namespace Controllers;

use \Core\Controller;
use \Models\Products;
use \Models\Categories;

class HomeController extends Controller {
	
	public function index() {
		$array = array();

		$category = new Categories();
		$products = new Products();

		$filters = array();
		if(!empty($_GET['filter']) && is_array($_GET['filter'])) {
			$filters = $_GET['filter'];
		}

		$paginaAtual = 1;
        $offset = 0;
        $limit = 4;

        if(!empty($_GET['p'])) {
            $paginaAtual = $_GET['p'];
        }

        $offset = ($paginaAtual * $limit) - $limit;

		$array['categories'] = $category->getAllCategories();
		$array['list'] = $products->getList($offset, $limit, $filters);

		$array['produto_destaque1'] = $products->getList(0, 4, array('' => '1'), true);
        $array['featured'] = $products->getList(0, 4, array('featured' => '1'), true);
        $array['promotion'] = $products->getList(0, 4, array('promotion' => '1'), true);
        $array['new_product'] = $products->getList(0, 4, array('new_product' => '1'));

		$this->loadTemplate('home', $array);
	}

}