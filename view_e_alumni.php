<?php

include ('functions.php');
include_once ('_buttonlinks.php');


echo "<br><br>";
?>
<?php


   if(  $_GET["id"] ) {
    //   echo "Welcome ". $_GET['name']. "<br />";
      echo "You have selected:";
      $_SESSION["id"] = $gotid = $_GET['id'];
       

      echo "Stored data in memory: <br>";
      echo "RM1_id = " . $gotid . "<br>";
     // echo "firstname = " . $firstname . "<br>";
     // echo "lastname = " . $lastname . "<br>";
      
    //   exit();
   }

   $servername="localhost:3306";
   $port=3306;
   $socket="";
   $username="root";
   $password="Trygve";
   $dbname="rmdb_ebm";
   
   // $sql = "SELECT t_id, testcol FROM test where t_id = 1";
   // $result = $conn->query($sql);
   
   try {
       $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
       $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       $stmt = $conn->prepare("SELECT alum_id, mis_title, firstname, lastname, start_date, end_date, cities FROM alumni where alum_id = $gotid");
       $stmt->execute();
     
       // set the resulting array to associative
       $result = $stmt -> fetch();
       $page = isset($_GET['id']) && is_numeric($_GET['id']) ? (int)$_GET['id'] : 1;
    //    $page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
       $records_per_page = 1;
       $contacts = $stmt->fetchAll(PDO::FETCH_ASSOC);
       // Get the total number of contacts, this is so we can determine whether there should be a next and previous button
       //$num_contacts = $pdo->query('SELECT COUNT(*) FROM alumni')->fetchColumn();
       
       $gotid = $result[0];
       $_SESSION["id"] = $gotid;
       $title = $result[1];
     //  $_SESSION["$firstname"] = 
       $firstname = $result[2];
       //$_SESSION["$lastname"] = 
       $lastname = $result[3];
       
       $start_date = $result[4];
       $end_date = $result[5];
       
       $cities = $result[6];
      // echo $result[0];
      // echo $result[1];
      
       $_SESSION["firstname"] = $firstname ;
       $_SESSION["lastname"] = $lastname ;
       
      echo "firstname = " . $firstname . "<br>";
      echo "lastname = " . $lastname . "<br>";
      echo "<br>" .$gotid . " " . $title . " " . $firstname . " " . $lastname . " " . $start_date . " " . $end_date ."<br>" . $cities ;
       // echo implode(" ",$result);
   
    //    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    //    foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
    //      echo $v;
       //   echo $v[0];
    //    }
     } catch(PDOException $e) {
       echo "Error: " . $e->getMessage();
       echo $v[0];
     }
     $conn = null;
     echo "</table>"; 
?>

<html>
   <body>
   <!--
      <form action = upd_alumni.php method = POST>
          alum_id, firstname, lastname, start_date, end_date, 
          Id: <input type = "text" name = "id"   value="<?php echo $gotid;?>"/><br>
          Title: <input type = "text" name = "title"   value="<?php echo $title;?>"/><br>
         First Name: <input type = "text" name = "firstname"  value="<?php echo $firstname;?>"/><br>
         Last Name: <input type = "text" name = "lastname"  value="<?php echo $lastname;?>"/><br>
         Start Year: <input type = "text" name = "start_date"   value="<?php echo $start_date;?>"/><br>
         End Year: <input type = "text" name = "end_date"  value="<?php echo $end_date;?>"/><br><br>
         <!-- Name: <input type = "text" name = "name"  value="         < ?php echo $gotname;?>"/> -->
    <!-- <input type = "Submit" value = "Update"/>
      </form>
    -->  
    <div class="pagination">
		<?php if ($page > 1): ?>
		<a href="read.php?page=<?=$page-1?>"><i class="fas fa-angle-double-left fa-sm"></i></a>
		<?php endif; ?>
		<?php if ($page*$records_per_page < $num_contacts): ?>
		<a href="read.php?page=<?=$page+1?>"><i class="fas fa-angle-double-right fa-sm"></i></a>
		<?php endif; ?>
	</div>
    <?php
    include 'phpSearcharea4.php'
?>   </body>
</html>