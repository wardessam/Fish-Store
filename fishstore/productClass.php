<?php
class product{
    private $id;
    private $name;
    private $price;
    
    
    //Setters
    function set_id($id) {
       $this->id = $id;
     }
     function set_name($name) {
       $this->name = $name;
     }
     function set_price($price) {
       $this->price= $price;
     }
    
      //Getters
      public function get_id() {
        return $this->id;
      }
      public function get_name() {
        return $this->name;
      }
      function get_price() {
        return $this->price;
      }
     
     
    
}