<?php 

include('includes/customersclass.php');
$x=new customers();

$id =$_GET['id'];

$x->deletcustomers($id);

header("location:manage_customers.php");