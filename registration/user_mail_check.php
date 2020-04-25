<?php
    //$registeredEmail = array('jenson1@jenson.in', 'jenson2@jenson.in', 'jenson3@jenson.in', 'jenson4@jenson.in', 'jenson5@jenson.in');
if(!($connection=mysql_connect("208.91.198.197:3306","stepcone2019","Stepcone@2019")))
die("could not connect");
function showerror()
{
die("error:".mysql_error().":".mysql_error());
}
if(!(mysql_select_db("stepcone2019",$connection)))
showerror();
    $requestedEmail  = $_POST['email'];
    $valid=true;
    $n=mysql_num_rows( mysql_query("select * from registration where Email='$requestedEmail'"));
    if($n==1){
        $valid=false;
    }
    echo json_encode(array(
    'valid' => $valid,
));
    ?>