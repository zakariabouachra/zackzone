<?php include('../Partials/Header.php'); ?>

<?php 



if($_GET['cat'] == 'Men'){
    include('men.php');
}
elseif($_GET['cat'] == 'Women'){
    include('women.php');
}
elseif($_GET['cat'] == 'Kids'){
    include('kids.php');
}
elseif($_GET['cat'] == 'Others'){
    include('autres.php');
}


?>



<?php include('../Partials/Footer.php');?>