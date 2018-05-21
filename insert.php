

<?php	
	session_start();	
	$con = mysqli_connect("localhost", "root", "qwerqwer","arduino");	
	if(mysqli_connect_errno()){
			echo "연결 실패 <br> 이유:" . mysqli_connect_error();			
	}
	$username=$_SESSION['username'];
	$pre_total=0;
	if(!isset($_POST['submit'])) {
		//$query = "SELECT * FROM test_join";
		$item = $_POST['item'];
		$Price= $_POST['price'];
		$User_uid= $_POST['uid'];
		
		$query = "select * from users where uid like '$User_uid';";
		
		$result =mysqli_query($con,$query);
		
		$row = mysqli_num_rows($result);
		
		mysqli_data_seek($result,$row-1);
		
		$data = mysqli_fetch_array($result);
		
		$pre_total = $data['total'];
		
		$modi_total = $pre_total-$Price;
		
		$mysql_qry2  = "INSERT INTO `users` (`num`, `name`, `sex`, `bday`, `username`, `password`, `email`, `spend`, `total`, `uid`, `date`, `location`) 
		VALUES (NULL, '', NULL, NULL, '$username', '', '', '$Price', '$modi_total', '$User_uid', now(), '$item')";

		if($pre_total - $Price >= 0){
			mysqli_query($con,$mysql_qry2);
			echo "<script>alert('기부 완료!');
			window.location.replace('members.php');
			</script>";
		}
		else {
			echo "<script>alert('금액이 부족합니다!');
			window.location.replace('members.php')
			</script>";
		}
	}
?>