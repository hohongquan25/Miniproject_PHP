<?php

class Index extends Controller {

	private $list;

    public function __construct(){
        $this->list = new Model();
    }

    public function getList(){
    	$model = new Model();
        $rows = $model->getAllProduct();
        return $rows;
    }
}
?>