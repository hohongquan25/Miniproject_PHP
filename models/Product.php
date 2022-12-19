<?php
require_once 'configs/database.php';
class Product {
    public $id;
    public $tenSP;
    public $img;

    public function insert($tenSP,$img) {
        $connection = $this->connectDb();
        //tạo và thực thi truy vấn
        $queryInsert = "INSERT INTO products(pr_name,pr_image) 
        VALUES ('$tenSP','$img')";
        $isInsert = mysqli_query($connection, $queryInsert);
        $this->closeDb($connection);

        return $isInsert;
    }

    public function getproductById($id = null) {
        $connection = $this->connectDb();
        $querySelect = "SELECT * FROM products WHERE pr_id=$id";
        $results = mysqli_query($connection, $querySelect);
        $product = [];
        if (mysqli_num_rows($results) > 0) {
            $products = mysqli_fetch_all($results, MYSQLI_ASSOC);
            $product = $products[0];
        }
        $this->closeDb($connection);

        return $product;
    }

    /**
     * Truy vấn lấy ra tất cả sách trong CSDL
     */
    public function index() {
        $connection = $this->connectDb();
        //truy vấn
        $querySelect = "SELECT * FROM products";
        $results = mysqli_query($connection, $querySelect);
        $products = [];
        if (mysqli_num_rows($results) > 0) {
            $products = mysqli_fetch_all($results, MYSQLI_ASSOC);
        }
        $this->closeDb($connection);

        return $products;
    }

    public function connectDb() {
        $connection = mysqli_connect(DB_HOST,
            DB_USERNAME, DB_PASSWORD, DB_NAME);
        if (!$connection) {
            die("Không thể kết nối. Lỗi: " .mysqli_connect_error());
        }

        return $connection;
    }

    public function closeDb($connection = null) {
        mysqli_close($connection);
    }
}
