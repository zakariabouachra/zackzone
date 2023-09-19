<?php
require_once('clsConnexion.php');

class PendingOrder{
    

    public function insert_p_order($pro_qty,$pro_id){
        $connexion = new Connexion();
        $con = $connexion->getConnexion();
        $invoice_no = mt_rand();
        $status = "en cours";
        $insert_pending_order = "insert into pending_orders (invoice_no,product_id,qty,order_status) values ('$invoice_no','$pro_id','$pro_qty','$status')";
        $run_pending_order = mysqli_query($con,$insert_pending_order);
           if($run_pending_order){
            echo "<script>window.open('/CoursCM_2/ProjetFinal/Views/index.php','_self')</script>";
           }
   }

   public function count_p_order(){
        $connexion = new Connexion();
        $con = $connexion->getConnexion();
        $get_orders = "select * from pending_orders";
        $run_orders = mysqli_query($con,$get_orders); 
        $count_orders = mysqli_num_rows($run_orders);
        return $count_orders;
    }

   public function select_p_order_withId($id){
       $connexion = new Connexion();
       $con = $connexion->getConnexion();
       $get_orders = "select * from pending_orders where customer_id='$id'";
       $run_orders = mysqli_query($con,$get_orders);
       $row = mysqli_fetch_array($run_orders);
       return $row;

   }

   public function affich_p_orders(){
       $connexion = new Connexion();
       $con = $connexion->getConnexion();
       $get_orders = "select * from pending_orders";
       $run_customer_order = mysqli_query($con,$get_orders);
       if($run_customer_order->num_rows > 0){
           $data = array();
           while($row = $run_customer_order->fetch_assoc()){
               $data[] = $row;
           }
           return $data;
       }
       else{
           echo 'No found records!';
       }
   }

   public function delete_p_order($delete_id){
       $connexion = new Connexion();
       $con = $connexion->getConnexion();
       $delete_order = "delete from pending_orders where order_id='$delete_id'";
       $run_delete = mysqli_query($con,$delete_order);
       if($run_delete){    
            echo "<script>alert('Order has been deleted successfully!!!')</script>";
           echo "<script>window.open('../Views/CRUD/index.php?view_orders','_self')</script>";
       }
   }

}



?>