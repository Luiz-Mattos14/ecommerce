<?php
namespace Controllers;

use \Core\Controller;
use \Models\Products;
use \Models\Categories;
use \Models\Filters;

class ProductController extends Controller {

	public function index() {
        header("Location: ".BASE_URL);
    }

	public function open($id) {
		$array = array();

		$category = new Categories();
		$products = new Products();
		$f = new Filters();

		
		$array['categories'] = $category->getAllCategories();

        $filters = array();

        $info = $products->getProductInfo($id);

		if(count($info) > 0) {

            $array['info_product'] = $info;
            $array['product_images'] = $products->getImagesByProductId($id);            
            $array['product_option'] = $products->getOptionsByProductId($id);
            $array['product_review'] = $products->getRates($id, 5);


			$this->loadTemplate('product', $array);
		} else {
			header("Location: ".BASE_URL);
			exit;
		}
	}

}