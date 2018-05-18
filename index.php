<?php
	require_once 'db.php';

	if (isset($_GET['pageno'])) {
            $pageno = $_GET['pageno'];
    } 
    else{
	        $pageno = 1;
    }

	$no_of_records_per_page = 6;
    $offset = ($pageno-1) * $no_of_records_per_page;

    $total_pages_sql = "select COUNT(*) FROM product";
    $pagestmt = $db->query($total_pages_sql) ;

    $total_rows = $pagestmt->rowCount();
    $total_pages = ceil($total_rows / $no_of_records_per_page);


	if (isset($_GET["price"])){
		if ($_GET["price"] == "asc"){
			$sql = "select * from product ORDER BY price ASC";
			$stmt = $db->query($sql) ;
			$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

		}
		else if ($_GET["price"] == "desc"){
			$sql = "select * from product ORDER BY price DESC";
			$stmt = $db->query($sql) ;
			$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

		}
	}
	else{
		$sql = "select * from product LIMIT $offset, $no_of_records_per_page" ;
		$stmt = $db->query($sql) ;
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	if(isset($_GET["searchvalue"])){
		$searchString = $_GET["searchvalue"];
		$sql = "select * from product LIMIT $offset, $no_of_records_per_page WHERE title LIKE '%". htmlspecialchars($searchString) ."%'";
		$stmt = $db->query($sql) ;
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	if (isset($_GET["productID"])){
        $myproid = $_GET["productID"];
        $prosql = "select * from product where product_id='" . $myproid ."'";
        try{
            $cookiestmt = $db->query($prosql);
            $cookieresult = $cookiestmt->fetchAll(PDO::FETCH_ASSOC);
            $output = array();

            //for ($a=0; $a<$cookiestmt->rowCount(); $a++){
		    	$output = array(
		        	"imagepath" => $cookieresult[0]["imagepath"],
		        	"title" => $cookieresult[0]["title"],
		        	"price" => $cookieresult[0]["price"]
		    	);
		    	$myJSONCookie = json_encode($output);
		    //}
		   
        }catch (Exception $e){
            echo $e;
        }

         
		 setcookie("shoppingcard",$myJSONCookie);

    }
   
	$prosql = "select * from promotedproducts";
	$prostmt = $db->query($prosql) ; 
	$proresult = $prostmt->fetchAll(PDO::FETCH_ASSOC);

?>


<!DOCTYPE html>
<!-- 

2017-2018 Spring Semester
CTIS256 Web-II Project
Eray Alparslan
Muhammed Ogulcan Kosker

-->
<html>
<head>
	<title>CTISBURADA - Main Page</title>

        <link href="mycssfile.css" rel="stylesheet" type="text/css"/>
        <script src="https://code.jquery.com/jquery-3.1.0.min.js"   integrity="sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s="   crossorigin="anonymous"></script>
        <script src="myjsfile.js" type="text/javascript"></script>
</head>
<body>
	<div id="header">
		<!-- HEADER PART -->
                <ul>
                	<?php
                	if (isset($_COOKIE["username"])){
    									
    					echo "<li><a id='logout' href='destroycookies.php'><img style='' src='img/logouticon.png'></a></li>";
    				}
                    echo "<li><a href='http://team13.bilkent.edu.tr'>About</a></li>";
                     
	        			if (!isset($_COOKIE["username"]) && !isset($_COOKIE["password"])){
		        			echo "<li><a href='register.php'>Register</a></li>";
		        			echo "<li><a href='login.php'>Login</a></li>";
		        			echo "<script>window.onload = function() {
							    if(!window.location.hash) {
							        window.location = window.location + '#loaded';
							        window.location.reload();
							    }
							}</script>";
		        		}

                    ?>
                    <li><a href="index.php">Home</a></li>
                    <?php
	                    if (isset($_COOKIE["username"])){
	    									
	    					echo "<li ><a id='shoppingcard' href='shopping.php'><img  src='img/shoppingcard.png'></a></li>";

	    					if ($_COOKIE["username"] === "admin" && $_COOKIE["password"] === md5("admin")){
	    						echo "<li ><a id='newproduct' href='addproduct.php'><img  src='img/newproduct.png'></a></li>";
	    						echo "<li ><a id='newproduct' href='addpromotedproduct.php'><img  src='img/promotion.png'></a></li>";
	    					}
	    				}
    				?>
                    <p id="statusbar">
                    	<?php
                    			if(isset($_POST["Submit"])){
        							$usrName = $_POST["uname"];
        							$usrpass = $_POST["psw"];

        							try {

						        		$myquery = "select * from customer where cususername='" . $usrName ."' and password='" . $usrpass . "'";
						        		$myres = $db->query($myquery)->fetchAll(PDO::FETCH_ASSOC);
						        		$myvalue = $myres[0]['cususername'];
						        		$mypassvalue = md5($myres[0]['password']);
						        		setcookie('username', $myvalue);
						        		setcookie('password', $mypassvalue);
					        		} catch (Exception $e){
					        			echo $e;
					        		}
        
    							}
    								if (isset($_COOKIE["username"])){
    									if ($_COOKIE["username"])
    									echo "Hello " . $_COOKIE["username"];
    								}
    								else{
    									echo "Hello guest! You are not logged in!";
    								}
    							

                    			
                    	?>
                	</p>
                </ul>
                
	</div>

	<div id="content">
		<!-- BODY PART -->
                <div id="searchbox">
                    <form method="GET" action="index.php">
                        <label for="searchvalue">Search a product: </label>
                        <input type="text" name="searchvalue" placeholder="Search item here">
                        <input id="searchButton" type="submit" name="Submit" value="Go"></input>
                    </form>
                </div>
                
                <section id="miniSlider" class="col-md-12 col-xs-12">  
                    <div class="row">
                        <div class="carousel_posts col-md-12">
                            <div class="col-md-12 regtangle">
                                <p>Promoted Products</p>
                                <div class="controller">
                                </div>
                            </div>
                            <div class="col-md-12 carousel_main">
                                <div class="over">
                                    <div class="carousel_move" id="carousel_move" draggable="true">

                                    	<?php
                                    		for ($i=0; $i<$prostmt->rowCount(); $i++){
		                                        echo "<div class='promoted_item'>";
			                                        	echo "<a href='details.php?productID=" . $proresult[$i]['product_id']  . "' title='". $proresult[$i]['title'] ."'><img src='img/"  . $proresult[$i]['imagepath'] . ".jpg'</img></a>";
			                                        	//setcookie("product", $proresult);
		                                        echo "</div>";
	                                    	}
                                        ?>
                                    </div>
                                    <div class="right"><i class="fa fa-3x fa-chevron-right" aria-hidden="true"></i></div>
                                    <div class="left"><i class="fa fa-3x fa-chevron-left" aria-hidden="true"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>

                </section>
 
                 <div id="productdiv" style="margin-top: 40px;">
                    <table id="contenttable" border="1" style="margin: 0 auto; width: 90%; text-align: center;  border-collapse: collapse;">
                    	<tr id="headernames">
                    		<script type="text/javascript">document.write(document.getElementById("imageIcon").innerHTML.value)</script>
                    		<td id="productImage">Product Image</td>
                    		<td>Category</td>
                    		<td>Brand</td>
                    		<td>Title</td>
                    		<td><!--
                    			<a href="
                    				<?php/*
                    					if (getenv('REQUEST_URI') == "/webproject/index.php?price=asc"){
                    						echo "index.php?price=desc";
                    					}
                    					else{
                    						echo "index.php?price=asc";
                    					}*/
                    				?>
                    			">Price</a>
                    			-->
                    		Price</td>
                    		<?php
                    			if (isset($_COOKIE["username"])){
    									echo "<td>Buy</td>";
    							}
                    		?>
                    	</tr>
                    	<?php 


				          	if ( $stmt->rowCount() > 0) {
				          		$i = 3;
	                    		foreach ($result as $item) {
	                    			//background coloring
		                    		if ($i %2 == 0){
		                    			echo "<tr style='background-color: #c0c0c0;'><a href='details.php'>";
		                    		}
		                    		else{
		                    			echo "<tr>";
		                    		}
		                    		
			                    		echo "<td id='imageIcon'><img src='img/"  . $item['imagepath'] . ".jpg'</img></td>";
			                    		echo "<td id='category'>"  . $item['category'] . "</td>";
			                    		echo "<td id='brand'>"  . $item['brand'] . "</td>";
			                    		echo "<td id='title'><a href='details.php?product_ID=". $item['product_id'] ."'>"  . $item['title'] . "</a></td>";
			                    		echo "<td id='price'>"  . $item['price'] . " TL</td>";

			               
			                    		if (isset($_COOKIE["username"])){
    										echo "<td><a id='buyitem' href='index.php?productID=". $item['product_id'] ."' onclick='alert(\"item added to the shoppingcard\")'><img src='img/add.png' style='height: 30px; width: 30px;'></a></td>";
    									}
		                    		echo "</tr>";
		                    		$i++;
	                    		}

	                    		
                    		}
                    		else{
                    			echo "no records";
                    		}
                    		
                    		
                    		
                    	?>

                    </table>

					<ul class="pagination" style="margin-right: 30px;">
					    <li><a href="?pageno=1">First</a></li>
					    <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
					        <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>">Prev</a>
					    </li>
					    <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
					        <a href="<?php if($pageno > $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>">Next</a>
					    </li>
					</ul>

                    <script type="text/javascript">
						var tbody = document.getElementsById("contenttable");
						tbody.onclick = function (e) {
						    e = e || window.event;
						    var data = [];
						    var target = e.srcElement || e.target;
						    while (target && target.nodeName !== "TR") {
						        target = target.parentNode;
						    }
						    if (target) {
						        var cells = target.getElementsByTagName("td");
						        for (var i = 0; i < cells.length; i++) {
						            data.push(cells[i].innerHTML);
						        }
						    }
						    alert(data);
						};
                    </script>
                    
                </div>

              

               
                
	</div>

	<div id="footer">
		<!-- FOOTER PART -->   
        <ul>
            <li><img id="ctislogo" src="img/ctislogo.png"></img></li>
            <li><p>2017-2018 Spring Semester CTIS256 Web-II E-Commerce Site Project.</p></li>
            <li><p>Eray Alparslan, Muhammed Oğulcan Köşker</p></li>
        </ul>
	</div>
    
    
</body>
</html>