<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 11/14/2019
 * Time: 6:52 PM
 */

require_once 'configs/config.php';
require_once 'models/Product.php';
class Model extends Product {
    protected $mysqli;
    function __construct() {
        $this->connectDb();
    }
    public function connectDb() {
        $this->mysqli = mysqli_connect(DB_HOST,DB_USERNAME, DB_PASSWORD, DB_NAME);
        if (!$this->mysqli) {
            die("Không thể kết nối. Lỗi: " .mysqli_connect_error());
        }
    }
    public function insertProduct($name, $image, $price) {
        $stmt = $this->mysqli->prepare("INSERT INTO products (`pr_name`, `pr_image`, `pr_price`) VALUES (?,?,?)");
        $stmt->bind_param("ssd",$name,$image,$price);
         if( $stmt->execute() == TRUE){
            return true ;
        }else{
            return false;
        }
    }

    public function getProductByID($id = null) {
        $connection = $this->mysqli;
        $querySelect = "SELECT * FROM products WHERE pr_id=$id";
        $results = mysqli_query($connection, $querySelect);
        $product = [];
        if (mysqli_num_rows($results) > 0) {
            $products = mysqli_fetch_all($results, MYSQLI_ASSOC);
            $product = $products[0];
        }

        return $product;
    }

    /**
     * Truy vấn lấy ra tất cả sách trong CSDL
     */
    public function getAllProduct() {
        $connection = $this->mysqli;
        //truy vấn
        $querySelect = "SELECT * FROM products";
        $results = mysqli_query($connection, $querySelect);
        $products = [];
        if (mysqli_num_rows($results) > 0) {
            $products = mysqli_fetch_all($results, MYSQLI_ASSOC);
        }
        return $products;
    }
    // Xoá sản phẩm trong CSDL
    public function deleteProduct($id){
        if($this->mysqli->query("DELETE FROM `products` WHERE `pr_id` = '".$id."';") == TRUE){
            return true;
        }else{
            return false;
        }
    }
    // Cập nhật thông tin sản phẩm
    public function updateProduct($id, $name, $image, $price, $date){
        $stmt = $this->mysqli->prepare("UPDATE `products` SET `pr_name`=?, `pr_image`=?, `pr_price`=?, `pr_date`=? WHERE `pr_id` = ?");
        $stmt->bind_param("ssdss",$name,$image,$price,$date,$id);
        if($stmt->execute()==TRUE){
            return true;
        }else{
            return false;
        }
    }


}