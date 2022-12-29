<?php

class Index extends BaseController {
    
    public function __construct($view){
        $this->model = new product();
        $rows = $this->getList();        
        $this->CreateView($view, ["rows"=>$rows]);
    }

    public function getList(){
        $rows = $this->model->get();
        return $rows;
    }
}
?>