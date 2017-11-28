<!DOCTYPE>
<?php
include("includes/db.php");
?>
<html>
	<head>
		<title>Inserting Product</title>
		<script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script>
		<script>
			tinymce.init({selector:'textarea'});
		</script>		
	</head>	
<body bgcolor="skyblue">
	<form action="insert_product.php" method="post" enctype="multipart/form-data">
		<table align="center" width="700px" border="2px" bgcolor="orange">
			<tr align="center">
				<td colspan="7px"><h2>Insert New Product Here</h2></td>
			</tr>
			<tr>
				<td align="right"><b>Title:</b></td>
				<td><input type="text" name="product_title" size="60px" required /></td>
			</tr>
			<tr>
				<td align="right"><b>Category:</b></td>
				<td>
				<select name="product_cat" required>
					<option>Select a Category</option>
					<?php
						$get_cats = "select * from categories";
						//sql query
						$run_cats = mysqli_query($con, $get_cats);
						while($row_cats=mysqli_fetch_array($run_cats)){
							$cat_id = $row_cats['cat_id'];
							$cat_title = $row_cats['cat_title'];
							echo "<option value='$cat_id'>$cat_title</option>";
						}
					?>
				</select>
				</td>
			</tr>
			<tr>
				<td align="right"><b>Brand:</b></td>
				<td>
				<select name="product_brand" required>
					<option>Select a Brand</option>
					<?php
						$get_brands = "select * from brands";
						//sql query
						$run_brand = mysqli_query($con, $get_brands);
						while($row_brand=mysqli_fetch_array($run_brand)){
							$brand_id = $row_brand['brand_id'];
							$brand_title = $row_brand['brand_title'];
							echo "<option value='$brand_id'>$brand_title</option>";
						}
					?>
				</select>
				</td>
			</tr>
			<tr>
				<td align="right"><b>Image:</b></td>
				<td><input type="file" name="product_image" required /></td>
			</tr>
			<tr>
				<td align="right"><b>Price:</b></td>
				<td><input type="text" name="product_price" required /></td>
			</tr>
			<tr>
				<td align="right"><b>Description:</b></td>
				<td><textarea name="product_desc" cols="20" rows="10" required ></textarea></td>
			</tr>
			<tr>
				<td align="right"><b>Keywords:</b></td>
				<td><input type="text" name="product_keywords" size="60px" required /></td>
			</tr>
			<tr align="center">
				<td colspan="7px"><input type="submit" name="insert_post" value="Insert Product Now" /></td>
			</tr>
		</table>
	</form>
</body>
</html>
<?php
	if(isset($_POST['insert_post'])){
		//getting the text data from the fields
		$product_title = $_POST['product_title'];
		$product_cat = $_POST['product_cat'];
		$product_brand = $_POST['product_brand'];
		$product_price = $_POST['product_price'];
		$product_desc = $_POST['product_desc'];
		$product_keywords = $_POST['product_keywords'];
		//getting the image from the fields
		$product_image = $_FILES['product_image']['name'];
		$product_image_tmp = $_FILES['product_image']['tmp_name'];
		echo $insert_product = "insert into products (product_cat,product_brand,product_title,product_price,product_desc,product_image,product_keywords) values ('$product_cat','$product_brand','$product_title','$product_price','$product_desc','$product_image','$product_keywords')";
	}
?>