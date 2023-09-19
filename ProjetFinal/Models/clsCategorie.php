<?php

require_once('clsConnexion.php');

class Categorie{

    public function insert_cat(){
         $connexion = new Connexion();
         $con = $connexion->getConnexion();
         $cat_title = $_POST['cat_title'];
         $cat_desc = $_POST['cat_desc'];
         $insert_cat = "insert into categories (cat_title,cat_desc) values ('$cat_title','$cat_desc')";
         $run_cat = mysqli_query($con,$insert_cat);
            if ($run_cat){
                 echo "<script>alert('New Category has been inserted successfully!!!')</script>";
                echo "<script>window.open('../Views/CRUD/index.php?view_cats','_self')</script>";
            }
    }

    public function select_cat_withId($edit_id){
        $connexion = new Connexion();
        $con = $connexion->getConnexion();
        $edit_cat = "select * from categories where cat_id='$edit_id'";
        $run_edit = mysqli_query($con,$edit_cat);
        $row_edit = mysqli_fetch_array($run_edit);
        return $row_edit;

    }

    public function affich_cats(){
        $connexion = new Connexion();
        $con = $connexion->getConnexion();
        $get_cats = "select * from categories";
        $run_cats = mysqli_query($con,$get_cats);
        if($run_cats->num_rows > 0){
            $data = array();
            while($row = $run_cats->fetch_assoc()){
                $data[] = $row;
            }
            return $data;
        }
        else{
            echo 'No found records!';
        }
    }

    public function delete_cat($delete_id){
        $connexion = new Connexion();
        $con = $connexion->getConnexion();
        $delete_id = $delete_id;
        $delete_cat = "delete from categories where cat_id='$delete_id'";
        $run_delete = mysqli_query($con,$delete_cat);
        if($run_delete){    
             echo "<script>alert('Category has been deleted successfully!!!')</script>";
            echo "<script>window.open('../Views/CRUD/index.php?view_cats','_self')</script>";
        }
    }

    public function modif_cat($c_id){
        $connexion = new Connexion();
        $con = $connexion->getConnexion();
        $cat_title = $_POST['cat_title'];
        $cat_desc = $_POST['cat_desc'];
        $update_cat = "update categories set cat_title='$cat_title',cat_desc='$cat_desc' where cat_id='$c_id'";
        $run_cat = mysqli_query($con,$update_cat);
        if($run_cat){
            echo "<script>alert('Category has been Updated')</script>";
            echo "<script>window.open('../Views/CRUD/index.php?view_cats','_self')</script>";
        }
    }
}



?>