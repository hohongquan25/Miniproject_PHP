<?php
class Product extends BaseModel{
    private $id;
    private $name;
    private $image;
    private $date;

    public function setID($ID) {
        $this->id = $ID;
    } 

    public function setName($name) {
        $this->name = $name;
    }

    public function setImage($image) {
        $this->image = $image;
    }

    public function setDate($date) {
        $this->date =  $date;
    }

    public function getID() {
        return $this->ID;
    }

    public function getName() {
        return $this->name;
    }

    public function getImage() {
        return $this->image; 
    }

    public function getDate() {
        return $this->date;
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
