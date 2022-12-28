<?php

class Index extends Controller {
    
    public function __construct($view){
        $this->model = new product();
        $rows = $this->getList();

        $this->CreateView($view, ["rows"=>$rows]);
    }

    public function getList(){
        $rows = $this->model->getAllProduct();
        return $rows;
    }
}
?>