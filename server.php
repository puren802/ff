<?php
session_start();

// initializing variables
$name = "";
$username = "";
$email    = "";
$password = "";
$errors = array();
// connect to the database
$db = mysqli_connect('localhost', 'root', 'qwerqwer', 'arduino');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $name = mysqli_real_escape_string($db, $_POST['name']);
  $uid = mysqli_real_escape_string($db, $_POST['uid']);
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if ( empty($uid) || empty($name) || empty($username) || empty($password_1) || empty($password_2) || empty($email) ) {
	  echo "<script>alert(\"빈칸을 채워 주세요.\");
	  window.location.replace('ex.php')
	  </script>";
	  }
  if ($password_1 != $password_2) {
	echo "<script>alert(\"입력한 비밀번호가 다릅니다.\");
	  window.location.replace('ex.php')
	  </script>";
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      echo "<script>alert(\"아이디가 이미 사용중입니다.\");
	  window.location.replace('ex.php')
	  </script>";
    }

    if ($user['email'] === $email) {
      echo "<script>alert(\"이메일이 이미 사용중입니다.\");
	  window.location.replace('ex.php')
	  </script>";
    }
  }


  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
	$password = $password_1;	  
	$query="INSERT INTO `users` (`num`, `name`, `username`, `password`, `email`, `income`,
	`spend`, `total`, `uid`, `date`, `location`) VALUES 
	(NULL, '$name', '$username', '$password', '$email', '0', '0', NULL, '$uid', CURRENT_TIMESTAMP, '')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now logged in";
  			echo "<script>alert('회원가입완료')
		window.location.replace('members.php');
		</script>";
  }
}
?>