<?php

if (isset($_POST["Submit"])){
        require_once 'db.php';
        $category = htmlspecialchars($_POST["category"]);
        $brand = htmlspecialchars($_POST["brand"]);
        $title = htmlspecialchars($_POST["title"]);
        $price = htmlspecialchars($_POST["price"]);
        $properties = htmlspecialchars($_POST["properties"]);
        $comments = htmlspecialchars($_POST["comments"]);
        $rating = htmlspecialchars($_POST["rating"]);



         //we successfully retrieved data from the database. So we can do the insert operation
        $insertquery = "INSERT INTO product (category, brand, title, price, properties, comments, rating)
                        VALUES 
                        ('" . $category . "', '" . $brand . "', '" . $title . "', '" . $price . "', '" . $properties . "', '" . $comments . "', '" . $rating . "')";
        
        try{
                $db->query($insertquery);
                echo "<script>alert('item added to the database')</script>";
        }catch (Exception $e){
                echo $e;
        }
}

?>


<!DOCTYPE html>
<html>
<head>
	<link href="mycssfile.css" rel="stylesheet" type="text/css"/>
	<title>Add New Product</title>
	<style type="text/css">

            
	body{
                background-color: #DCDCDC;
        }
        #shopdiv{
    		margin: 0 auto;
    		margin-top: 150px;
    		height: 380px;
            width: 400px;
            border: 1px solid #778899;
            background-color: #F0F8FF;
            border-radius: 3px;
        }
        #goback {
        	margin: 0 auto;
        	height: 200px;
            width: 400px;
            text-align: right;
        }

        #backtomain, #proceed  {
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
        #shoptitle{
        	height: 50px;
        	position: relative;
        	background-color: green;
        	border-radius: 3px;
        }
        #shoptitle p {
        	float: right;
        	margin-top: 13px;
        	margin-right: 10px;
        	font-weight: bold;
        	font-size: large;
        	font-style: italic;
        }
	</style>
</head>
<body>
	<div id="shopdiv">
            <div id="shoptitle">
            	<p>Add new product</p>
            </div>

            <form action="addproduct.php" method="POST">
                <label for="category"><b>Category: </b></label>
                <input type="text" placeholder="Enter category" name="category" required></input>
                <br>
                <label for="brand"><b>Brand: </b></label>
                <input style="margin-top: 10px; margin-left: 20px;"  placeholder="Enter brand" name="brand" required>
                <br>
                <label for="title"><b>Title: </b></label>
                <input style="margin-top: 10px; margin-left: 31px;" placeholder="Enter title" name="title" required>
                <br>
                <label for="price"><b>Price: </b></label>
                <input style="margin-top: 10px; margin-left: 28px;" type="text" placeholder="Enter price" name="price" required></input>
                <br>
                <label for="properties"><b>Properties: </b></label>
                <input style="margin-top: 10px; margin-left: -6px;" type="text" placeholder="Enter properties if any" name="properties" ></input>
                <br>
                <label for="comments"><b>Comments: </b></label>
                <input style="margin-top: 10px; margin-left: -6px;" type="text" placeholder="Enter comments if any" name="comments" ></input>
                <br>
                <label for="rating"><b>Rating: </b></label>
                <input style="margin-top: 10px; margin-left: 21px; " type="text" placeholder="Enter rating out of 10" name="rating" required></input>
                <br>
                <button style="margin-top: 10px;" name="Submit" type="submit">Add</button>
                
            </form>
            
            
	</div>
        
	<div id="goback">
		<a href="index.php"><img id="backtomain" src="img/goback.png" title="Go back to main page"></img></a> 
	</div>
</body>
</html>