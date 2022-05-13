<?php session_start(); ?>
<html>
<head>
	<title>الصفحة الرئيسية</title>
	<link href="style.css" rel="stylesheet" type="text/css">
</head>

<body dir="rtl">
	<div id="header">
		اهلا بكم في صفحتنا
	</div>
	<?php
	if(isset($_SESSION['valid'])) {			
		include("connection.php");					
		$result = mysqli_query($mysqli, "SELECT * FROM login");
	?>
				
		اهلا <?php echo $_SESSION['name'] ?> ! <a href='logout.php'>تسجيل الخروج</a><br/>
		<br/>
		<a href='view.php'>مشاهدة المنتجات</a>
		<br/><br/>
	<?php	
	} else {
		echo "يجب عليك التسجيل اولاً للدخول علي الصفحة.<br/><br/>";
		echo "<a href='login.php'>تسجيل الدخول</a> | <a href='register.php'>إنشاء حساب</a>";
	}
	?>
	
</body>
</html>
