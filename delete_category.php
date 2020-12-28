<?php 
include('includes/categoryclass.php');
$x=new category();

$id =$_GET['id'];

$x->deletcategory($id);

header("location:manage_category.php");






