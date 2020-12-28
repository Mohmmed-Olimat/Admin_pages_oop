<?php  

include('includes/productclass.php');
$x=new product();
   
    if(isset($_POST['submit'])){
      
    $name     = $_POST['product_name'];
    $desc     = $_POST['product_description'];
    $price    = $_POST['product_price'];
    $selectid = $_POST['selectid'];
    $quantity = $_POST['product_quantity'];

    $pro_img=$_FILES['product_image']['name'];
    $tmp_name=$_FILES['product_image']['tmp_name'];
    $path='images/';
    move_uploaded_file($tmp_name,$path.$pro_img);

        $x->creatproduct($name,$desc,$price,$pro_img,$selectid,$quantity);
        header("location:manage_products.php");
  
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
                                    <div class="card-header">Manage Products</div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center title-2">Create Products</h3>
                                        </div>
                                        <hr>
                                        <form action="" method="post" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Product Name</label>
                                                <input  name="product_name" type="text" class="form-control"  aria-invalid="false" >
                                            </div>  <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Product Description</label>
                                                <input  name="product_description" type="text" class="form-control"  aria-invalid="false" >
                                            </div>  <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Product Price</label>
                                                <input  name="product_price" type="text" class="form-control"  aria-invalid="false" >
                                            </div>  <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Product Image</label>
                                                <input  name="product_image" type="file" class="form-control"  aria-invalid="false" >
                                            </div>  <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Category ID</label>
                                             
                                              <div class="col-12 ">
                                                    <select name="selectid" id="select" class="form-control">
                                                        <option value="0">Please select</option>
                                                        <?php
                                                        
                                              $result=$x->readcategory();
                                             while ($row=$result->fetch_assoc()) {
                                            $i=$row['cat_id'];
                                            echo "<option value=$i>";
                                            echo "{$row['cat_name']}";
                                            echo "</option>";

                                            }
                                             ?>
                                                    </select>
                                                </div>
                                            </div>  <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Product Quantity</label>
                                                <input  name="product_quantity" type="number" class="form-control"  aria-invalid="false" >
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
                                                <th>Name</th>
                                                <th>Description</th>
                                                <th>Price</th>
                                                <th>Image</th>
                                                <th>Category</th>
                                                <th>Quantity</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                         $result=$x->readproduct();
                                         while ($row=$result->fetch_assoc()) {
                                          
                                                echo "<tr>";
                                                echo "<td>{$row['pro_id']}</td>";
                                                echo "<td>{$row['pro_name']}</td>";
                                                echo "<td>{$row['pro_desc']}</td>";
                                                echo "<td>{$row['pro_price']}</td>";
                                                 echo "<td><img src='images/{$row['pro_image']}' width='100' height='100'></td>";
                                                echo "<td>{$row['cat_name']}</td>";
                                                echo "<td>{$row['pro_qty']}</td>";
                                                echo "<td><a href='edit_product.php?id={$row['pro_id']}' class='btn btn-primary'>Edit</a></td>";
                                                echo "<td><a href='delete_product.php?id={$row['pro_id']}' class='btn btn-danger'>Delete</a></td>";
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
                       