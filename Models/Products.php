<?php
namespace Models;

use \Core\Model;

class Products extends Model {

    public function getInfo($id) {
        $array = array();

        $sql = "SELECT * FROM products WHERE id_product = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->execute();

        if($sql->rowCount() > 0) {

            $array = $sql->fetch();
            $images = current($this->getImagesByProductId($id));
            $array['images'] = $images['url'];
        }

        return $array;
    }

    public function getProductInfo($id) {
        $array = array();

        if(!empty($id)) {
            $sql = "SELECT        
            *,
            (select brands.brand_name from brands where brands.id_brand = products.id_product ) as brand_name
            FROM products WHERE id_product = :id";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(":id", $id);
            $sql->execute();

            if($sql->rowCount() > 0) {
                $array = $sql->fetch();
            }
        }

        return $array;
    }


	public function getListAll() {
		$array = array();
		
		$sql = "SELECT *,
			(select categories.category_name from categories where categories.id_category = products.id_category) as categories_name
			 FROM products";
		$sql = $this->db->prepare($sql);

		$sql->execute();

		if($sql->rowCount() > 0) {
			$array = $sql->fetchAll();

			foreach($array as $key => $item) {
				$array[$key]['images'] = $this->getImagesByProductId($item["id_product"]);
			}
		}

		return $array;
	}

	public function getList($offset = 0, $limit = 4, $filters = array(), $random = false) {
		$array = array();

		$orderBySQL = '';
        if($random == true) {
            $orderBySQL = "ORDER BY RAND()";
        }

		if(!empty($filters['product_review'])) {
            $orderBySQL = "ORDER BY product_review DESC";
        }
		
		$where = $this->buildWhere($filters);

		$sql = "SELECT *,
			(select brands.brand_name from brands where brands.id_brand = products.id_brand) as brand_name,
			(select categories.category_name from categories where categories.id_category = products.id_category) as categories_name
			 FROM products
			 WHERE ".implode(' AND ', $where)."
        ".$orderBySQL."
        LIMIT $offset, $limit";
		$sql = $this->db->prepare($sql);

		$this->bindWhere($filters, $sql);
		
		$sql->execute();

		if($sql->rowCount() > 0) {
			$array = $sql->fetchAll();

			foreach($array as $key => $item) {
				$array[$key]['images'] = $this->getImagesByProductId($item["id_product"]);
			}
		}

		return $array;
	}

	public function getImagesByProductId($id) {
		$array = array();

		$sql = "SELECT url FROM product_images WHERE id_product = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(":id", $id);
		$sql->execute();

		if($sql->rowCount() > 0){
			$array = $sql->fetchAll();
		}

		return $array;
	}

	public function getListOfBrands($filters = array()){
		$array = array();

		$where = $this->buildWhere($filters);

		$sql = "SELECT id_brand,
		COUNT(id_brand) as c
		FROM products WHERE ".implode(' AND ', $where)."
		GROUP BY id_brand";
		$sql = $this->db->prepare($sql);

		$this->bindWhere($filters, $sql);

		$sql->execute();

		if($sql->rowCount() > 0) {
			$array = $sql->fetchAll();
		}

		return $array;
	}

	public function getSaleCount($filters = array()) {
        $where = $this->buildWhere($filters);

        $where[] = 'promotion = "1"';

        $sql = "SELECT 
        COUNT(*) as c 
        FROM products 
        WHERE ".implode(' AND ', $where);
        $sql = $this->db->prepare($sql);

        $this->bindWhere($filters, $sql);

        $sql->execute();

        if($sql->rowCount() > 0) {
            $sql =$sql->fetch();

            return $sql['c'];
        } else {
            return '0';
        }
    }

    public function getOptionsByProductId($id) {
        $options = array();

        $sql = "SELECT options FROM products WHERE id_product = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->execute();

        if($sql->rowCount() > 0) {
            $options = $sql->fetch();
            $options = $options['options'];

            if(!empty($options)) {
                $sql = "SELECT * FROM options WHERE id_option IN (".$options.")";
                $sql = $this->db->query($sql);
                $options = $sql->fetchAll();

            }

            $sql = "SELECT * FROM options_product WHERE id_option = :id";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(":id", $id);
            $sql->execute();

            $option_values = array();
            if($sql->rowCount() > 0) {
                foreach($sql->fetchAll() as $op) {

                    $option_values[$op['id_option']] = $op['p_values'];
                }
            }
            foreach ($options as $ok => $op) {
                if(isset($option_values[$op['id_option']])){
                $options[$ok]['value'] = $option_values[$op['id_option']];
                } else {
                    $options[$ok]['value'] = "";
                }
            }
        }

        return $options;
    }

    public function getRates($id, $qt) {
        $array = array();

        $ratings = new Ratings();

        $array = $ratings->getRates($id, $qt);

        return $array;
    }

	private function buildWhere($filters) {
        $where = array(
            '1=1'
        );

        if(!empty($filters['category'])){
            $where[] = "id_category = :id_category";
        }
        
        if(!empty($filters['brand'])){
            $where[] = "id_brand IN ('".implode("','", $filters['brand'])."')";
        }

        if(!empty($filters['estrela'])){
            $where[] = "avaliacao_produto IN ('".implode("','", $filters['estrela'])."')";
        }

		if(!empty($filters['new_product'])){
            $where[] = "new_product = '1'";
        }
        
        if(!empty($filters['promotion'])){
            $where[] = "promotion = '1'";
        }

        if(!empty($filters['featured'])){
            $where[] = "featured = '1'";
        }

        if(!empty($filters['opcoes'])){
            $where[] = "id_produto IN (select id_produto from tb_produtos_opcoes where tb_produtos_opcoes.p_valores IN ('".implode("','", $filters['opcoes'])."') )";
        }

        if(!empty($filters['slider0'])){
            $where[] = "preco_venda >= :slider0";
        }

        if(!empty($filters['slider1'])){
            $where[] = "preco_venda <= :slider1";
        }

        if(!empty($filters['searchTerm'])){
            $where[] = "product_name LIKE :searchTerm";
        }
    
        return $where;
    }

	private function bindWhere($filters, &$sql) {
        if(!empty($filters['category'])) {
            $sql->bindValue(":id_category", $filters['category']);
        }
        
        if(!empty($filters['slider0'])){
            $sql->bindValue(":slider0", $filters['slider0']);
        }

        if(!empty($filters['slider1'])){
            $sql->bindValue(":slider1", $filters['slider1']);
        }

        if(!empty($filters['searchTerm'])){
            $sql->bindValue(":searchTerm", '%'.$filters['searchTerm'].'%');
        }
    }



}