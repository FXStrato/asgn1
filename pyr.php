<?php
class Player {
	private $name;
	private $link;
	private $info;

	function Player($name) {
		$this->name = $name;
	}

	function getPlayer() {
		$conn   = new PDO('mysql:host=jeffrz.cvpvls47nbkz.us-west-2.rds.amazonaws.com;dbname=assignment1', 'root', 'mypassword');
        $stmt   = $conn->prepare('SELECT * FROM nba WHERE name LIKE "%' . $this->name . '%" ORDER BY name asc');
        $stmt->execute(array());
        $result = $stmt->fetchAll();
        $this->info = $result;
        return $result;
	}

}
?>