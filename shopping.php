<!DOCTYPE html>
<html>
<head>
	<link href="mycssfile.css" rel="stylesheet" type="text/css"/>
	<title>Shopping Card</title>
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
        #backtomain {
        	float: left;
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
            	<p>Shopping Card</p>
            </div>
            <!--
            <div id="shoppingtable">
            	<table border="1" style="margin: 0 auto; width: 90%; text-align: center;  border-collapse: collapse;">
            		<tr id="headernames">
                    		<td style="width: 50px;">Product Image</td>
                    		<td>Title</td>
                    		<td style="width: 100px;"><a>Price</a></td>
                    	</tr>
            	</table>
            </div>
        -->


            <?php
                if(isset($_COOKIE["shoppingcard"])){
                    $myrawobject = json_decode($_COOKIE["shoppingcard"]);
                    
                    foreach ($myrawobject as $key => $value) {
                        # code...
                        $myarray[] = $value;

                    }

                    echo "<div id=\"shoppingtable\">
                    <table border=\"1\" style=\"margin: 0 auto; width: 90%; text-align: center;  border-collapse: collapse;\">
                        <tr id=\"headernames\">
                                <td style=\"width: 50px;\">Product Image</td>
                                <td>Title</td>
                                <td style=\"width: 100px;\"><a>Price</a></td>
                        </tr><tr>
                        ";
                        
                            
                                echo "<td><img style='height: 50px; width: 50px;' src='img/" . $myarray[0] . ".jpg'></td>";
                                echo "<td>". $myarray[1] ."</td>";
                                echo "<td>". $myarray[2] ."</td>";
                        
                        echo "</tr></table></div>";

                }
                else{
                    echo "no item in the cookie";
                }

            ?>
            
	</div>
        
	<div id="goback">
		<a href="index.php"><img id="backtomain" src="img/goback.png" title="Go back to main page"></img></a> 
        <a href=""><img id="proceed" src="img/creditcard.png" title="Proceed to purchase"></img></a> 
	</div>
</body>
</html>