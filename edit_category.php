<?php
include('includes/categoryclass.php');
$x=new category();

    $id =$_GET['id'];
if(isset($_POST['submit'])){

    $name    = $_POST['category_name'];
    $desc = $_POST['category_description'];

    if($_FILES['category_image']['name'])
    {
        $cat_img=$_FILES['category_image']['name'];
        $tmp_name=$_FILES['category_image']['tmp_name'];
        $path='images/';
        move_uploaded_file($tmp_name,$path.$cat_img);

    }
    else {
        $cat_img=false;
        
    }
    $x->updatecategory($name,$desc,$cat_img);
    header("location:manage_category.php");
        
    
}

   

$result=$x->readcategorybyid($id);
$categorySet=$result->fetch_assoc();


 include('includes/admin_header.php'); 

 ?>

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
                                                <input  name="category_name" type="text" class="form-control"  aria-invalid="false" value="<?php echo $categorySet['cat_name'] ?>">
                                            </div> <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Category Description</label>
                                                <input  name="category_description" type="text" class="form-control"  aria-invalid="false" value="<?php               echo $categorySet['cat_desc'] ?>" >
                                            </div>
                                              <!-- <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Category Image
                                                </label>
                                                <input  name="category_image" type="text" class="form-control"  aria-invalid="false" value="<?php                             
                                                // echo $categorySet['cat_image'] ?>">
                                            </div>  --> 
                                             <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Category Image
                                                </label>
                                                <?php                             
                                                // echo $categorySet['cat_image'] 
                                                echo "<img src='images/{$categorySet['cat_image']}' width='100' height='100'>";
                                                
                                                 ?>
                                                
                                            </div>  
                                          <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Update Category Image</label>
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
                        </div>
                    </div>
                
            
                            </div>
                            </div>
            </div>

<?php include('includes/admin_footer.php'); ?>