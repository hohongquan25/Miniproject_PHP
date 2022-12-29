<?php


require_once 'configs/config.php';
abstract class BaseModel{
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

    abstract function insert($data);
    abstract function update($data);
    abstract function delete($id);
    abstract function get($id = null);
}