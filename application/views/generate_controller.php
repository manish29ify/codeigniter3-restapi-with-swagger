<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Help</title>

	<style type="text/css">
	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}
	h1 {
		color: #fff;
		background-color: #3142d6;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	form {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body {
		margin: 0 15px 0 15px;
	}


	#container {
		margin: 10px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
	}
    input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 100%;
  background-color: #032363;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #3142d6;
}
.error {
  padding: 0px 15px;
  margin-bottom: 20px;
  border: 1px solid transparent;
  border-radius: 4px;
  background-color: #f2dede;
  border-color: #ebccd1;
  color: #a94442;
}
.success {
  padding: 10px 15px;
  margin-bottom: 20px;
  border: 1px solid transparent;
  border-radius: 4px;
  background-color: #dff0d8;
  border-color: #d6e9c6;
  color: #3c763d;
}
	</style>
</head>
<body>

<div id="container">
	<h1>Generate New Rest Controller</h1>

	<div id="body">
		<p>Type name of controller that you want to generate.</p>


<?php if( validation_errors()!=""){ ?>
		<div class="error"> <?=validation_errors() ?> </div>
	<?php } ?>

	<?php if(isset($success_message) && $success_message!=""){ ?>
		<div class="success"> <?=$success_message ?> </div>
	<?php } ?>



<?php echo form_open(); ?>
<label for="cname">Controller Name</label>
    <input type="text" id="cname" name="controller_name" placeholder="Controller name..">
<div><input type="submit" value="Generate" /></div>
	</div>
</div>

</body>
</html>