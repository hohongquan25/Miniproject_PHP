<?php

class AddController extends Controller {
	private $add;
    public function __construct() {
        $this->add = new Model();
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
            }
            else {
                //gọi model để insert dữ liệu vào database
                $product = new Model();
                //gọi phương thức để insert dữ liệu
                //nên tạo 1 mảng tạm để lưu thông tin của
//                đối tượng dựa theo cấu trúc bảng
                $isInsert = $product->insertProduct($tenSP,$img, $price);
                if ($isInsert) {
                    $_SESSION['success'] = "Thêm mới thành công";
                }
                else {
                    $_SESSION['error'] = "Thêm mới thất bại";
                }
                header("Location: index.php");
                exit();
            }
        }
    }
}
AddController::addProduct();
?>
