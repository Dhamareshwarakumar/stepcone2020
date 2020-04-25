<?php
if(!($connection=mysql_connect("208.91.198.197","stepcone2019","Stepcone@2019")))
die("could not connect");
function showerror()
{
die("error:".mysql_error().":".mysql_error());
}
if(!(mysql_select_db("stepcone2019",$connection)))
showerror();
$a=$_POST['first_name'];
$b=$_POST['last_name'];
$c=$_POST['year'];
$d=$_POST['dept'];
$e=$_POST['regno'];
$f=$_POST['clg'];
$g=$_POST['user_password'];
$h=$_POST['email'];
$i=$_POST['contact_no'];
//$j=$_POST['fb'];
//$k=$_POST['insta'];
$j=$_POST['camp_email'];
$query="insert into registration(Fname,Lname,Year,Department,Registrationnumber,Institutename,Password,Email,Phoneno,camp_email)values('$a','$b','$c','$d','$e','$f','$g','$h','$i','$j')";
$result=mysql_query($query,$connection);
if($result){
echo "<script>window.top.location='success_ai.html'</script>";
}
else
echo mysql_error();
?>
