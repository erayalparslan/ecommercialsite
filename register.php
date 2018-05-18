<?php
    if (isset($_POST["Submit"])){
        require_once 'db.php';

        $usr = htmlspecialchars($_POST["uname"]);
        $pass = htmlspecialchars($_POST["psw"]);
        $repass = htmlspecialchars($_POST["repsw"]);
        $cusname = htmlspecialchars($_POST["name"]);
        $cussurname = htmlspecialchars($_POST["sname"]);
        $email = htmlspecialchars($_POST["email"]);
        $cargo = htmlspecialchars($_POST["address"]);

        if($pass === $repass){
                //$sql = "select * from customer where cususername='" . $usr . "' and password='" . $pass . "'";
                try {
                    $sql = "select * from customer where cususername='" . $usr . "' and password='" . $pass . "'";
                    $stmt = $db->query($sql) ;
                    //if ($stmt->rowCount() > 0
                } catch (Exception $e){
                    echo "There is something wrong with your database. Probably it is because of your sql query. Check it out!";
                }
                //we successfully retrieved data from the database. So we can do the insert operation
                $insertquery = "INSERT INTO customer (cususername, password, cusname, cussurname, email, cargo_address)
                                VALUES 
                                ('" . $usr . "', '" . $pass . "', '" . $cusname . "', '" . $cussurname . "', '" . $email . "', '" . $cargo . "')";
                
                try{
                        $db->query($insertquery);
                        echo "<script>alert('registration successful.')</script>";
                }catch (Exception $e){
                        echo $e;
                }
                
        }
        else {
            echo "your passwords do not match";
        }
    }
?>


<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<style type="text/css">
            
	body{
                background-color: #DCDCDC;
        }
        #logindiv{
    		margin: 0 auto;
    		margin-top: 0px;
    		height: 380px;
            width: 400px;
            border: 1px solid #778899;
            background-color: #F0F8FF;
            border-radius: 10px;
        }
        #goback {
        	margin: 0 auto;
        	height: 200px;
            width: 400px;
            text-align: right;
        }

        #backtomain {
        	margin: 0 auto;
        	height: 50px;
        	width: 50px;
        }
        
        form {
            text-align: center;
            margin-top: 10%;
        }
        
        #registertitle{
            margin: 0 auto;
            width: 400px;
            text-align: center;
        }
        #registerimage {
            margin-top: 150px;
            height: 50px;
            width: 50%;
        }
	</style>
</head>
<body>
    <div id="registertitle">
        <img id="registerimage" src="img/register.png">
    </div>
	<div id="logindiv">
            
            <form action="register.php" method="POST">
                <label for="uname"><b>Username: </b></label>
                <input type="text" placeholder="Enter Username" name="uname" required></input>
                <br>
                <label for="psw"><b>Password: </b></label>
                <input style="margin-top: 10px; margin-left: 4px;" type="password" placeholder="Enter Password" name="psw" required>
                <br>
                <label for="repsw"></label>
                <input style="margin-top: 10px; margin-left: 80px;" type="password" placeholder="Re-Enter Password" name="repsw" required>
                <br><br>
                <label for="name"><b>Name: </b></label>
                <input style="margin-left: 28px;" type="text" placeholder="Enter name" name="name" required></input>
                <br>
                <label for="sname"><b>Surname: </b></label>
                <input style="margin-top: 5px; margin-left: 5px;" type="text" placeholder="Enter surname" name="sname" required></input>
                <br>
                <label for="email"><b>Email: </b></label>
                <input style="margin-top: 5px; margin-left: 28px;" type="text" placeholder="Enter email" name="email" required></input>
                <br>
                <label for="address"><b>Cargo Address: </b></label>
                <input style="margin-top: 5px; margin-right: 30px; height: 100px;" type="text" placeholder="Enter Address" name="address" required></input>
                <br>
                <button style="margin-top: 10px;" name="Submit" type="submit">Register</button>
                
            </form>
	</div>
        
	<div id="goback">
		<a href="index.php"><img id="backtomain" src="img/goback.png"></img></a> 
        
	</div>
</body>
</html>