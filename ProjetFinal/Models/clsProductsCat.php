<?php

require_once('clsConnexion.php');

class productCat{

    public function insert_p_cat(){
         $connexion = new Connexion();
         $con = $connexion->getConnexion();
            $p_cat_title = $_POST['p_cat_title'];      
            $p_cat_desc = $_POST['p_cat_desc'];      
            $insert_p_cat = "insert into product_categories (p_cat_title,p_cat_desc) values ('$p_cat_title','$p_cat_desc')";
            $run_p_cat = mysqli_query ($con,$insert_p_cat);
            if ($run_p_cat){
                 echo "<script>alert('Product Category has been inserted successfully!!!')</script>";
                echo "<script>window.open('../Views/CRUD/index.php?view_p_cats','_self')</script>";
            }
    }

    public function select_p_cat_withId($id){
        $connexion = new Connexion();
        $con = $connexion->getConnexion();
        $edit_p_cat_id = $id;
        $edit_p_cat_query = "select * from product_categories where p_cat_id='$edit_p_cat_id'";
        $run_edit = mysqli_query($con,$edit_p_cat_query);
        $row_edit = mysqli_fetch_array($run_edit);
        return $row_edit;

    }

    public function affich_p_cats(){
        $connexion = new Connexion();
        $con = $connexion->getConnexion();
        $get_p_cats = "select * from product_categories";
        $run_p_cats = mysqli_query($con,$get_p_cats);
        if($run_p_cats->num_rows > 0){
            $data = array();
            while($row = $run_p_cats->fetch_assoc()){
                $data[] = $row;
            }
            return $data;
        }
        else{
            echo 'No found records!';
        }
    }

    public function count_p_cat(){
        $connexion = new Connexion();
        $con = $connexion->getConnexion();
        $get_p_categories= "select * from product_categories";
        $run_p_categories = mysqli_query($con,$get_p_categories);
        $count_p_categories = mysqli_num_rows($run_p_categories);
        return  $count_p_categories;

    }

    public function delete_p_cat($delete_id){
        $connexion = new Connexion();
        $con = $connexion->getConnexion();
        $delete_p_cat_id = $delete_id;
        $delete_p_cat = "delete from product_categories where p_cat_id='$delete_p_cat_id'";
        $run_delete = mysqli_query($con,$delete_p_cat);
        if($run_delete){    
             echo "<script>alert('Product Category has been deleted successfully!!!')</script>";
            echo "<script>window.open('../Views/CRUD/index.php?view_p_cats','_self')</script>";
        }
    }

    public function modif_p_cat($p_cat_id){
        $connexion = new Connexion();
        $con = $connexion->getConnexion();
        $p_cat_title = $_POST['p_cat_title'];
        $p_cat_desc = $_POST['p_cat_desc'];
        $update_p_cat = "update product_categories set p_cat_title='$p_cat_title',p_cat_desc='$p_cat_desc' where p_cat_id='$p_cat_id'";
        $run_p_cat = mysqli_query($con,$update_p_cat);
        if($run_p_cat){
            echo "<script>alert('Product Category has been Updated')</script>";
            echo "<script>window.open('../Views/CRUD/index.php?view_p_cats','_self')</script>";
        }
    }
}



?>