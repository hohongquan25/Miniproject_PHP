<?php
require_once 'configs/database.php';
class Product extends Model {
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

}
