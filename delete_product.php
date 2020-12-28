<?php 
include('includes/productclass.php');
$x=new product();

$id =$_GET['id'];

$x->deletproduct($id);

header("location:manage_products.php");