<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<style type="text/css">
		body{
                background-color: #DCDCDC;
            }
        #logindiv{
    		margin: 0 auto;
    		height: 200px;
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
            margin-top: 15%;
        }
        
        #logintitle{
            margin: 0 auto;
            width: 400px;
            text-align: center;
        }
        #loginimage {
            margin-top: 150px;
            height: 50%;
            width: 50%;
        }
        #registericon {
            height: 10%;
            width: 10%;
        }
	</style>
</head>
<body>
        <div id="logintitle">
        <img id="loginimage" src="img/login.png">
        </div>
	<div id="logindiv">
            <form action="index.php" method="POST">
                <label for="uname"><b>Username: </b></label>
                <input type="text" placeholder="Enter Username" name="uname" required></input>
                <br>
                <label for="psw"><b>Password: </b></label>
                <input style="margin-top: 10px; margin-left: 4px;" type="password" placeholder="Enter Password" name="psw" required>
                <br>
                <label>
                <input type="checkbox" checked="checked" name="remember"> Remember me
                </label>
                <button style="margin-top: 10px;" name="Submit" type="submit">Login</button>
                
            </form>
	</div>
        
	<div id="goback">
            
	<a href="index.php"><img id="backtomain" src="img/goback.png"></a>
           
	</div>
</body>
</html>