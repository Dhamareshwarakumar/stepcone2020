<!DOCTYPE html>
<html lang="en" >
<head>
  <style type="text/css">
        #Number::-webkit-inner-spin-button, 
       #Number::-webkit-outer-spin-button { 
          -webkit-appearance: none; 
        margin: 0; 
          }
          
    </style>
    <style>
      .container{
        /*background-color: blue;*/
      }
#customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}

</style>
<script type="text/javascript" >
   function preventBack(){window.history.forward();}
    setTimeout("preventBack()", 0);
    window.onunload=function(){null};
</script>
  <script type="text/javascript">
    function funotp(form1)
    {
      //alert('hi');
      var email=document.form1.email.value;
      $(document).ready(function(){
        $.get("forgot_password.php?email="+email,function(data){
          //alert();
          var phone=data.substring(1,11);
          var msg=data.substring(11,data.length-1);
          msg="Welcome to STEPCONE 2020.\n "+msg+" is your password. Please remember it";
          //alert(msg);
          var wnd=window.open("http://push.vg4mobile.com/newBulkClient.jsp?senderID=GMRIT&msisdn=91"+phone+"&userid=477&msg="+msg+"&pwd=gmrit@vgt");
          document.getElementById('num').innerHTML="Password Has Been Sent To *******"+phone.substring(7);
           setTimeout(function()
{
  wnd.close();
},0);
        });
      });
      }
      
    </script>
  <meta charset="UTF-8">
  <title>Payment Form</title>
  <script src="js/modernizr.min.js" type="text/javascript"></script>

<link rel='stylesheet' href='css/bootstrap.min.css'>
<link rel='stylesheet' href='css/bootstrap-theme.min.css'>
<!--<link rel='stylesheet' href='css/bootstrapValidator.min.css'>-->
<link rel="stylesheet" href="../assets/css/user_register.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

</head>
<body onload="f()" >
<!-- partial:index.partial.html -->
    <div class="container">

    <form class="well form-horizontal" method="post" action="#" id="contact_form" name="form1">
<fieldset>

<!-- Form Name -->
<legend><center><h2><b>Payment Form</b></h2></center></legend><br>

       <div class="form-group">
  <label class="col-md-4 control-label">E-Mail</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
  <input name="email" placeholder="E-Mail Address" class="form-control" id="email"  type="text">
    </div>
  </div>
  <span id="num"></span>
</div>


<!-- Text input-->
       
<div class="form-group">
  <label class="col-md-4 control-label" >Password</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
  <input name="user_password" placeholder="Password" class="form-control" id="password" type="password"  >
    </div>
  </div>
  <button type="button" class="btn btn-warning" onclick="funotp()" >Forget Password ? </button>
</div>



<!-- Success message -->
<div class="alert alert-success" role="alert" id="success_message">Success <i class="glyphicon glyphicon-thumbs-up"></i> Success!.</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label"></label>
  <div class="col-md-4" align="center"><br>
    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<button name="get" type="submit" class="btn btn-warning"  >&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspGet Details <span class="glyphicon glyphicon-send"></span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</button>
  </div>
</div>
</form>
<div>
  <form action="pay_online1.php" method="post">
