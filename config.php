<?php

  class Config {
    public $con;

      function __construct(){
          $this->con = mysqli_connect('localhost', 'root', '', 'CedHosting');
          if($this->con->connect_error){
              die("Connection failed:" . $this->con->connect_error);
          }
      }
  }

  
?>