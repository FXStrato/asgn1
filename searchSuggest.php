<?php
/* This file connects to the database and returns a list of values 
	that match the given input sent by index.php. This is part of the dynamic
	AJAX search inquiry. */
///Make sure that a value was sent.
search();

function search() {
	if (isset($_GET['search']) && $_GET['search'] != '') {
		try {
		  $search = $_GET['search'];
		  $conn = new PDO('mysql:host=jeffrz.cvpvls47nbkz.us-west-2.rds.amazonaws.com;dbname=assignment1', 'root', 'mypassword');
		  $stmt = $conn->prepare('SELECT * FROM nba WHERE name LIKE "%' . $search . '%"');
		  $stmt->execute(array());
		 
		  $result = $stmt->fetchAll();
		  if ( count($result) ) { 
		    foreach($result as $row) {
		      echo $row['name'] . "\n";
		    }   
		  } else {
		    echo "No rows returned.";
		  }
		} catch(PDOException $e) {
		    echo 'ERROR: ' . $e->getMessage();
		}
	}
}
?>