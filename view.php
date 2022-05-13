<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>

<?php
//including the database connection file
include_once("connection.php");

//fetching data in descending order (lastest entry first)
$result = mysqli_query($mysqli, "SELECT * FROM products WHERE login_id=".$_SESSION['id']." ORDER BY id DESC");
?>

<html>
<head>
	<title>صفحة المنتجات</title>
	<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>
</head>

<body dir="rtl" >
	<a href="index.php">الصفحة الرئيسية</a> | <a href="add.html">اضافة بيانات جديدة</a> | <a href="logout.php">تسجيل الخروج</a>
	<br/><br/>
	
	<table width='100%' id="customers">
		<tr bgcolor='#CCCCCC'>
			<td>اسم المنتج</td>
			<td>الكمية</td>
			<td>السعر (L.E)</td>
			<td>تعديل البيانات</td>
		</tr>
		<?php
		while($res = mysqli_fetch_array($result)) {		
			echo "<tr>";
			echo "<td>".$res['name']."</td>";
			echo "<td>".$res['qty']."</td>";
			echo "<td>".$res['price']."</td>";	
			echo "<td><a href=\"edit.php?id=$res[id]\">تعديل</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">حذف</a></td>";		
		}
		?>
	</table>	
</body>
</html>
