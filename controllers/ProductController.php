<?php


  class ProductController extends Controller {


  	public function add() {
        $error = '';
        //xử lý submit form
        if (isset($_POST['btnSave'])) {
            $tenSP = $_POST['txtSP'];
            $price = $_POST['price'];
            $target_dir="uploads/";
            $target_file=$target_dir . basename($_FILES["hinh"]["name"]);
            $img=$target_file;
            $uploadOk=1;
            $imageFileType=strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            if ($imageFileType !="jpg"&& $imageFileType!="png"&&$imageFileType!="jpeg"&&$imageFileType!="gif") {
              $uploadOk=0;
            }
            move_uploaded_file($_FILES["hinh"]["tmp_name"],$target_file);
            //xử lý valiprice, nếu mà để trống tên sách
//            thì báo lỗi và không cho submit form
            $check=is_numeric($price);
            if (empty($tenSP) || empty($price)) {
                $error = "Các trường không được để trống";
                echo "<script>alert('$error');history.back()</script>";
            }
            else {
                if($check){
                    //gọi model để insert dữ liệu vào database
                    //gọi phương thức để insert dữ liệu
                    //nên tạo 1 mảng tạm để lưu thông tin của
    //                đối tượng dựa theo cấu trúc bảng
                    $isInsert = $this->model->insertProduct($tenSP,$img, $price);
                    if ($isInsert) {
                         echo "<script>alert('Thêm mới thành công!');document.location='index.php'</script>";
                        // $_SESSION['success'] = "Thêm mới thành công";
                    }
                    else {
                        echo "<script>alert('Thêm mới thất bại');history.back()</script>";
                        // $_SESSION['error'] = "Thêm mới thất bại";
                    }
                }
                else{
                    echo "<script>alert('Giá phải là chữ số');history.back()</script>";
                }
            }
        }

    }



    public function edit() {
    	$id = $_GET['id'];
    	$this->data["row"] = $this->model->getProductByID($id);
		if(isset($_POST['btnEdit'])){ 
    	$name = $_POST['txtSP'];
    	$price =$_POST['price'];
    	$date = $_POST['date'];
        $target_dir="uploads/";
            $target_file=$target_dir . basename($_FILES["hinh"]["name"]);
            $img=$target_file;
            $uploadOk=1;
            $imageFileType=strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            if ($imageFileType !="jpg"&& $imageFileType!="png"&&$imageFileType!="jpeg"&&$imageFileType!="gif") {
              $uploadOk=0;
            }
        if (empty($name) || empty($price) || empty($date) || $uploadOk == 0) {
                $error = "Các trường không được để trống";
                echo "<script>alert('$error');history.back()</script>";
                die();
        }
        move_uploaded_file($_FILES["hinh"]["tmp_name"],$target_file);
        $check=is_numeric($price);
        if($check){
            if ($this->model->updateProduct($id, $name, $target_file, $price, $date)){
                echo "<script>alert('Sửa sản phẩm thành công !');document.location='index.php'</script>";
            }else{
                echo "<script>alert('Đã có lỗi, vui lòng thử lại!');history.back()</script>";
            }
        }
        else{
            echo "<script>alert('Giá phải là chữ số');history.back()</script>";
        }
    }
}

	public function delete() {
		 $isDelete = $this->model->deleteProduct($_GET['id']);
		 $this->data["isDelete"] = $isDelete;
	}

	public function index() {
		$rows = $this->model->getAllProduct();
        $this->data["rows"] = $rows;
	}
  }

?>





