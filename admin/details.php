
<?php
if(!isset($_SERVER['HTTP_REFERER'])){
    // redirect them to your desired location
    header('location: error.php');
    exit;
}
?>
<?php
if(!($connection=mysql_connect("208.91.198.197","stepcone2019","Stepcone@2019")))
//if(!($connection=mysql_connect("localhost","root","")))
die("could not connect");
function showerror()
{
die("error:".mysql_error().":".mysql_error());
}
if(!(mysql_select_db("stepcone2019",$connection)))
showerror();
$email=$_GET['Email'];

$query="select Fname,Lname,Year,Department,Registrationnumber,Institutename,Email,Phoneno from registration where Email='".$email."'";
$result=mysql_query($query);
//echo mysql_error();
?>
<br><br>
<table border="1">
<tr>
	<th>Name</th>
	<th>Year</th>
	<th>Department</th>
	<th>Reg No.</th>
	<th>Institute Name</th>
	<th>Email</th>
	<th>Phone Number</th>
</tr>
<?php
	
	$x=mysql_fetch_array($result);
	echo "<tr><td>".$x[0]." ".$x[1]."</td>";
	for($j=2;$j<7;$j++)
		echo "<td>".$x[$j]."</td>";
	$phn="tel:".$x[7][0].$x[7][1].$x[7][2]."-".$x[7][3].$x[7][4].$x[7][5]."-".$x[7][6].$x[7][7].$x[7][8].$x[7][9];
	$x[7]="<a href='".$phn."'>".$x[7]."</a>";
		echo "<td>".$x[7]."</td>";
	echo "</tr></table>";

	$query="select Type,Name,Status from event_registration where Email='".$email."' or Mem1='".$email."' or Mem2='".$email."' or Mem3='".$email."' or Mem4='".$email."' or Mem5='".$email."'";
	$result=mysql_query($query);

?>
<br>
<b>Events Registered</b>
<br><br>
<table border="1">
	<tr>
		<th>S. No</th>
		<th>Event Type</th>
		<th>Event Name</th>
		<th>Status</th>
	</tr>
	<?php
	$n=mysql_num_rows($result);
	for($i=0;$i<$n;$i++)
{
	$x=mysql_fetch_array($result);
	//echo "<tr><td>".$x[0]." ".$x[1]."</td>";
	echo "<td>".($i+1)."</td>";
	for($j=0;$j<3;$j++)
		echo "<td>".$x[$j]."</td>";
	echo "</tr>";
}
?>
</table>