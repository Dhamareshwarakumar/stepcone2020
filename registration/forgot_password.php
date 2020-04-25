<?php
    //$registeredEmail = array('jenson1@jenson.in', 'jenson2@jenson.in', 'jenson3@jenson.in', 'jenson4@jenson.in', 'jenson5@jenson.in');
    
$connection=mysql_connect("208.91.198.197:3306","stepcone2019","Stepcone@2019");
mysql_select_db("stepcone2019",$connection);
    $requestedEmail  =$_GET['email'];//"kirangogula28@gmail.com";// $_GET['email'];
    $valid=true;
    $n=mysql_fetch_array( mysql_query("select Password,Phoneno from registration where Email='$requestedEmail'"));
    $str=$n[1].$n[0];
    echo json_encode($str);
?>