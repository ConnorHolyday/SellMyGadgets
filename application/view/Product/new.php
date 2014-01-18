<?php
echo "New product script";

$productCache=			"INSERT INTO Product_Cache 
						(Name, Price, Active) 
						VALUES 
						('$_POST[name]','$_POST[price]','1')";
						
$productDetails=		"INSERT INTO Product_Details
						(Description, Condition_ID, Delivery_Date, Delivery_Cost)
						VALUES
						('$_POST[description]','$_POST[condition]','$_POST[dtime]','$_POST[dcost]')";

//update or push too product information with the above queries containing information taken from the product creation form								
$db->doQueryX($productCache, $productDetails);

//get current id of last inserted sql statment 
//so all images will belong to the same product_ID when looped for more than 1 image
$productID = $db->insert_id;

$productImage=			"INSERT INTO product_Images
						(Source, Alt, Product_ID)
						VALUES
						('test.jpg','test image','')";

echo $_POST['name'];
echo $_POST['price'];
echo $_POST['description'];
echo $_POST['condition'];
echo $_POST['dtime'];
echo $_POST['dcost'];
echo $productID;

print_r ($_POST);