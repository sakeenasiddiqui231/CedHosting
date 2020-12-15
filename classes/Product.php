<?php
require 'config.php';

class Product extends Config  {
public function sub_category()
{
        $query = mysqli_query($this->con,"SELECT * FROM `tbl_product` WHERE `prod_parent_id` = '0' AND prod_available='1'");        
        return $query;
        
}
public function dynamic_elements()
{
        $query = mysqli_query($this->con,"SELECT * FROM `tbl_product` WHERE `prod_parent_id` = '1' AND prod_available='1'");        
        return $query;
        
}

public function insert_subcategory($prod_name, $link)
{
    // echo "INSERT INTO tbl_product (prod_parent_id ,prod_name, html, prod_available, prod_launch_date) values('$prod_parent_id','$prod_name', '$link', '1', NOW())";
    // die();    
    $result = mysqli_query($this->con, "INSERT INTO tbl_product (prod_name, html, prod_available, prod_launch_date) values('$prod_name', '$link', '1', NOW())");
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

public function deletecategory($id)
{
        $query = "DELETE FROM tbl_product WHERE `id` = '$id'";
        $sql = mysqli_query($this->con, $query);
        
        if($sql)
        {
            echo "<script>alert('Record Deleted Successfully');</script>";
            header('refresh:0; url=selectcategory.php');
        }
        else{
            echo "failed to delete record";
            
        }

}

public function updatecategory($id, $p_name, $isavailable, $link)
{
        $query = "UPDATE tbl_product SET `prod_name`='".$p_name."', `prod_available`='".$isavailable."', `html` = '".$link."'
        WHERE `id`='".$id."'";

        $data1 = mysqli_query($this->con, $query);
        if($data1 == true){
        return $query;
        }
        else{
            return 0;
        }
}


function insert_product($prod_parent_id, $prod_name, $link, $mon_price, $annual_price, $sku, $features_encode){
        $pquery = mysqli_query($this->con, "INSERT INTO `tbl_product`(`prod_parent_id`, `prod_name`, `html`, `prod_available`, `prod_launch_date`) VALUES ('$prod_parent_id', '$prod_name', '$link', '1', NOW())");
        $id = mysqli_insert_id($this->con);
        if($pquery){
            $dquery = mysqli_query($this->con, "INSERT INTO `tbl_product_description`(`prod_id`, `description`, `mon_price`, `annual_price`, `sku`) VALUES ('$id', '$features_encode', '$mon_price', '$annual_price', '$sku')");
            if($dquery) {
                echo "<script>alert('Product Inserted successfully');</script>";
                echo "<script>window.location.href = 'viewproduct.php'; </script>";
            } else {
                echo mysqli_error($this->con);
            }
        } else {
            return false;
        }
    
}


function view_table()
{
        $query = "SELECT * FROM `tbl_product_description` INNER JOIN `tbl_product` ON tbl_product_description.prod_id = tbl_product.id ";
        $sql = mysqli_query($this->con, $query);
        $result = mysqli_num_rows($sql);
        if($result>0)
        {
            return $sql;
        }
        else{
            return 0;
        }

}


public function deleteproduct($id)
{
        $query = "DELETE `tbl_product_description`, `tbl_product` FROM `tbl_product_description` INNER JOIN  `tbl_product` ON tbl_product_description.prod_id = tbl_product.id WHERE `prod_id` = '$id'";
        $sql = mysqli_query($this->con, $query);
        
        if($sql)
        {
            echo "<script>alert('Record Deleted Successfully');</script>";
            header('refresh:0; url=viewproduct.php');
        }
        else{
            echo "failed to delete record";
            
        }

}
 public function editproduct($id)
 {
     $query = "SELECT tbl_product.*,tbl_product_description.* FROM tbl_product JOIN tbl_product_description ON tbl_product.id = tbl_product_description.prod_id AND tbl_product.id = $id";
     $sql = mysqli_query($this->con, $query);
     if($sql == TRUE)
     {
         return $sql;
     }
     else{
         return 0;
     }
 }


 public function updateproduct($m_price, $a_price, $sku, $features_encode, $id, $prod_name,  $html)
 {
    $sql =  "UPDATE tbl_product SET `prod_name`='".$prod_name."', `html` = '".$html."'
    WHERE `id`='".$id."'";
    $result = mysqli_query($this->con, $sql);
    if ($result == true) {
        $query = "UPDATE tbl_product_description SET `mon_price`='".$m_price."', `annual_price`='".$a_price."', `sku` = '".$sku."', `description` = '".$features_encode."'
        WHERE `prod_id`='".$id."'";
        $data1 = mysqli_query($this->con, $query);
        if($data1 == true){
            return $query;
         }
        else{
            return 0;
        }
    } else{
        return 0;
    }
 }


 public function dynamic_table($id)
 {
    $query = "SELECT tbl_product_description.id,prod_id,description,mon_price,annual_price,sku,tbl_product.id,prod_parent_id,prod_name,html,prod_available,prod_launch_date FROM tbl_product_description INNER JOIN tbl_product ON tbl_product_description.prod_id =tbl_product.id WHERE tbl_product.prod_parent_id='$id'";
    $sql = mysqli_query($this->con, $query);
    $result = mysqli_num_rows($sql);
    
    if($result>0)
    {
        return $sql;
    }
    else{
        return 0;
    }
 }

public function fetch_name($id)
{
    $query = "SELECT `prod_name` FROM tbl_product WHERE `id` = '$id'";
    $sql = mysqli_query($this->con, $query);
    $result = mysqli_num_rows($sql);
    
    if($result>0)
    {
        return $sql;
    }
    else{
        return 0;
    }
}

public function cartproduct($id)
{
    $query = "SELECT tbl_product.*,tbl_product_description.* FROM tbl_product JOIN tbl_product_description ON tbl_product.id = tbl_product_description.prod_id AND tbl_product.id = $id";
    $sql = mysqli_query($this->con, $query);
    if($sql == TRUE)
    {
        return $sql;
    }
    else{
        return 0;
    }
}






}
?>