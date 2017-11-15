<?php

include_once "model/model_product.php";

class controller_product {

    private $model_product;

    public function __construct() {
        $this->model_product = new model_product();
        
        if(isset($_GET['action'])) {
            if($_GET['action']==count) {
                function get_count() {
                    
                }
            }
        }
    }
}
    
    

//echo '{staus:0,count:10}';
