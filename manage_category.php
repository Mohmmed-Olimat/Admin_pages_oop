<?php  

      
  include('includes/categoryclass.php');
    $x=new category();

    if(isset($_POST['submit'])){
      
    $name    = $_POST['category_name'];
    $desc = $_POST['category_description'];
    $cat_img=$_FILES['category_image']['name'];
    $tmp_name=$_FILES['category_image']['tmp_name'];
    $path='images/';
    move_uploaded_file($tmp_name,$path.$cat_img);

        $x->creatcategory($name,$desc,$cat_img);
    
        header("location:manage_category.php");
    
  
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
                                    <div class="card-header">Manage Category</div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center title-2">Create Category</h3>
                                        </div>
                                        <hr>
                                        <form action="" method="post" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Category Name</label>
                                                <input  name="category_name" type="text" class="form-control"  aria-invalid="false" >
                                            </div> <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Category Description</label>
                                                <input  name="category_description" type="text" class="form-control"  aria-invalid="false" >
                                            </div> <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Category Image</label>
                                                <input  name="category_image" type="file" class="form-control"  aria-invalid="false" >
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
                                                <th>Image</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                             <?php
                                              $result=$x->readcategory();
                                             while ($row=$result->fetch_assoc()) {
                                            
                                                echo "<tr>";
                                                echo "<td>{$row['cat_id']}</td>";
                                                echo "<td>{$row['cat_name']}</td>";
                                                echo "<td>{$row['cat_desc']}</td>";
                                                echo "<td><img src='images/{$row['cat_image']}' width='100' height='100'></td>";
                                                echo "<td><a href='edit_category.php?id={$row['cat_id']}' class='btn btn-primary'>Edit</a></td>";
                                                echo "<td><a href='delete_category.php?id={$row['cat_id']}' class='btn btn-danger'>Delete</a></td>";
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
                       