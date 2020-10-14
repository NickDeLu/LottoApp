<link rel = "stylesheet" type="text/css" href = "css.css">
<nav class ="flex-container">
	<a href ="insert-set-form.php">Insert new set</a>
	<a href="select-sets.php">Select a set</a>
</nav>

<?php
//process-delete-set-form.php


$setId = $_GET["setId"];
?>
<div class ="center-container">
	<p><?php echo ("set id:  " . $setId . " was deleted!"); ?> </p>

	<p><?php echo ("Return to set page: ");?></p>
	<p><a href="select-sets.php">Select a set</a><p>
</div>
<?php
$dsn = "mysql:host=localhost:3306;dbname=delunico_lotto_sets;charset=utf8mb4";

$dbusername = "delunico_delunico";
$dbpassword = "_Deluca_421_";
// $dsn = "mysql:host=localhost;dbname=lotto_sets;charset=utf8mb4";
//
// $dbusername = "root";
// $dbpassword = "";

//php logging into the database
$pdo = new PDO($dsn, $dbusername, $dbpassword);


$stmt = $pdo->prepare("DELETE FROM `settable` WHERE `setId` = $setId");

$stmt->execute();
?>
