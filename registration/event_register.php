<?php
if(!($connection=mysql_connect("208.91.198.197","stepcone2019","Stepcone@2019")))
die("could not connect");
function showerror()
{
die("error:".mysql_error().":".mysql_error());
}
if(!(mysql_select_db("stepcone2019",$connection)))
showerror();
$a=$_POST['email'];
$b=$_POST['type'];
$c=$_POST['event'];
$d=$_POST['member_email1'];
$e=$_POST['member_email2'];
$f=$_POST['member_email3'];
$g=$_POST['member_email4'];
$h=$_POST['member_email5'];
$i=0;
if($a==$d)
$d="";
$query="insert into event_registration(Email,Type,Name,Mem1,Mem2,Mem3,Mem4,Mem5,status)values('$a','$b','$c','$d','$e','$f','$g','$h','$i')";
$result=mysql_query($query,$connection);
if($result){
	if($c=='AI Hackathon'||$c=='AI Hackathon and Codeathon(combo)'){
	echo "<script>window.top.location='event_success_aicombo.html'</script>";
}
echo "<script>window.top.location='event_success.html'</script>";
}
else
echo "<script>window.top.location='home.html'</script>"; 
?>
