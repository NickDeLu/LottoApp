<link rel = "stylesheet" type="text/css" href = "css.css">
<nav class ="flex-container">
	<a href ="insert-set-form.php">Insert new set</a>
	<a href="select-sets.php">Select a set</a>
</nav>

<?php
//process-insert-set-form.php

//receive input
$setName = $_POST["setName"];
$set = $_POST["set"];

$dsn = "mysql:host=localhost:3306;dbname=delunico_lotto_sets;charset=utf8mb4";

$dbusername = "delunico_delunico";
$dbpassword = "_Deluca_421_";
// $dsn = "mysql:host=localhost;dbname=lotto_sets;charset=utf8mb4";
//
// $dbusername = "root";
// $dbpassword = "";

//php logging into the database
$pdo = new PDO($dsn, $dbusername, $dbpassword);


$stmt = $pdo->prepare("INSERT INTO `settable`
(`setId`, `setName`, `set`)
VALUES (NULL, '$setName', '$set')");

$stmt->execute();

?><p><?php echo ($setName . " : was successfully added!");?> </p>

<div>
	<p>Set Name: <?php echo($setName);?></p>
	<p>Set: <?php echo ($set);?></p>
</div>
