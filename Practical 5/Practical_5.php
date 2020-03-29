<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script type="text/javascript">
		function myFunction1() {
  		var x = document.getElementById("fname");
  		x.value = x.value.toUpperCase();
  		}
	</script>
</head>
<body align="center" style="text-align: center;">
	<form id="usrform" action="insert.php" method="POST">
	<fieldset style="width: 300px">
		<legend>Form</legend>
	<div style="background-color: DarkSalmon">
		<br>
		<div>
		Name:<input type="text" name="name"  placeholder="Enter your name" required="*" id="fname" onblur="myFunction1()"><br><br>
	</div>
	<div>
		City:<input type="text" name="city"  placeholder="city" required="*" id="city" onblur="myFunction1()"><br><br>
	</div>
	<div>
		Gender:<br><input type="radio" id="male" name="gender" value="m" required="#">
		<label for="male">Male</label><br>
		<input type="radio" id="male1" name="gender" value="f" required="#">
		<label for="male1">Female</label><br><br>
	</div>
	<div>
		Email:<input type="email" name="email" placeholder="Enter your Email-ID"><br><br>
	</div>
	<div>
		<label for="btec">Choose your Field:</label>
		<select id="btec" name="field">
			<option value="ce">Computer Engineering</option>
			<option value="it">IT</option>
			<option value="me">Mechanical Engineering</option>
			<option value="other">Other</option>
		</select><br><br>
	</div>
	<div>
		Phone Number:<input type="tel" name="num" placeholder="Enter your number" required="*"><br><br>
	</div>

	
<div class="submitandreset">
<br>
<input type="submit" value="Submit">

<input type="reset">
</div>
<br>
	</div>
</fieldset>
</form>
</body>
</html>
</html>
<?php
$conn=mysqli_connect('localhost','root');
mysqli_select_db($conn,'registration form');

if(!$conn)
{
echo "Error in connection";
}
else
{
	if ($_SERVER["REQUEST_METHOD"]=="POST"){
		if (isset($_POST["name"]) && isset($_POST["city"]) && isset($_POST["gender"]) && isset($_POST["email"]) && isset($_POST["field"]) && isset($_POST["num"])){
			
			$name=$_POST["name"];
			$city=$_POST["city"];
			$gender=$_POST["gender"];
			$email=$_POST["email"];
			$field=$_POST["field"];
			$phone=$_POST["num"];

  			
			if($name!=' ' && $city!=' ' && $gender!=' ' && $email!=' ' && $field!=' ' && $phone!=' '){
			    $sql="INSERT INTO student(name,city,gender,email,field,num) values ('$name','$city','$gender','$email','$field','$phone')";
				$result=mysqli_query($conn,$sql);
				die;
				if(!$result){
					echo "<script>alert('Record inserted');document.location='Practical_5.php'</script>";
				}
			}
		}
		else
			echo"value not set";
	}
}
?>