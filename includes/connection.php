<?php
 

class Con
{
    public function connect()
    {
     
        $con= new mysqli("localhost","root","","ecom6");
        return $con;
    }
}