<?php
    include "dbase_config.php";

    
    if(isset($_POST['sub'])){
    	session_start();
        
            
		$usern = $_POST['uemail'];
		$password = $_POST['upass'];
		
		$qry =  mysqli_query($conn, "SELECT * FROM student_tbl WHERE user='$usern' AND pass='$password'");
		$result = mysqli_fetch_array($qry);
		
		$counter = mysqli_num_rows($qry);
         
		if($counter > 0) {   
            $id = $result['id'];
            $name = $result['name'];
            $type = "Student";
            $stat = $result['enabled'];
            $user = $result['user'];

           $_SESSION['SESSION_ID'] = $id; 
			$_SESSION['SESSION_NAME'] = $name;
            $_SESSION['SESSION_USER'] = $user;
            $_SESSION['SESSION_ROLE'] = $type;
            
			date_default_timezone_set('Asia/Manila');
			$date = date('Y-m-d');
			$time = date('H:i:s');
            
            if($counter==true && $stat==1) {
                ?>
                    <script>
                        alert("<?php echo "Welcome to San Mateo SHS";?>");
                        window.location = "account2.php";
                    </script>
                <?php

            } else { 
                ?>
                <script>
                    alert('SM AIMS Account might be disabled, else you can try again or contact school admin');
                    window.history.back();
                </script>
                <?php 
            }
        } else {
            ?>
                <script>
                    alert('Invalid username or password!');
                    window.location = "../login.php";
                </script>
            <?php 
        }
            
    }

    $conn->close();

?>