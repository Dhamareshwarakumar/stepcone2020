<?php  
$conn =mysql_connect("208.91.198.197:3306","stepcone2019","Stepcone@2019");  
mysql_select_db('stepcone2019',$conn);  
//$sql = "SELECT Fname,Lname,Year,Department,Registrationnumber,Institutename,Email,Phoneno from registration";
$str=$_GET['link'];
//echo $str;
//$sql="select Fname,Lname,Year,Department,Registrationnumber,Institutename,Email,Phoneno from registration".$str." order by Email";
//echo $sql;  
$setRec = mysql_query("select Fname,Lname,Year,Department,Registrationnumber,Institutename,Email,Phoneno from registration".$str." order by Email");  
$columnHeader = '';  
$columnHeader =  "First Name" . "\t" . "Last Name" . "\t" . "Year" . "\t" . "Department" . "\t" . "Reg no" . "\t" . "College" . "\t"  . "Email" . "\t" . "Phone no" . "\t" ;  
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
header("Content-Disposition: attachment; filename=User_Detail.xls");  
header("Pragma: no-cache");  
header("Expires: 0");  

  echo ucwords($columnHeader) . "\n" . $setData . "\n";  
 ?> 
 