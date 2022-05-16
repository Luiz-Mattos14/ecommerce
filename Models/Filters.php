<?php
namespace Models;

use \Core\Model;

class Filters extends Model {

   public function getFilters($filters) {
       $products = new Products();
       $brands = new Brands();

       $array = array(
           'searchTerm' => '',
           'brands' => array(),
           'slider0' => 0,
           'slider1' => 0,
           'maxslider' => 1000,
           'stars' => array(
               '0' => 0,
               '1' => 0,
               '2' => 0,
               '3' => 0,
               '4' => 0,
               '5' => 0
           ),
           'promotion' => false,
           'options' => array()
       );

       if(isset($filters['searchTerm'])) {
           $array['searchTerm'] = $filters['searchTerm'];
       }

       $array['brands'] = $brands->getList();
       $brandProducts = $products->getListOfBrands($filters);

       foreach($array['brands'] as $mkey => $mitem) {

            $array['brands'] [$mkey] ['count'] = '0';

            foreach($brandProducts as $mprodutos) {
                if($mprodutos['id_brand'] == $mitem['id_brand']) {
                    $array['brands'] [$mkey] ['count'] = $mprodutos['c'];
                }

            }

                if($array['brands'] [$mkey] ['count'] == '0') {
                    unset($array['brands'] [$mkey]);
                }
        }

        $array['promotion'] = $products->getSaleCount($filters);

        return $array;
   }

}