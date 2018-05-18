<!DOCTYPE html>
<html>
<head>
	<link href="mycssfile.css" rel="stylesheet" type="text/css"/>
	<title>Product Details</title>
	<style type="text/css">

            
	body{
                background-color: #DCDCDC;
        }
        #shopdiv{
    		margin: 0 auto;
    		margin-top: 150px;
    		height: 560px;
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
        #detailscontent {
            padding: 10px;
        }
	</style>
</head>
<body>
	<div id="shopdiv">
            <div id="shoptitle">
            	<p>Product Details</p>
            </div>

            <div id="detailscontent">
                <?php
                    if (isset($_GET["productID"])){
                        $proid = $_GET["productID"];
                        require_once 'db.php';
                        $sql = "select * from promotedproducts where product_id='" . $proid ."'";
                        try{
                            $stmt = $db->query($sql);
                            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        }catch (Exception $e){
                            echo $e;
                        }

                        echo "<h3>".$result[0]['title']."</h3>";
                        echo "<img style='height: 200px; width: 250px;' src='img/" . $result[0]['imagepath'] . ".jpg'</img>";
                        echo "<p><b>Category: </b>" . $result[0]['category']  ."</p>";
                        echo "<p><b>Brand: </b>" . $result[0]['brand']  ."</p>";
                        echo "<p><b>Price: </b>" . $result[0]['price']  ." TL</p>";

                        if (isset($result[0]['properties']))
                            echo "<p><b>Properties: </b>" . $result[0]['properties']  ."</p>";
                        if (isset($result[0]['comments']))
                            echo "<p><b>Properties: </b>" . $result[0]['comments']  ."</p>";
                        if (isset($result[0]['rating']))
                            echo "<p><b>Properties: </b>" . $result[0]['rating']  ."</p>";

                    }
                    if (isset($_GET["product_ID"])){
                        $proid = $_GET["product_ID"];
                        require_once 'db.php';
                        $sql = "select * from product where product_id='" . $proid ."'";
                        try{
                            $stmt = $db->query($sql);
                            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        }catch (Exception $e){
                            echo $e;
                        }

                        echo "<h3>".$result[0]['title']."</h3>";
                        echo "<img style='height: 200px; width: 250px;' src='img/" . $result[0]['imagepath'] . ".jpg'</img>";
                        echo "<p><b>Category: </b>" . $result[0]['category']  ."</p>";
                        echo "<p><b>Brand: </b>" . $result[0]['brand']  ."</p>";
                        echo "<p><b>Price: </b>" . $result[0]['price']  ." TL</p>";

                        if (isset($result[0]['properties']))
                            echo "<p><b>Properties: </b>" . $result[0]['properties']  ."</p>";
                        if (isset($result[0]['comments']))
                            echo "<p><b>Comments: </b>" . $result[0]['comments']  ."</p>";
                        if (isset($result[0]['rating']))
                            echo "<p><b>Rating: </b>" . $result[0]['rating']  ."/10</p>";

                    }
                ?>
            </div>
	</div>
        
	<div id="goback">
		<a href="index.php"><img id="backtomain" src="img/goback.png" title="Go back to main page"></img></a>
	</div>
</body>
</html>