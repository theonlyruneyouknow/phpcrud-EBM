<?php
function pdo_connect_mysql() {
    $DATABASE_HOST = 'localhost';
    $DATABASE_USER = 'root';
    $DATABASE_PASS = 'Trygve';
    $DATABASE_NAME = 'rmdb_ebm';
    try {
    	return new PDO('mysql:host=' . $DATABASE_HOST . ';dbname=' . $DATABASE_NAME . ';charset=utf8', $DATABASE_USER, $DATABASE_PASS);
    } catch (PDOException $exception) {
    	// If there is an error with the connection, stop the script and display the error.
    	exit('Failed to connect to database!');
    }
}
function template_header($title) {
echo <<<EOT
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>$title</title>
		<link href="style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	</head>
	<body>
    <nav class="navtop">
    	<div>
EOT;	
}
?>	
		 <?php
include 'nav_header.php';

 ?>

    		<!-- // <h1>England Birminham Alumni Database Website</h1>
            // <a href="index.php"><i class="fas fa-home"></i>Home</a>
    		// <a href="read_alumni.php"><i class="fas fa-address-book"></i>Alumni</a>
    		// <a href="read_alumni_cities.php"><i class="fas fa-address-book"></i>alumni cities</a>
    		// <a href="read.php"><i class="fas fa-address-book"></i>Companionship</a>
    		// <a href="read_alumni_comp.php"><i class="fas fa-address-book"></i>Alumni_comp</a>
    		// <a href="read_alum_area_seq.php"><i class="fas fa-address-book"></i>Alumni-area-seq</a>
    		// <a href="read_template.php"><i class="fas fa-address-book">read_template</i></a>
    		// <a href="read_alum_area_seq_by_alum_id.php"><i class="fas fa-address-book">read_alum_area_seq_by_alum_id</i></a>

			// read_alum_area_seq_by_alum_id */
  -->


echo <<<EOT
    	</div>
    </nav>
EOT;
}
function template_footer() {
echo <<<EOT
    </body>
</html>
EOT;
}
?>
