<?php

class AddController extends Controller {
	private $model;
    public function __construct($view) {
        $this->model = new Model();
        $this->addProduct();

        $this->CreateView($view);
    }

	public function addProduct() {
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
            if (empty($tenSP) || empty($price)) {
                $error = "Các trường không được để trống";
                echo "<script>alert('$error');history.back()</script>";
            }
            else {
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
        }
    }
}
?>
