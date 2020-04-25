<?php
require_once('config.php');
$connection=mysql_connect("208.91.198.197","stepcone2019","Stepcone@2019");
mysql_select_db("stepcone2019",$connection);
$email="";
if(isset($_POST['email1'])){
      $email=$_POST['email1'];
  }
      //$pass=$_POST['user_password'];
  if(isset($_POST['total'])){
$x=$_POST['total'];
$x=$x+$x*0.0242;
      $total=$x*100;
  }  
      $q="select Fname,Phoneno from registration where Email='$email'";
      $x=mysql_fetch_array(mysql_query($q));
$n=mysql_num_rows(mysql_query("select Type,Name from event_registration where Email='$email' and status=0"));

?>
<html>
<head>

	<title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	 <meta name="viewport" content="width=device-width">
   <script type="text/javascript" >
   function preventBack(){window.history.forward();}
    setTimeout("preventBack()", 0);
    window.onunload=function(){null};
</script>
     <style type="text/css">
.razorpay-payment-button{
    -moz-box-shadow: 0px 0px 5px 0px #9fb4f2;
    -webkit-box-shadow: 0px 0px 5px 0px #9fb4f2;
    box-shadow: 0px 0px 5px 0px #9fb4f2;
    background-color:#2d8ccc;
    -moz-border-radius:16px;
    -webkit-border-radius:16px;
    border-radius:16px;
    border:1px solid #4e6096;
    display:inline-block;
    cursor:pointer;
    color:#ffffff;
    font-family:Trebuchet MS;
    font-size:24px;
    padding:18px 55px;
    text-decoration:none;
    text-shadow:-1px 0px 0px #283966;
    position: absolute;
    display: flex;
    align-items: center;
    flex-flow: column;
    justify-content: center;

    
}
.razorpay-payment-button:hover {
    background-color:#527196;
}
.razorpay-payment-button:active {
    position:relative;
    top:1px;
}
}

     </style>
    
</head>
<body>
  
    <div class="jumbotron text-center" >
  <center><h2 class="display-3" ><font color="red"><b><u>Terms and Conditions</u></b></font></h2></center>
  <p ><strong>1) You are agreeing to pay the processed fee to GMRIT | STEPCONE 2020</strong> </p>
  <p ><strong>2) Once the money transferred, can't be refunded.</strong> </p>
<p ><strong>3) Taxes will be included (2.42 % ) as per the norms.</strong> </p>
</div>
<!-- partial -->
  <script src='https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js'></script>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js'></script>
<form action="success.php" method="POST" >
<!--
<?php echo $total;?>-->

<?php
$j=0;
for($i=0;$i<$n;$i++)
{
    try{
    //echo $_POST['rs'.$i]." ";
    if(isset($_POST['rs'.$i])){
        $type=$_POST['type'.$i];
        $name=$_POST['name'.$i];
    //echo $type." ".$name;
    echo "<input type='hidden' name='type".$j."' value='$type'>";
    echo "<input type='hidden' name='name".$j."' value='$name'>";
    $j+=1;
}
}
catch(Exception $e){}
}
echo "<input type='hidden' name='num' value='$j'>";
echo "<input type='hidden' name='email' value='$email'>";
?>
<!--<?php echo $total;?>-->
<script
    src="https://checkout.razorpay.com/v1/checkout.js"
    data-key="<?php echo $razor_api_key;?>" // Enter the Key ID generated from the Dashboard
    data-amount="<?php echo $total;?>" // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise or INR 500.
    data-currency="INR"
    data-buttontext="Proceed To Pay"
    data-name="GMRIT"
    data-description=" STEPCONE 2020"
    data-image="https://cdn.razorpay.com/logos/DCaiRnJ8DUf2Ja_medium.jpg"
    data-prefill.name="<?php echo($x[0]);?>"
    data-prefill.email="<?php echo($email);?>"
    data-prefill.contact="<?php echo($x[1]);?>"
    data-theme.color="#528FF0"

></script>

<input type="hidden" custom="Hidden Element" name="hidden">
</form>

</body>
</html>