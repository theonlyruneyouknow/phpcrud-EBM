<?php
// include ('4-form1.php');
include ('functions.php');
echo '<br><br>';
?>

<?php
//    if( $_POST["firstname"] || $_POST["id"] ) {
//     //   if (preg_match("/[^A-Za-z'-]/",$_POST['name'] )) {
//     //      die ("invalid name and name should be alpha");
//     //   }
//     //   echo "Welcome ". $_POST['name']. "<br />";
//     //   echo "You are ". $_POST['id']. " years old.<br />";
      
//     //   exit();
//    }
?>
<?php
$servername="localhost:3306";
$port=3306;
$socket="";
$username="root";
$password="Trygve";
$dbname="rmdb_ebm";
$gotid = $_POST['id'];
$area_name = $_POST['area_name'];
// $lastname = $_POST['lastname'];
// $title = $_POST['title'];

// if (isset($year1) || isset($year2)) {
// $start_date = $_POST['start_date'];
// $end_date = $_POST['end_date'];
// };
// echo $gotid;
// echo $gotname;
// echo $gotyear1;
// echo $gotyear2;

       //     city_name,
    //    state_name, country_name
 

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = ("UPDATE areas SET 
  area_name = '$area_name'
  WHERE area_id = $gotid");  
    // $sql = ("UPDATE alumni SET 
    // -- mis_title = '$title', 
    // firstname = '$firstname'
    // -- , lastname = '$lastname', start_date = '$start_date',  end_date = '$end_date' 
    // WHERE area_id = $gotid");
    // // Prepare statement $_POST['gotid']
    $stmt = $conn->prepare($sql);
  
    // execute the query
    $stmt->execute();
  
    // echo a message to say the UPDATE succeeded
    echo $stmt->rowCount() . " records UPDATED successfully";
  } catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
  }
  
  $conn = null;


include 'searchoptionArea.html';
?>
  