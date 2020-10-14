<link rel = "stylesheet" type="text/css" href = "css.css">

<nav class ="flex-container">
	<a href ="insert-set-form.php">Insert new set</a>
	<a href ="select-sets.php">Select a set</a>
</nav>

<?php
//edit-set-form.php

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

	$row = $stmt->fetch();
	?>
	<div class ="center-container">
		<div class ="set-container">
			<p class ="flex-container">
				Editing set: <span> <?=$setId?> </span>
			</p>
			<p><?=$row["set"];?></p>
		</div>
		<form
				action ="process-edit-set-form.php"
				method="POST"
				enctype="form-data">
				<p>
				Set Name:
				</p>
				<input placeholder="enter set name" type ="text" name ="setName" value = "<?=$row["setName"]?>"/><br>
				<p>Enter Data Between Commas: <br>
				for example: 12,4,45,7,8 </p>
				<p>
					<textarea placeholder="enter lotto number set" type="textfield" name="set"><?=$row["set"]?></textarea>
					<input type ="hidden" name = "setId" value ="<?=$setId?>"/>
				</p>
				<input type ="submit"/>

			</form>

	</div>
	<?php
} else {
	echo"ERROR:";?>
	<p><?php echo ("You must enter a setId in the URL"); ?></p>
<?php
}
?>
