<?php
class order{
    private $id;
    private $date;
    private $status;
    private $price;
    private $deliveriedby;
    private $cookedby;
    private $address;
    
    
    //Setters
    function set_id($id) {
       $this->id = $id;
     }
     function set_date($date) {
       $this->date = $date;
     }
     function set_price($price) {
       $this->price= $price;
     }
     function set_status($status) {
        $this->status= $status;
      }
     function set_deliveriedby($deliveriedby) {
        $this->deliveriedby = $deliveriedby;
      }
      function set_cookedby($cookedby) {
        $this->cookedby = $cookedby;
      }
      function set_address($address) {
        $this->address= $address;
      }
    
      //Getters
      public function get_id() {
        return $this->id;
      }
      public function get_date() {
        return $this->date;
      }
      function get_price() {
        return $this->price;
      }
      function get_status() {
        return $this->status;
      }
      public function get_deliveriedby() {
        return $this->deliveriedby;
      }
      public function get_cookedby() {
        return $this->cookedby;
      }
      function get_address() {
        return $this->address;
      }
     
    
}