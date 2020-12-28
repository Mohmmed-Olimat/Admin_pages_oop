  <?php 

  include('includes/connection.php');

  Class customers extends Con {

  public function creatcustomers($name,$email,$password,$mobile,$address)
  {

    $query = "insert into customer(cust_name,cust_email,cust_password,cust_mobile,cust_address)
             values('$name','$email','$password','$mobile','$address')";
    $c=$this->connect();
    $c->query($query);
  }

  public function readcustomers()
  {

    $query  = "select * from customer";

    $c=$this->connect();
    $result = $c->query($query);
    return $result;

  }

  public function readcustomersbyid($id)
  {

    $query    = "select * from customer where cust_id =$id";
    
    $c=$this->connect();
    $result = $c->query($query);
    return $result;

  }

  public function deletcustomers($id)
  {

  $query = "delete from customer where cust_id = {$_GET['id']}";
   $c=$this->connect(); 
   $result = $c->query($query);


  }

  public function updatecustomers($name,$email,$password,$mobile,$address)
  {

    $query = "update customer set cust_name    = '$name',
                               cust_email = '$email',
                               cust_password      = '$password',
                               cust_mobile      = '$mobile',
                               cust_address      = '$address'
             where cust_id = {$_GET['id']}";

    $c=$this->connect();
    $c->query($query);
  }


     public function logincustomers($email,$password)
  {

     $query = "select * from customer where cust_email = '$email' AND 
              cust_password = '$password'";

    $c=$this->connect();
    $result = $c->query($query);
    return $result;

  }


    }
    ?>