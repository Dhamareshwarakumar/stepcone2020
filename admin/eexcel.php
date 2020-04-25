<?php  
$conn = mysql_connect("208.91.198.197:3306","stepcone2019","Stepcone@2019");  
mysql_select_db('stepcone2019',$conn);  
//$sql = "SELECT Fname,Lname,Year,Department,Registrationnumber,Institutename,Email,Phoneno from registration";
$str=$_GET['link'];
//echo $str;
//$sql="select Fname,Lname,Year,Department,Registrationnumber,Institutename,R.Email,Phoneno,Type,Name,Mem1,Mem2,Mem3,Mem4,Mem5,Status FROM registration as R join event_registration as ER on ER.Email=R.Email".$str." order by Email";
//$sql="select Fname,Lname,Year,Department,Registrationnumber,Institutename,Email,Phoneno from registration".$str." order by Email";
//echo $sql;  
$setRec = mysql_query("select Fname,Lname,Year,Department,Registrationnumber,Institutename,R.Email,Phoneno,Type,Name,Mem1,Mem2,Mem3,Mem4,Mem5,Status FROM registration as R join event_registration as ER on ER.Email=R.Email".$str." order by Email");  
$columnHeader = '';  
$columnHeader =  "FirstName" . "\t". "LastName" . "\t" . "Year" . "\t" . "Department" . "\t" . "Reg no" . "\t" . "College" . "\t"  . "Email" . "\t" . "Phone no" . "\t" . "Event Type" . "\t" . "Event name" . "\t". "member1" . "\t". "member2" . "\t". "member3" . "\t". "member4" . "\t". "member5" . "\t". "Status" . "\t";  
$setData = '';  
  while ($rec = mysql_fetch_row($setRec)) {  
    $rowData = '';  
    foreach ($rec as $value) {  
        $value = '"' . $value . '"' . "\t";  
        $rowData .= $value;  
    }  
    $setData .= trim($rowData) . "\n";  
}  
  
header("Content-type: application/octet-stream");  
header("Content-Disposition: attachment; filename=Event_registrations.xls");  
header("Pragma: no-cache");  
header("Expires: 0");  

  echo ucwords($columnHeader) . "\n" . $setData . "\n";  
 ?> 
 