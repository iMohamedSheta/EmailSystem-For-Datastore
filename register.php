<html>
<head>
	<title>إنشاء حساب</title>
</head>

<body dir="rtl">
<a href="index.php">الصفحة الرئيسية</a> <br />
<?php
include("connection.php");

if(isset($_POST['submit'])) {
	$name = $_POST['name'];
	$email = $_POST['email'];
	$user = $_POST['username'];
	$pass = $_POST['password'];

	if($user == "" || $pass == "" || $name == "" || $email == "") {
		echo "All fields should be filled. Either one or many fields are empty.";
		echo "<br/>";
		echo "<a href='register.php'>Go back</a>";
	} else {
		mysqli_query($mysqli, "INSERT INTO login(name, email, username, password) VALUES('$name', '$email', '$user', md5('$pass'))")
			or die("Could not execute the insert query.");
			
		echo "تم إنشاء الحساب بنجاح.";
		echo "<br/>";
		echo "<a href='login.php'>Login</a>";
	}
} else {
?>
	<p><font size="+2">إنشاء حساب</font></p>
	<form name="form1" method="post" action="">
		<table width="75%" border="0">
			<tr> 
				<td width="10%">الاسم بالكامل</td>
				<td><input type="text" name="name"></td>
			</tr>
			<tr> 
				<td>البريد الالكتروني</td>
				<td><input type="text" name="email"></td>
			</tr>			
			<tr> 
				<td>اسم المستخدم</td>
				<td><input type="text" name="username"></td>
			</tr>
			<tr> 
				<td>الرقم السري</td>
				<td><input type="password" name="password"></td>
			</tr>
			<tr> 
				<td>&nbsp;</td>
				<td><input type="submit" name="submit" value="تسجيل"></td>
			</tr>
		</table>
	</form>
<?php
}
?>
</body>
</html>
