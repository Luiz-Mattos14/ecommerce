<?php
namespace Controllers;

use \Core\Controller;
use \Models\Products;
use \Models\Categories;
use \Models\Filters;

class SearchController extends Controller {
	
	public function index() {
        $array = array();
		$category = new Categories();
		$products = new Products();
        $f = new Filters();
        $array['categories'] = $category->getAllCategories();

        if(!empty($_GET['s'])){
            $searchTerm = $_GET['s'];
            $category = isset($_GET['category']);

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

            $filters['searchTerm'] = $searchTerm;
            $filters['category'] = $category;

			$array['list'] = $products->getList($offset, $limit, $filters);
			$array['filters'] = $f->getFilters($filters);
			$array['filter_select'] = $filters;

            $array['searchTerm'] = $searchTerm;
			$array['category'] = $category;

			$this->loadTemplate('search', $array);

        } else {
            header("Location: ".BASE_URL);
            exit;
        }
                   
	}

}