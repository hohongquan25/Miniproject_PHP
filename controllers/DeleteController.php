<?php

class DeleteController extends Controller {
	private $delete;
    public function __construct($view) {
        $this->delete = new Model();

        $isDelete = $this->delete->deleteProduct($_GET['id']);

        $this->CreateView($view, ['isDelete' => $isDelete]);
     }
}

?>