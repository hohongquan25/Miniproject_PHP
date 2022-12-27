<?php

class Index extends Controller {

	private $model;
    public function __construct($view){
        $this->model = new Model();
        $rows = $this->getList();

        $this->CreateView($view, ["rows"=>$rows]);
    }

    public function getList(){
        $rows = $this->model->getAllProduct();
        return $rows;
    }
}
?>