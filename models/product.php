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

    function insert($data) {
        $name = $data["name"];
        $image = $data["image"];
        $price = $data["price"];
        $stmt = $this->mysqli->prepare("INSERT INTO products (`pr_name`, `pr_image`, `pr_price`) VALUES (?,?,?)");
        $stmt->bind_param("ssd",$name,$image,$price);
         if( $stmt->execute() == TRUE){
            return true ;
        }else{
            return false;
        }
    }
    function update($data) {
        $stmt = $this->mysqli->prepare("UPDATE `products` SET `pr_name`=?, `pr_image`=?, `pr_price`=?, `pr_date`=? WHERE `pr_id` = ?");
        $stmt->bind_param("ssdss",$data["name"],$data["image"],$data["price"],$data["date"],$data["id"]);
        if($stmt->execute()==TRUE){
            return true;
        }else{
            return false;
        }
    }
    function delete($id) {
        if($this->mysqli->query("DELETE FROM `products` WHERE `pr_id` = '".$id."';") == TRUE){
            return true;
        }else{
            return false;
        }
    }

    function get($id= null) {
        $connection = $this->mysqli;
        $querySelect = "SELECT * FROM products";
        if (isset($id))
            $querySelect .=  " WHERE pr_id=$id";
        $results = mysqli_query($connection, $querySelect);
        $product = [];
        if (mysqli_num_rows($results) > 0) {
            $products = mysqli_fetch_all($results, MYSQLI_ASSOC);
        }

        return isset($id) ? $products[0] : $products;
    }    
}
