<?php

class DeleteController extends Controller {
	private $delete;
    public function __construct($id) {
        $this->delete = new Model();
       	if($this->delete->deleteProduct($id)== TRUE){
            echo "<script>alert('Xóa sản phẩm thành công !');document.location='index.php'</script>";
        }else{
            echo "<script>alert('Xóa sản phẩm không thành công, vui lòng thử lại!');history.back()</script>";
        }
     }
}

?>