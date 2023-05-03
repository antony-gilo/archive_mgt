<?php

	// dbGetData($table,$condition)

	// dbRowInsert($table_name, $form_data)

	// dbRowDelete($table_name, $where_clause='')

	// dbRowUpdate($table_name, $form_data, $where_clause='')

	

	

	



	putenv("TZ=Africa/Nairobi");

	

	

	class classDBAccess

		{			
		
		
		//select function		function dbGetData($table,$condition)

		{
			if($condition<>"")			{				$ext=" WHERE ".$condition;			}			else{				$ext ="";			}					$stmt =  "SELECT					*					FROM ".$table.$ext;					//$stmt->execute();
			$dsresult = $stmt;
			//
			//echo $dsresult;
			return $dsresult;

		}
		
		//insert function
		function dbRowInsert($table_name, $form_data)
		{
			// retrieve the keys of the array (column titles)
			$fields = array_keys($form_data);

			// build the query
			$sql = "INSERT INTO ".$table_name."
			(`".implode('`,`', $fields)."`)
			VALUES('".implode("','", $form_data)."')";
//echo $sql;
			// run and return the query result resource
			return $sql;
		}
		//delete function
		function dbRowDelete($table_name, $where_clause='')
		{
			// check for optional where clause
			$whereSQL = '';
			if(!empty($where_clause))
			{
				// check to see if the 'where' keyword exists
				if(substr(strtoupper(trim($where_clause)), 0, 5) != 'WHERE')
				{
					// not found, add keyword
					$whereSQL = " WHERE ".$where_clause;
				} else
				{
					$whereSQL = " ".trim($where_clause);
				}
			}
			// build the query
			$sql = "DELETE FROM ".$table_name.$whereSQL;

			// run and return the query result resource
			return $sql;
		}


// update row
		function dbRowUpdate($table_name, $form_data, $where_clause='')
		{
			// check for optional where clause
			$whereSQL = '';
			if(!empty($where_clause))
			{
				// check to see if the 'where' keyword exists
				if(substr(strtoupper(trim($where_clause)), 0, 5) != 'WHERE')
				{
					// not found, add key word
					$whereSQL = " WHERE ".$where_clause;
				} else
				{
					$whereSQL = " ".trim($where_clause);
				}
			}
			// start the actual SQL statement
			$sql = "UPDATE ".$table_name." SET ";

			// loop and build the column /
			$sets = array();
			foreach($form_data as $column => $value)
			{
				$sets[] = "`".$column."` = '".$value."'";
			}
			$sql .= implode(', ', $sets);

			// append the where statement
			$sql .= $whereSQL;
			
			//echo $sql;

			// run and return the query result
			return $sql;
		}
		
		function dbGetItem($dbh,$itemname,$table,$condition)

		{
			if($condition<>"")
			{
				$ext=" WHERE ".$condition;
			}
			else{
				$ext ="";
			}
					$stmt =  "SELECT
					".$itemname."
					FROM ".$table.$ext;
					 $stmtDetails = $dbh->prepare($stmt);
					$stmtDetails->execute();
					
					$drItem = $stmtDetails->fetch();
			$dsresult = $drItem[$itemname];
			//echo $stmt;
			return $dsresult;
			//echo $objClassDB->dbGetItem($dbh,'FirstName','doc_bio',"DocId=".$_SESSION['Doctor_Id']." ");

		}
		function dbGetCount($dbh,$table,$condition)

		{
			if($condition<>"")
			{
				$ext=" WHERE ".$condition;
			}
			else{
				$ext ="";
			}
					$stmt =  "SELECT
					count(*) counter
					FROM ".$table.$ext;
					 $stmtDetails = $dbh->prepare($stmt);
					$stmtDetails->execute();
					
					$drItem = $stmtDetails->fetch();
			$dsresult = $drItem['counter'];
			//echo $stmt;
			return $dsresult;
			
			//echo $objClassDB->dbGetCount($dbh,'doc_bio',"DocId=".$_SESSION['Doctor_Id']." ");

		}
		function insertNsprDetails($NsprId,$ProductName,$ProductDescription,$UnitRequired,$PricePerUnit,$Total,$Status,$Supplier,$Comments)

		{
			
			
			 //$sql = "INSERT INTO nspr_details(NsprId,ProductName,ProductDescription,UnitRequired,PricePerUnit,Total,Status,Supplier,	Comments,DateAdded) VALUES('$NsprId','$ProductName','$ProductDescription','$UnitRequired','$PricePerUnit','$Total,$Status','$Supplier','$Comments',NOW()')";
			 
			  // $dbh->exec($sql);
			//echo "New record created successfully";
			//}
			//	catch(PDOException $e)
			//{
			//echo $sql . "<br>" . $e->getMessage();
			//}
			
			//$res = mysql_query("INSERT INTO nspr_details(NsprId,ProductName,ProductDescription,UnitRequired,PricePerUnit,Total,Status,Supplier,	Comments,DateAdded) VALUES('$NsprId','$ProductName','$ProductDescription','$UnitRequired','$PricePerUnit','$Total,$Status','$Supplier','$Comments',NOW()')");
			//return $res;

		}
		
		function UploadFile($uploadedfile)

		{
			echo $uploadedfile;
			
			 if (isset($uploadedfile['name'])) {
				$extension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
				$reg=rand();		
				$path="uploads"."/".md5($reg);
				print $path;
				mkdir($path, 0, true);
				if (0 < $uploadedfile['error']) {
					return 'Error during file upload' . $_FILES['file']['error'];
				} else {
					if ($uploadedfile["size"] > 500000000)  {
						return 'File too Large';
					} else {
						move_uploaded_file($uploadedfile['tmp_name'], $path.'/' . $uploadedfile['name']);
						return $path.'/' . $uploadedfile['name'];
					}
				}
			} 
			else
			{
			return "";
			}

		}
		
		function UploadMultipleFile($uploadedfile,$i)

		{
			echo $uploadedfile;
			
			 if (isset($uploadedfile['name'][$i])) {
				$extension = pathinfo($_FILES['file']['name'][$i], PATHINFO_EXTENSION);
				$reg=rand();		
				$path="uploads"."/".md5($reg);
				print $path;
				mkdir($path, 0, true);
				if (0 < $uploadedfile['error'][$i]) {
					return 'Error during file upload' . $_FILES['file']['error'][$i];
				} else {
					if ($uploadedfile["size"][$i] > 500000000)  {
						return 'File too Large';
					} else {
						move_uploaded_file($uploadedfile['tmp_name'][$i], $path.'/' . $uploadedfile['name'][$i]);
						return $path.'/' . $uploadedfile['name'][$i];
					}
				}
			} 
			else
			{
			return "";
			}

		}




		

		

		

		

		
		

			

	}

?>

