<?php
include('includes/customersclass.php');
$x=new customers();

    $id =$_GET['id'];

if(isset($_POST['submit'])){
    $name       = $_POST['customers_name'];
    $email      = $_POST['customers_email'];
    $password   = $_POST['customers_password'];
    $mobile     = $_POST['customers_mobile'];
    $address    = $_POST['customers_address'];


      $x->updatecustomers($name,$email,$password,$mobile,$address);
     header("location:manage_customers.php");

}
    $result=$x->readcustomersbyid($id);
    $customerSet=$result->fetch_assoc();
   

 include('includes/admin_header.php'); ?>

<div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                               <div class="card">
                                    <div class="card-header">Manage Customers</div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center title-2">Create Customers</h3>
                                        </div>
                                        <hr>
                                        <form action="" method="post" >
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Customers Name</label>
                                                <input  name="customers_name" type="text" class="form-control"  aria-invalid="false" value="<?php echo $customerSet['cust_name'] ?>">
                                            </div> 
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Customers Email</label>
                                                <input  name="customers_email" type="Email" class="form-control"  aria-invalid="false" value="<?php echo $customerSet['cust_email'] ?>">
                                            </div> 
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Customers Password</label>
                                                <input  name="customers_password" type="Password" class="form-control"  aria-invalid="false" value="<?php echo $customerSet['cust_password'] ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Customers Mobile</label>
                                                <input  name="customers_mobile" type="number" class="form-control"  aria-invalid="false" value="<?php                             echo $customerSet['cust_mobile'] ?>" >
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Customers Address</label>
                                                <input  name="customers_address" type="text" class="form-control"  aria-invalid="false" value="<?php                             echo $customerSet['cust_address'] ?>">
                                            </div>
                                          
                                           
                                         
                                            <div>
                                                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block" name="submit">
                                                    Save
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                
            
                            </div>
                            </div>
            

<?php include('includes/admin_footer.php'); ?>