 <?php  

   include('includes/customersclass.php');
    $x=new customers();

    if(isset($_POST['submit'])){
      
        $name = $_POST['customers_name'];
        $email = $_POST['customers_email'];
        $password = $_POST['customers_password'];
        $mobile = $_POST['customers_mobile'];
        $address = $_POST['customers_address'];
        $x->creatcustomers($name,$email,$password,$mobile,$address);

        header("location:manage_customers.php");
    
  
            }

        include('includes/admin_header.php'); 

      ?>
            <!-- MAIN CONTENT-->
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
                                                <input  name="customers_name" type="text" class="form-control"  aria-invalid="false" >
                                            </div> 
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Customers Email</label>
                                                <input  name="customers_email" type="Email" class="form-control"  aria-invalid="false" >
                                            </div> 
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Customers Password</label>
                                                <input  name="customers_password" type="Password" class="form-control"  aria-invalid="false" >
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Customers Mobile</label>
                                                <input  name="customers_mobile" type="number" class="form-control"  aria-invalid="false" >
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Customers Address</label>
                                                <input  name="customers_address" type="text" class="form-control"  aria-invalid="false" >
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
                            <div class="col-md-12">
                                <!-- DATA TABLE-->
                                <div class="table-responsive m-b-40">
                                    <table class="table table-borderless table-data3">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>FullName</th>
                                                <th>Email</th>
                                                <th>Password</th>
                                                <th>Mobile</th>
                                                <th>Address</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                             <?php
                                              $result=$x->readcustomers();
                                            while ($row=$result->fetch_assoc()) {
                                            
                                                echo "<tr>";
                                                echo "<td>{$row['cust_id']}</td>";
                                                echo "<td>{$row['cust_name']}</td>";
                                                echo "<td>{$row['cust_email']}</td>";
                                                echo "<td>{$row['cust_password']}</td>";
                                                echo "<td>{$row['cust_mobile']}</td>";
                                                echo "<td>{$row['cust_address']}</td>";
                                                echo "<td><a href='edit_customer.php?id={$row['cust_id']}' class='btn btn-primary'>Edit</a></td>";
                                                echo "<td><a href='delete_customer.php?id={$row['cust_id']}' class='btn btn-danger'>Delete</a></td>";
                                                echo "</tr>";
                                            }
                                             ?>
                                           
                                        </tbody>
                                    </table>
                                </div>
                                <!-- END DATA TABLE-->
                            </div>


                        </div>
                    </div>


                <?php   include('includes/admin_footer.php');     ?>
                       