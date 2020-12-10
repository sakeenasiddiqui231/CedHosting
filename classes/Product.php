<?php
require_once '../config.php';
session_start();
class Product extends Config  {
public function sub_category()
    {
        $query = mysqli_query($this->con,"SELECT * FROM `tbl_product` WHERE `prod_parent_id` = '0' AND prod_available='1'");        
        return $query;
        
    }
public function insert_category($prod_parent_id, $prod_name, $link)
{
    $result = mysqli_query($this->con, "INSERT INTO tbl_product (prod_parent_id ,prod_name, link, prod_available, prod_launch_date) values('$prod_parent_id','$prod_name', '$link', '1', NOW())");
    return $result;
}

public function table_category()
{
  $res = "SELECT * FROM tbl_product WHERE `prod_parent_id` = '1'";
  $sql = mysqli_query($this->con, $res);
  $result = mysqli_num_rows($sql);
  if($result>0)
  {
      return $sql;
  }
  else{
      return 0;
  }
}

public function parentname($id)
{
  $res = "SELECT * FROM tbl_product WHERE `id` = '$id'";
  $sql = mysqli_query($this->con, $res);
  $result = mysqli_num_rows($sql);
  if($result>0)
  {
      return $sql;
  }
  else{
      return 0;
  }

}







}




?>