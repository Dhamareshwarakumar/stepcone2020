
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

<script type="text/javascript">
	
      function change(){
 clear();
 	       var name=document.getElementById('type').value;
      
        if(name=='null'){
          document.getElementById('type_name').innerHTML="";
          document.getElementById('topic').style.display=none;
        }
        else if(name=="paper"){
          //alert("topic");
          document.getElementById('topic').style.display=none;
          document.getElementById('type_name').innerHTML="";
          }
        else if(name=="workshop"){
        //  alert("work");
          document.getElementById('type_name').innerHTML=" Workshop";
          var arr=['null','PEGA','AR & VR','Advancements in Ultra lightweight concrete','Industrial Automation','System Design using LABVIEW','LoRa Deployment for smart cities','Sustainable Solar Energy','Autonomous Vehicle Technology','Programming and hands on experience with CNC','Data Science'];
          var string="";

          for(i=0;i<arr.length;i++)
                {
                	var option = document.createElement("option");
					option.text = arr[i];
					option.value = arr[i];
					var select = document.getElementById("topic");
					select.appendChild(option);
                    //string=string+"<option value='"+arr[i]+"''>"+arr[i]+"</option>";
                }
  //              string="<option id='topics'>"+string+"</option>";
                //document.getElementById("output").innerHTML=string;
        }
        else if(name=="spotlight"){
        	
          document.getElementById('type_name').innerHTML=" Spotlight";
          var arr=['null','AI Hackathon','Codeathon','AI Hackathon and Codeathon(combo)','Idea Factory','Drone Voyage','Industry Defined Problems','Project Design Contest','Go-Kart','Robo race','Robo Combo','Robosoccer','Youth Talk','Mock-Uno'];
          var string="";

          for(i=0;i<arr.length;i++)
                {
                		var option = document.createElement("option");
					option.text = arr[i];
					option.value = arr[i];
					var select = document.getElementById("topic");
					select.appendChild(option);
                
                    string=string+"<option value='"+arr[i]+"''>"+arr[i]+"</option>";
                }
//                string="<option id='topics'>"+string+"</option>";
               // document.getElementById("output").innerHTML=string;
        
        }
        else if(name=="technical event"){
          document.getElementById('type_name').innerHTML=" Technical Event";  
          var arr=['null','Debugging','Blind-Coding','Akruthi','Technomancy','Circuit Crackers','Circuit Routing','Fox Hunt','Tech Quiz','Query Cracking','Code Quest','Rocket Car','Design Doh'];
          var string="";
          for(i=0;i<arr.length;i++)
                {	var option = document.createElement("option");
					option.text = arr[i];
					option.value = arr[i];
					var select = document.getElementById("topic");
					select.appendChild(option);
                    string=string+"<option value='"+arr[i]+"''>"+arr[i]+"</option>";
                }
//                string="<option id='topics' >"+string+"</option>";
                //document.getElementById("output").innerHTML=string;
        }
      }
     function clear()
     {
       var select = document.getElementById("topic");
var length = select.options.length;
while(length!=0){
          var select = document.getElementById("topic");
var length = select.options.length;
  select.options[0] = null;
}
     }
</script>
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
</tr>
	<tr>
		<td>College</td>
<td><select name="clg" id="clg">
	<option value="null">All</option>
	<option value="GMRIT">GMR Institute of Technology</option>
	<option value="Other">Other</option>
</select></td></tr>
<tr>
	<td>Event Type</td>
	<td><select class="form-control" name="type" id="type" onchange="change()">
        <option value="null">All</option>
        <option value="paper">Paper Presentation</option>
        <option value="workshop">Workshops</option>
        <option value="spotlight">Spotlights</option>
        <option value="technical event">Technical Events</option>
      </select></td>
</tr>
<div id="show" style="display: none;">
<tr>
	<td><span id="type_name"></span></td>
	<td><select name="topic" id="topic">
	</select></td>
</tr>
</div>
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
	else
		$k=1;
	}
	$type=$_POST['type'];
	//echo $type;
	if($type!="null")
	{
		if($k==1)
			$str=" where Type='".$type."'";
		else 
			$str=$str." and Type='".$type."'";
	}
	else
		$k=1;
	try{
		if(isset($_POST['topic'])){
	$topic=$_POST['topic'];
}
else
$topic="null";
	}
	catch(Exception $e)
	{
		$topic="null";
	}
	//echo $topic;
	if($topic!="null")
	{
		if($k==1)
			$str=" where Name='".$topic."'";
		else
			$str=$str." and Name='".$topic."'";
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
	//SELECT count(*) FROM registration as R join event_registration as ER on ER.Email=R.Email
$query="select Fname,Lname,Year,Department,Registrationnumber,Institutename,R.Email,Phoneno,Type,Name,Mem1,Mem2,Mem3,Mem4,Mem5,Status FROM registration as R join event_registration as ER on ER.Email=R.Email".$str." order by Email";
$result=mysql_query($query);

if($result)
{
	if($type!="null")
	echo "<b>Event Type </b> :  ".$type;
	else
		echo "<b>Event Type </b> : ALL";
	echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
	if($topic!="null")
	echo "<b>Event Name </b> :  ".$type;
	else
		echo "<b>Event Name </b> : ALL";
	echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
	if($year!="null")
	echo "<b>Year </b> :  ".$year;
	else
		echo "<b>Year </b> : ALL";
	
	echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
	if($dept!="null")
	echo "<b>Department </b> :  ".$dept;
	else
		echo "<b>Department </b> : ALL";
	echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
	if($clg!="null")
	echo "<b>Institution </b> :  ".$clg;
	else
		echo "<b>Institution </b> :  ALL";
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
	<th>Event Type</th>
	<th>Event Name</th>
	<th>Member1</th>
	<th>Member2</th>
<th>Member3</th>
<th>Member4</th>
<th>Member5</th>
<th>Status</th>
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
	for($j=8;$j<10;$j++)
		echo "<td>".$x[$j]."</td>";
	for($j=10;$j<15;$j++)
		echo "<td><a href='details.php?Email=".$x[$j]."'>".$x[$j]."</a></td>";
		echo "<td>".$x[$j]."</td>";
	echo "</tr>";
}
?>
</table></div>
<div><a href="eexcel.php?link=<?php echo($str)?>"><button type="button">Download Excel</button></a></div>
<?php
}
else
echo mysql_error();
}
?>	