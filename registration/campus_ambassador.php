<?php
if(!($connection=mysql_connect("208.91.198.197","stepcone2019","Stepcone@2019")))
die("could not connect");
function showerror()
{
die("error:".mysql_error().":".mysql_error());
}
if(!(mysql_select_db("stepcone2019",$connection)))
showerror();

$h=$_POST['email'];
$query="insert into campus_ambassador(Email)values('$h')";
$result=mysql_query($query,$connection);
if($result){
echo "<script>window.top.location='success.html'</script>";
}
else
echo mysql_error();
?>
