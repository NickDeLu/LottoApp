<link rel = "stylesheet" type="text/css" href = "css.css">
<nav class ="flex-container">
	<span>Insert new set</span>
	<a href ="select-sets.php">Select a set</a>
</nav>

<div class ="center-container">
	<form
		action ="process-insert-set-form.php"
		method="POST"
		enctype="form-data">
		<p>
			Set Name:
		</p>
		<input placeholder="enter set name" type ="text" name ="setName"/><br>
		<p>Enter Data Between Commas: <br>
		for example: 12,4,45,7,8 </p>
		<textarea placeholder="enter lotto number set" type="textfield" name="set"></textarea><br>
		<input type ="submit"/>
		<p style="margin:100px 0px 50px 0px"><a href='https://www.calculatorsoup.com/calculators/statistics/number-generator.php'>Data set generator</a></p>
	</form>

</div>
