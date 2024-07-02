<?php

 //include 'phpSearchOption.php';
//  include_once '_buttonlinks.php';
include 'functions.php';
 ?>

<?=template_header('Home')?>
<br><br>
<div>
<?php
$search = $_POST['search'];
$column = $_POST['column'];

//$servername = "localhost";
//$username = "bob";
//$password = "123456";
//$db = "classDB";

$servername="localhost:3306";
$port=3306;
$socket="";
$username="root";
$password="Trygve";
$dbname="rmdb_ebm";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error){
	die("Connection failed: ". $conn->connect_error);
}

//$sql = "select * from students where $column like '%$search%'";
if ($column == "firstname"){
$sql = "select * from alumni where $column like '%$search%'"; //" and lastname like '%$LNsearch%' ";
}
if ($column == "alum_id"){
    $sql = "select * from alumni where $column like '$search'"; //" and lastname like '%$LNsearch%' ";
    }
if ($column == "lastname"){
        $sql = "select * from alumni where $column like '%$search%'"; //" and lastname like '%$LNsearch%' ";
    }
$result = $conn->query($sql);

if ($result->num_rows > 0){
?>
Search results:
<br><br>
<?php
	 echo "<table border='1'>

<tr>

<th>Id</th>

<th>First name</th>

<th>lastname</th>

<th>Areas and Companions</th>


</tr>";
while($row = $result->fetch_assoc() ){
//	echo $row["name"]."  ".$row["age"]."  ".$row["gender"]."<br>";
	//table 
	 echo "<tr>";

  echo "<td>" ."<a href=view_e_alumni.php?id=" . $row['alum_id'] . ">" . $row['alum_id'] . "</td>";
  echo "<td>" . $row['firstname'] . "</td>";

//	echo "<td>" .$row["firstname"]."  ".$row["lastname"]. "</td>";
	
  echo "<td>" . $row['lastname'] . "</td>";
 echo "<td>" . $row['cities'] . "</td>";

  echo "</tr>";

 // echo "</table>";

 
}
} else {
	echo "0 records";
}

$conn->close();


echo "<br>";

// include 'searchoption.html';
 echo "</div>";
 echo "<div>";
 //include 'searcharea.php';
 echo "</div>";

 include 'search3options.php';
?>

