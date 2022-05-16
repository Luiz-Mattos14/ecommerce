<?php
namespace Controllers;

use \Core\Controller;
use \Models\Categories;
use \Models\Products;
use \Models\Filters;

class CategoriesController extends Controller {

	public function index() {
        header("Location: ".BASE_URL);
    }

	public function enter($id) {
		$array = array();

		$category = new Categories();
		$products = new Products();
		$f = new Filters();

		
		$array['category_name'] = $category->getCategoryName($id);

		if(!empty($array['category_name'])) {

			$filters = array();

            if(!empty($_GET['filter']) && is_array($_GET['filter'])) {
                $filters = $_GET['filter'];
            }

			$paginaAtual = 1;
			$offset = 0;
			$limit = 10;
	
			if(!empty($_GET['p'])) {
				$paginaAtual = $_GET['p'];
			}

			$filters['category'] = $id;

			$array['list'] = $products->getList($offset, $limit, $filters);
			$array['categories'] = $category->getAllCategories();
			
			$array['id_category'] = $id;
			$array['filters'] = $f->getFilters($filters);
			$array['filter_select'] = $filters;



			$this->loadTemplate('categories', $array);
		} else {
			header("Location: ".BASE_URL);
			exit;
		}
	}

}