<?php 

include('includes/adminclass.php');
    $x=new Admin();

$id =$_GET['id'];

$x->deletadmin($id);

header("location:manage_admin.php");


