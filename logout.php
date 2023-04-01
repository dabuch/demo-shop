<?php 
	session_start();
  
	if (isset($_SESSION['username']) || $_SESSION['role']="admin") {
	  session_destroy();
	  header("Location: login.php");
	  } else {
		header("location:index.php");
	  } 
  


		// Update date & time		
		//$username=$_SESSION['username'] ;
		//$this_login=$_SESSION['this_login'];
		
		//$sql="UPDATE admins SET Last_Login='$this_login' WHERE admins.id='$id'";
		//$conn->query($sql);
	
		//session_destroy();
		//session_unset();


		?>
