
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
?>

<form action="#" method="post">
<table>
	<tr>
		<td>Year</td>
<td><select name="year" id="year">
	<option value="null">All</option>
	<option value="1">1</option>
	<option value="2">2</option>
	<option value="3">3</option>
	<option value="4">4</option>
</select></td>
<tr>
	<tr>
		<td>Department</td>
<td><select name="dept" id="dept">
	<option value="null">All</option>
	<option value="CSE">CSE</option>
	<option value="ECE">ECE</option>
	<option value="EEE">EEE</option>
	<option value="CIVIL">CIVIL</option>
	<option value="CHEMICAL">CHEMICAL</option>
	<option value="IT">IT</option>
	<option value="POWER">POWER</option>
	<option value="MECHANICAL">MECHANICAL</option>
</select></td>
<tr>
	<tr>
		<td>College</td>
<td><select name="clg" id="clg">
	<option value="null">All</option>
	<option value="GMRIT">GMR Institute of Technology</option>
	<option value="Other">Other</option>
</select></td>
<tr>
	<td></td>
<td><input type="submit" name="filter" onclick="get()" value="Filter"></td>
</tr>
</table>
</form>

<?php
if(isset($_POST['filter'])){
	$str="";
	$year=$_POST['year'];
	$dept=$_POST['dept'];
	$k=0;
	if($year!="null"&&$dept!="null")
			$str=$str." where Year='".$year."' and Department='".$dept."'";
	elseif($year=="null"&&$dept!="null")
			$str=" where Department='".$dept."'";
	elseif($year!="null"&&$dept=="null")
		$str=" where Year='".$year."'";
	else
		$k=1;
	//echo $year;
	$clg=$_POST['clg'];
	if($clg!="null"){
	if($clg=="GMRIT"&&$k==0)
		$str=$str." and Institutename='GMR Institute of Technology'";
	elseif($clg=="GMRIT"&&$k==1)
		$str=" where Institutename='GMR Institute of Technology'";
	elseif($clg!="GMRIT"&&$k==0)
		$str=$str." and Institutename!='GMR Institute of Technology'";
	elseif($clg!="GMRIT"&&$k==1)
			$str=" where Institutename!='GMR Institute of Technology'";
	}
	?>

<body>
<!--	<script type="text/javascript">
		document.getElementById('year').getElementsByTagName('option')[<?php echo $_POST['year'] ?>].selected = 'selected';
		var d=["All","CSE","ECE","EEE","CIVIL","CHEMICAL","IT","POWER","MECHANICAL"];
		for(i=0;i<9;i++)
		{
			if(d[i]==<?php echo $_POST['dept']; ?>){
		document.getElementById('dept').getElementsByTagName('option')[i].selected = 'selected';
			break;
	}
		}
		document.getElementById('clg').getElementsByTagName('option')[<?php echo $_POST['clg'] ?>].selected = 'selected';
	</script>-->

	<?php
$query="select Fname,Lname,Year,Department,Registrationnumber,Institutename,Email,Phoneno from registration".$str." order by Email";
$result=mysql_query($query);

if($result)
{
	if($year!="null")
	echo "<b>Year Selected</b> :  ".$year;
	else
		echo "<b>Year Selected</b> : ALL";
	
	echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
	if($dept!="null")
	echo "<b>Department Selected</b> :  ".$dept;
	else
		echo "<b>Department Selected</b> : ALL";
	echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
	if($clg!="null")
	echo "<b>Institution Selected</b> :  ".$clg;
	else
		echo "<b>Institution Selected</b> :  ALL";
	echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
	$n=mysql_num_rows($result);
	echo "<b>Count</b>  :  ".$n;
	echo "<div style='display: block;'><table border=1>";
?>

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
	for($i=0;$i<$n;$i++)
{
	$x=mysql_fetch_array($result);
	echo "<tr><td>".$x[0]." ".$x[1]."</td>";
	for($j=2;$j<6;$j++)
		echo "<td>".$x[$j]."</td>";
	echo "<td><a href='details.php?Email=".$x[6]."'>".$x[6]."</a></td>";
	$phn="tel:".$x[7][0].$x[7][1].$x[7][2]."-".$x[7][3].$x[7][4].$x[7][5]."-".$x[7][6].$x[7][7].$x[7][8].$x[7][9];
	$x[7]="<a href='".$phn."'>".$x[7]."</a>";
		echo "<td>".$x[7]."</td>";
	echo "</tr>";
}
?>
</table></div>
<div><a href="excel.php?link=<?php echo($str)?>"><button type="button">Download Excel</button></a></div>
<?php
}
else
echo mysql_error();
}
?>