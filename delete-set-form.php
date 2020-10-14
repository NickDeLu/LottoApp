<link rel = "stylesheet" type="text/css" href = "css.css">
<nav class ="flex-container">
	<a href ="insert-set-form.php">Insert new set</a>
	<a href ="select-sets.php">Select a set</a>
</nav>
<?php
//delete-set-form.php

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
	$stmt = $pdo->prepare("SELECT * FROM `settable` WHERE `setId` = $setId");
	$stmt->execute();
	?>
	<div class ="center-container">
	<?php
		while($row = $stmt->fetch()) {
		?>
			<p>Are you sure you want to delete set: <?=$row["setName"]?></p>
			<p><?=$row["setId"]?></p>
			<p><?=$row["setName"]?></p>
			<p><?=$row["set"]?></p>
	<?php
	}
	?>
		<form
			action ="process-delete-set-form.php"
			method="GET"
			enctype="form-data">

			<input type ="hidden" name ="setId" value="<?=$setId?>"><br>

			<input type ="submit" class ="Delete" value ="Delete"/>

			<a href="select-sets.php?">Nevermind</a>
		</form>
	<?php
	} else {
		echo"ERROR:";?>
		<p><?php echo ("You must enter a setId in the URL"); ?></p>
		<?php
	}
	?>
</div>
