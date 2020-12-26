  <?php 

  include('includes/connection.php');

  Class Admin extends Con {

  public function creatadmin($e,$p,$f)
  {

    $query = "insert into admin(admin_email,admin_password,full_name)
    values('$e','$p','$f')";
    $c=$this->connect();
    $c->query($query);
  }

  public function readadmin()
  {

    $query  = "select * from admin";

    $c=$this->connect();
    $result = $c->query($query);
    return $result;

  }

  public function readadminbyid($id)
  {

    $query  = "select * from admin where admin_id =$id";

    $c=$this->connect();
    $result = $c->query($query);
    return $result;

  }

  public function deletadmin($id)
  {

   $query = "delete from admin where admin_id =$id";
   $c=$this->connect(); 
   $result = $c->query($query);


  }

  public function updateadmin($e,$p,$f,$id)
  {

    $query = "update admin set admin_email    = '$e',
                               admin_password = '$p',
                               full_name      = '$f'
                                where admin_id =$id";
    $c=$this->connect();
    $c->query($query);
  }


    }
    ?>