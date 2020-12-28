  <?php 

  include('includes/connection.php');

  Class category extends Con {

  public function creatcategory($name,$desc,$cat_img)
  {

    $query = "insert into category(cat_name,cat_desc,cat_image)
             values('$name','$desc','$cat_img')";
    $c=$this->connect();
    $c->query($query);
  }

  public function readcategory()
  {

    $query  = "select * from category";

    $c=$this->connect();
    $result = $c->query($query);
    return $result;

  }

  public function readcategorybyid($id)
  {

    $query    = "select * from category where cat_id ={$_GET['id']}";

    $c=$this->connect();
    $result = $c->query($query);
    return $result;

  }

  public function deletcategory($id)
  {

   $query = "delete from category where cat_id = {$_GET['id']}";
   $c=$this->connect(); 
   $result = $c->query($query);


  }

  public function updatecategory($name,$desc,$cat_img)
  {

    if($cat_img)
    {
      $query = "update category set cat_name    = '$name',
        cat_desc = '$desc',
        cat_image      = '$cat_img'
        where cat_id = {$_GET['id']}";
      }
      else {

        $query = "update category set cat_name = '$name',
        cat_desc = '$desc'
        where cat_id = {$_GET['id']}";

      }
    $c=$this->connect();
    $c->query($query);
  }


    }
    ?>