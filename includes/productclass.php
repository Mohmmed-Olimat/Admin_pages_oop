  <?php 

 
  include('includes/categoryclass.php');

  Class product extends category {

  public function creatproduct($name,$desc,$price,$pro_img,$selectid,$quantity)
  {

    $query = "insert into products(pro_name,pro_desc,pro_price,pro_image,cat_id,pro_qty)
             values('$name','$desc','$price','$pro_img','$selectid','$quantity')";
    $c=$this->connect();
    $c->query($query);
  }

  public function readproduct()
  {

     $query  = "select * from products,category where products.cat_id=category.cat_id";

    $c=$this->connect();
    $result = $c->query($query);
    return $result;

  }

  public function readproductbyid($id)
  {

    $query    = "select * from products where pro_id ={$_GET['id']}";

    $c=$this->connect();
    $result = $c->query($query);
    return $result;

  }

  public function deletproduct($id)
  {

   $query = "delete from products where pro_id = {$_GET['id']}";
   $c=$this->connect(); 
   $result = $c->query($query);


  }

  public function updateproduct($name,$desc,$price,$pro_img,$selectid,$quantity)
  {

    if($pro_img)
    {
      $query = "update products set pro_name    = '$name',
                               pro_desc = '$desc',
                               pro_price      = '$price',
                               pro_image      = '$pro_img',
                               cat_id      = '$selectid',
                               pro_qty      = '$quantity'
             where pro_id = {$_GET['id']}";

    }

    else {
        $query = "update products set pro_name    = '$name',
                               pro_desc = '$desc',
                               pro_price      = '$price',
                               cat_id      = '$selectid',
                               pro_qty      = '$quantity'
             where pro_id = {$_GET['id']}";

    }
    $c=$this->connect();
    $c->query($query);
  }


  }
    ?>