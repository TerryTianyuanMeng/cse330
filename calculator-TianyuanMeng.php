<!DOCTYPE html>
<html>
	<head>
		<title> Online Calculator</title>
	</head>
<?php
	header("Content-Type: text/html");
	if(isset($_GET["calculate"])) {
		$outcome=0;
		switch($_GET["operator"]) {

			case "+":
			$outcome=$_GET["number1"]+$_GET["number2"];
			break;

			case "-":
			$outcome=$_GET["number1"]-$_GET["number2"];
			break;

			case "*":
			$outcome=$_GET["number1"]*$_GET["number2"];
			break;

			case "/":
			$outcome=$_GET["number1"]/$_GET["number2"];
			break;
		}
	}
?>
	<body>
	Please type numbers in the blank<br>
	Choose operator
		
			<form method="get" >
		
					<input type="number" name="number1" value="<?php echo $_GET["number1"] ?>"/>
					<label><input name="operator" type="radio" value = "+"/>+</label>
					<label><input name="operator" type="radio" value = "-"/>-</label>
					<label><input name="operator" type="radio" value = "*"/>*</label>
					<label><input name="operator" type="radio" value = "/"/>/</label>
					<input type = "number" name = "number2" value = "<?php echo $_GET["number2"] ?>"/>
					<input type = "submit" name = "calculate" value = "="/>
					<input type ="number" name ="output" value = "<?php echo $outcome ?>"/>
			</form>
</html>