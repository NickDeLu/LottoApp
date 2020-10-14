<link rel = "stylesheet" type="text/css" href = "css.css">
<nav class ="flex-container">
	<a href ="insert-set-form.php">Insert new set</a>
	<span>Select a set</span>
</nav>

<?php
//select-sets.php

$dsn = "mysql:host=localhost:3306;dbname=delunico_lotto_sets;charset=utf8mb4";

$dbusername = "delunico_delunico";
$dbpassword = "_Deluca_421_";
// $dsn = "mysql:host=localhost;dbname=lotto_sets;charset=utf8mb4";
//
// $dbusername = "root";
// $dbpassword = "";

//php logging into the database
$pdo = new PDO($dsn, $dbusername, $dbpassword);


if (isset($_GET['setId'])){
$setId = $_GET["setId"];
?>
<p><?php $stmt = $pdo->prepare("SELECT * FROM `settable` WHERE `setId` = $setId"); ?></p>
<?php
} else {
	?>
	<p><?php $stmt = $pdo->prepare("SELECT * FROM `settable`"); ?></p>
<?php
}

$stmt->execute();
?>
<div class ="center-container">
<?php
	while($row = $stmt->fetch()) {
		//print_r($row); // recursively print out object.
		//echo($row["firstName"]); //or $row[0];

	?>
		<div class="set-container">
				<p class ="flex-container">
					<span><?=$row["setId"]?></span>
					<?=$row["setName"]?>
				</p>
				<p>
				<?=$row["set"]?>
				</p>
				<p class ="flex-container">
					<a href="edit-set-form.php?setId=<?=$row["setId"];?>">Edit set: <?=$row["setId"]?></a>
					<a href="delete-set-form.php?setId=<?=$row["setId"];?>">Delete set</a>
					<a href="pick-set-form.php?set=<?=$row["set"];?>&setName=<?=$row["setName"];?>">Pick set</a>
				</p>
		</div>

	<?php
	}
	?>
</div>
