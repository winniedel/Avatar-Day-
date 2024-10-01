<?php
    $email = $_POST["email"];
    $password = $_POST["password"];
    
    
    //Database Connection
    
    $con = new mysqli("localhost","delinow1","pennY_3426!","delinow1_login_db");
    if($con->connect_error){
        die("Failed to connect:".$con->connect_error);
    }  else{ 
         
        $stmt = $con->prepare("select * from users where email = ?"); //$con will pass through SQL query and will prepare statement
        $stmt->bind_param("s", $email); // binds string with email from SQL
        $stmt->execute();
        $stmt_result = $stmt->get_result();
        if($stmt_result->num_rows>0){
            $data = $stmt_result->fetch_assoc();//gets data from result
            if($data["password"]==$password){
                header("location:index.html");
            } else{
                echo "<h2> Invalid Email or Password </h2>";
            }
            
        } else {
            echo "<h2> Invalid Email or Password </h2>";
        }
    }
    
    /*
     if (count($errors) == 0) {
  	$password = md5($password);
  	$query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
  	$results = mysqli_query($con, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['email'] = $email;
  	  $_SESSION['success'] = "You are now logged in";
  	  header('location: index.html');
  	}else {
  		array_push($errors, "Wrong username/password combination");
  	}
  }
}
*/
?>