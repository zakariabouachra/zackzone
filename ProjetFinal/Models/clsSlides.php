<?php

require_once('clsConnexion.php');

class Slides{
    public function insert_slide(){
        $connexion = new Connexion();
        $con = $connexion->getConnexion();
        $slide_name = $_POST['slide_name'];
        $slide_image = $_FILES['slide_image']['name'];
        $temp_name = $_FILES['slide_image']['tmp_name'];
        $view_slides = "select * from slider";
        $view_run_slides = mysqli_query($con,$view_slides);
        $count = mysqli_num_rows($view_run_slides);
        if($count<4){
            move_uploaded_file($temp_name,"slides_images/$slide_image");
            $insert_slide = "insert into slider (slide_name,slide_image) values ('$slide_name','$slide_image')";
            $run_slide = mysqli_query($con,$insert_slide);
            if($run_slide){
                echo "<script>alert('New Slide Has Been Inserted')</script>";
                echo "<script>window.open('../Views/CRUD/index.php?view_slides','_self')</script>";
            }
        }
        else {
            echo "<script>alert('You have already inserted 4 slides')</script>";
        }
            
    }

    public function select_slide_withId($edit_id){
        $connexion = new Connexion();
        $con = $connexion->getConnexion();
        $edit_slide = "select * from slider where slide_id='$edit_id'";
        $run_edit = mysqli_query($con,$edit_slide);
        $row_edit = mysqli_fetch_array($run_edit);
        return $row_edit;

    }

    public function affich_slides($Limit){
        $connexion = new Connexion();
        $con = $connexion->getConnexion();
        $get_slides = "select * from slider $Limit";
        $run_slides = mysqli_query($con,$get_slides);
        if($run_slides->num_rows > 0){
            $data = array();
            while($row = $run_slides->fetch_assoc()){
                $data[] = $row;
            }
            return $data;
        }
        else{
            echo 'No found records!';
        }
    }

    public function delete_slide($delete_id){
        $connexion = new Connexion();
        $con = $connexion->getConnexion();
        $delete_id = $delete_id;
        $delete_slide = "delete from slider where slide_id='$delete_id'";
        $run_delete = mysqli_query($con,$delete_slide);
        if($run_delete){    
             echo "<script>alert('One Slide has been deleted successfully!!!')</script>";
            echo "<script>window.open('../Views/CRUD/index.php?view_slides','_self')</script>";
        }
    }

    public function modif_slide($slide_id){
        $connexion = new Connexion();
        $con = $connexion->getConnexion();
        $slide_name = $_POST['slide_name'];
        $slide_image = $_FILES['slide_image']['name'];
        $temp_name = $_FILES['slide_image']['tmp_name'];
        move_uploaded_file($temp_name,"slides_images/$slide_image");
        $update_slide = "update slider set slide_name='$slide_name',slide_image='$slide_image' where slide_id='$slide_id'";
        $run_slide = mysqli_query($con,$update_slide);
        if($run_slide){
            echo "<script>alert('One Slide Has Been Updated')</script>";
            echo "<script>window.open('../Views/CRUD/index.php?view_slides','_self')</script>";
        }
    }


}



?>