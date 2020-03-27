<?php
	session_destroy();
	echo "<script>alert('Cerrando session')</script>"+  header('location: ../../../view/Account/Login.php');
	
//echo "<script>alert('Cerrando session')</script>"+  header('location: ../../../view/Login/index.php');

//echo header('location: index.php');
?>
