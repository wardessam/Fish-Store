<?php
class user{
    private $id;
    private $name;
    private $email;
    private $password;
    
    //Setters
    function set_id($id) {
       $this->id = $id;
     }
     function set_name($name) {
       $this->name = $name;
     }
     function set_email($email) {
       $this->email= $email;
     }
     function set_password($password){
         $this->password=$password;
     }

      //Getters
      public function get_id() {
        return $this->id;
      }
      public function get_name() {
        return $this->name;
      }
      function get_email() {
        return $this->email;
      }
      function get_password() {
          return $this->password;
      }
     
    
}