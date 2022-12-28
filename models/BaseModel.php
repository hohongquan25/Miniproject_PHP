<?php


require_once 'configs/config.php';
class BaseModel{
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
}