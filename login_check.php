<?php
session_start();
$con = mysqli_connect('localhost', 'root', 'qwerqwer', 'arduino');


if(isset($_POST['submit'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	$query = "SELECT username, password FROM users
	WHERE username='$username' AND password='$password'";
	
	$result = mysqli_query($con, $query);
	if(mysqli_num_rows($result) > 0) {
		$_SESSION['username'] = $_POST['username'];
		echo "<script>
		alert(\"로그인 되었습니다.\");
		window.location.replace('members.php');
		</script>";		
		
	}
	else {
		echo "<script>
		alert(\"로그인 정보가 잘못 되었습니다.\");
		window.location.replace('ex.php');
		</script>";
	}
}
?>