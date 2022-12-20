<?php
require_once 'models/Model.php';
class ProductController {
    /**
     * Liệt kê các sách đang có trên hệ thống
     */
    public function index() {
        $product = new Model();
        $products = $product->getAllProduct();
        require_once 'views/products/index.php';
    }

    public function add() {
        $error = '';
        //xử lý submit form
        if (isset($_POST['btnSave'])) {
            $tenSP = $_POST['txtSP'];
            $date = $_POST['date'];
            $target_dir="uploads/";
            $target_file=$target_dir . basename($_FILES["hinh"]["name"]);
            $img=$target_file;
            $uploadOk=1;
            $imageFileType=strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            if ($imageFileType !="jpg"&& $imageFileType!="png"&&$imageFileType!="jpeg"&&$imageFileType!="gif") {
              $uploadOk=0;
            }
            move_uploaded_file($_FILES["hinh"]["tmp_name"],$target_file);
            //xử lý validate, nếu mà để trống tên sách
//            thì báo lỗi và không cho submit form
            if (empty($tenSP)) {
                $error = "Name không được để trống";
            }
            else {
                //gọi model để insert dữ liệu vào database
                $product = new Model();
                //gọi phương thức để insert dữ liệu
                //nên tạo 1 mảng tạm để lưu thông tin của
//                đối tượng dựa theo cấu trúc bảng
                $isInsert = $product->insertProduct($tenSP,$img, $date);
                if ($isInsert) {
                    $_SESSION['success'] = "Thêm mới thành công";
                }
                else {
                    $_SESSION['error'] = "Thêm mới thất bại";
                }
                header("Location: index.php?controller=product&action=index");
                exit();
            }
        }
        //gọi view
        require_once 'views/products/add.php';
    }
}
?>