<?php
    if(isset($_POST['get'])){
      //echo "reloaded";
$connection=mysql_connect("208.91.198.197","stepcone2019","Stepcone@2019");
mysql_select_db("stepcone2019",$connection);
      $email=$_POST['email'];
      $pass=$_POST['user_password'];
      $q="select Fname,Phoneno from registration where Email='$email'";
      $x=mysql_fetch_array(mysql_query($q));
      //echo $email.$pass;
      echo "<input type='hidden' name='email1' id='email1' value='$email'>";
      echo "<input type='hidden' name='pass1' id='pass1' value='$pass'>";
      ?>
      <script type="text/javascript">
        document.getElementById('email').value=document.getElementById('email1').value;
        document.getElementById('password').value=document.getElementById('pass1').value;

          //document.getElementById('kiran').style.display="block";
      

      </script>
      <?php
$query="select Type,Name from event_registration where Email='$email' and status=0";
$clg=mysql_fetch_array(mysql_query("select Institutename from registration where Email='$email'"));
$clg=$clg[0];
//echo $clg;
$result=mysql_query($query);
$n=mysql_num_rows($result);
if($n==0)
echo "You are Not Regsitered For Any Event";
else{
  ?>
  <table id="customers" align="center" >
    <tr>
      <th>S.No </th>
      <th>Type </th>
      <th>Name of the Event</th>
      <th>Amount</th>
      <th>Select to pay</th>
<script type="text/javascript">
  function change(i){
    var cost=parseInt(document.getElementById('cost'+i).value);
    //alert(cost);
    var sum=parseInt(document.getElementById('total').value);
    //var cost=document.getElementById()
    var checkBox = document.getElementById("rs"+i);
    if(checkBox.checked==true){
//      alert('true');
      sum=sum+cost;
      document.getElementById('total').value=sum;
      //alert(sum);
    }
    else{
      //alert('false');
      sum=sum-cost;
      document.getElementById('total').value=sum;
      //alert(sum);
    }
    document.getElementById('sum').innerHTML=sum;
    //document.getElementById('aaa').style.display="none";
  }
  function changee(i){
var cost=parseInt(document.getElementById('cost'+i).value);
    //alert(cost);
    var sum=parseInt(document.getElementById('total').value);
    //var cost=document.getElementById()
    var checkBox = document.getElementById("rs"+i);
    if(checkBox.checked==true){
//      alert('true');
      sum=sum+cost;
      document.getElementById('total').value=sum;
      //alert(sum);
    }
    else{
      //alert('false');
      sum=sum-cost;
      document.getElementById('total').value=sum;
      //alert(sum);
    }
    document.getElementById('sum').innerHTML=sum;

  }
</script>
    </tr>
    <?php
    $rs=array();
    $c=0;
    $sum=0;
    if($clg!="GMR Institute of Technology"){
         $c=1;
        }
    for($i=1;$i<=$n;$i++)
    {
      $ex=mysql_fetch_array($result);
      echo "<input type='hidden' value='$ex[0]' name='type".($i-1)."'>";
       echo "<input type='hidden' value='$ex[1]' name='name".($i-1)."'>";
//      $query="select Internal,External from fee where Type=$ex[0] and Name="
      
      if($ex[0]=="paper"){
        $ex[0]="Paper Presentation";
        if($clg=="GMR Institute of Technology")
          $rs[$i-1]=100;
        else
          $rs[$i-1]=150;
      }
      elseif ($ex[0]=="technical event") {
        $ex[0]="Technical Event";
        if($clg=="GMR Institute of Technology")
          $rs[$i-1]=200;
        else
          $rs[$i-1]=250;
      }
      elseif ($ex[0]=="workshop") {
        $ex[0]="Workshop";
        if($ex[1]=="Data Science"||$ex[1]=="LoRa Deployment for smart cities"||$ex[1]=="AR & VR")
          $rs[$i-1]=700;
        elseif($clg=="GMR Institute of Technology")
            $rs[$i-1]=550;
        else
          $rs[$i-1]=650;
      }
      elseif ($ex[0]=="spotlight"){
        $queryy="select Internal,External,per from fee where Type='$ex[0]' and Name='$ex[1]'";
        $r=mysql_fetch_array(mysql_query($queryy));
        if($r[2]==0)
        {
          if($clg=="GMR Institute of Technology")
          $rs[$i-1]=$r[0];
        else
          $rs[$i-1]=$r[1];
        }
        else{
          $queryy="select Mem1,Mem2,Mem3,Mem4,Mem5 from event_registration where Email='$email' and Type='spotlight' and Name='$ex[1]'";
          $a=mysql_fetch_array(mysql_query($queryy));
          $count=1;
          for($x=0;$x<5;$x++)
          {
            if($a[$x]!="")
              $count+=1;
          }
          //echo $count.$a[0]." ".$a[1];
          if($clg=="GMR Institute of Technology"){
          $rs[$i-1]=$r[0]*$count;

        }
        else{
          $rs[$i-1]=$r[1]*$count;
           
        }
        }
      }
      echo "<tr><td> ".$i." </td><td>".$ex[0]."</td><td>".$ex[1]."</td><td>Rs.".$rs[$i-1]."</td><td><input type='checkbox' name='rs".($i-1)."' id='rs".($i-1)."' checked onclick='change($i-1)'></td></tr>";
      echo "<input type='hidden' id='cost".($i-1)."' value=".$rs[$i-1].">";
      $sum=$sum+$rs[$i-1];
    }
    if ($c==1){
        echo "<tr><td> ".$i." </td><td>Registration</td><td>Basic</td><td>Rs.300</td><td><input type='checkBox' name='rs".($i-1)."' id='rs".($i-1)."' onclick='changee($i-1)'></td></tr>";
      echo "<input type='hidden' id='cost".($i-1)."' value='300'>";
      $i++;
      echo "<tr><td> ".$i." </td><td>Registration</td><td>Basic + Accomodation</td><td>Rs.750</td><td><input type='checkBox' name='rs".($i-1)."' id='rs".($i-1)."' checked onclick='changee($i-1)'></td></tr>";
      echo "<input type='hidden' id='cost".($i-1)."' value='750'>";
      $sum=$sum+750;
      }
    echo "<td></td><td><b>Total</td><td></td><td> <b>Rs.<span id='sum'></span></td><td></td>";
    echo "<input type='hidden' name='total' value=$sum id='total'>";

    ?>
    <script type="text/javascript">
      document.getElementById('sum').innerHTML=document.getElementById('total').value;

     // alert("hii");
    </script>

  </table>
  <div id="kiran" align="center" >
  <br>
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<button  class="btn btn-warning" >&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspProceed To Pay <span class="glyphicon glyphicon-send"></span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</button>
</div><?php 
}
}
?>
</div>

</fieldset>
</form>
</div>

    </div><!-- /.container -->
<!-- partial -->
  <script src='../assets/js/jquery.min.js'></script>
<script src='../assets/js/bootstrap.min.js'></script>
<script src='../assets/js/bootstrapvalidator.min.js'></script>
<script  src='pay.js'></script>
  
</body>
</html>