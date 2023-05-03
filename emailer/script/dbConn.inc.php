<?php
try {
	$user='root';
	$pass='';
    $dbh = new PDO('mysql:host=localhost;dbname=bft', $user, $pass, array(PDO::ATTR_PERSISTENT => true));
   
   // $dbh = null;
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>