<?php
ini_set('max_execution_time', 10000);

	// Start processing 


require ("PHPMailer/class.phpmailer.php");
 include('../connection.php');

															
	$mail  = new PHPMailer();
				
				//$body = "Your Password is changed to " ;
				
				
				 $query = 'SELECT COUNT(*)number FROM  inspection_register where date_due >CURDATE() AND date_due = CURDATE()+14 AND notification=1';
				 //$query = 'SELECT COUNT(*)number FROM  inspection_register where date_due<CURDATE()';
				 $result = mysqli_query($db, $query) or die (mysqli_error($db));
				 $row = mysqli_fetch_assoc($result);
				 $count= $row['number'];
				 if($count>0)
				 {
	$mail->IsSMTP();                           
	$mail->SMTPAuth   = true;                  
	$mail->Port       = 587;
	$mail->SMTPSecure = 'tls';
	//$mail->SMTPDebug = 3;				
	$mail->Host       = "smtp.office365.com"; 
	$mail->Username   = "no-reply@boss-freight.com";     
	$mail->Password   = "Mombasa@2018";  //      
				//$mail->Password   = "Boss.2020";  //      
	$mail->From       = "no-reply@boss-freight.com";
	$mail->FromName   = "Boss Freight Terminal (CFS)";
			//$mail->AddReplyTo('list@mydomain.com', 'List manager');

			
	$mail->Subject = "INSPECTION EXPIRING WITHIN 14 DAYS";
			//$mail->AddAttachment('xls/'.$filename.'.xlsx'); // attachment
			//$mail->AddAttachment('CLIENTS NOMINATIONS  NOW OPTIONAL _20200707.pdf'); // attachment
			
			
	$mail->AltBody = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test
	$mail->MsgHTML(file_get_contents('http://192.168.3.43:81/admin_app/emailer/within7days.php'));
			  
			  //ENSURE RETURNED EMAIL IS CORRECT BEFORE ADDING TO SENDING QUEUE
			  
			 
	$mail->AddAddress('admin@thetalgroup.com');
																//echo $drEmail['email'];
															  
														
// end get emails
															
			//  $mail->AddCC('info@boss-freight.com');
			 // $mail->AddCC('anjeline.abong@makupatransit.com');
			  $mail->AddCC('quality@thetalgroup.com');
			  $mail->AddCC('antony.gilo@makupatransit.com');
			 
			  //$mail->AddStringAttachment($drUser["photo"], "YourPhoto.jpg");
	$mail->IsHTML(true);
			  if(!$mail->Send()) {
				echo "Mailer Error: " . $mail->ErrorInfo;
			  } else {
				echo "Success :";
			  }
			  // Clear all addresses and attachments for next loop
			  $mail->ClearAddresses();
			  $mail->ClearAttachments();
				 }
															
															
														
									

					

															
			
			
			
			
			




