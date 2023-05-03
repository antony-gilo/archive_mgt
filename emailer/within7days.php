<?php
include("PHPExcel/Classes/PHPExcel.php");

 include('../connection.php');

															?>
<body style ='font-family: "Jost",sans-serif;
    font-size: 18px!important;
    line-height: 1.7!important;
    font-weight: 500!important;'>
															<h3>QF34A INSPECTION REGISTER</h3>
															<p>Dear All</p>
															<p>The below Inspection register will be expiring within the next 14 Days.</p>
															<p>Kindly prepare for renewal.</p>
															
															<table id="table"   style='border-style:solid; border-width: 1px; border-collapse: collapse; font-family: "Jost",sans-serif;
    font-size: 18px!important;
    line-height: 1.7!important;
    font-weight: 500!important;'>
                                        <thead>
                                            <tr>
                                               
                                                
                                                <th  style="border-style:solid; border-width: 1px; border-collapse: collapse;">NO</th>
                                                <th  style="border-style:solid; border-width: 1px; border-collapse: collapse;">GOVERNING BODY</th>
                                                <th  style="border-style:solid; border-width: 1px; border-collapse: collapse;">COMPANY</th>
                                                <th  style="border-style:solid; border-width: 1px; border-collapse: collapse;">ITEM</th>
                                                <th  style="border-style:solid; border-width: 1px; border-collapse: collapse;">FREQUENCY IN MONTHS</th>
                                                <th  style="border-style:solid; border-width: 1px; border-collapse: collapse;">DATE DONE</th>
												<th  style="border-style:solid; border-width: 1px; border-collapse: collapse;">DATE DUE</th>
												<th  style="border-style:solid; border-width: 1px; border-collapse: collapse;">DEPARTMENT</th>
												
                                            </tr>
                                        </thead>
                                        <tbody>
															
															<?php
															
										//Get AGent Emails
					//$query = 'SELECT * FROM  inspection_register where date_due<CURDATE()';
				//  $query = 'SELECT * FROM  inspection_register where date_due >CURDATE() AND date_due < CURDATE()+14 and notification=1';

					$query = 'SELECT * FROM  inspection_register where date_due > CURDATE() AND date_due = CURDATE()+14 AND notification=1';
                    $result = mysqli_query($db, $query) or die (mysqli_error($db));
                  $i=0;
				    while ($row = mysqli_fetch_assoc($result)) {
                            $i=$i+1;

															
															?>
                                             <tr style="border-style:solid; border-width: 1px; border-collapse: collapse; padding:5px;" >
											 
											
									
									<td style="border-style:solid; border-width: 1px; border-collapse: collapse; padding:5px;"><?php echo  $i;?></td>
									<td style="border-style:solid; border-width: 1px; border-collapse: collapse; padding:5px;"><?php echo $row['governing_body'];?></td>
									<td style="border-style:solid; border-width: 1px; border-collapse: collapse; padding:5px;"><?php echo $row['company'];?></td>
									<td style="border-style:solid; border-width: 1px; border-collapse: collapse; padding:5px;"><?php echo $row['item'];?></td>
									<td  style="border-style:solid; border-width: 1px; border-collapse: collapse; padding:5px;"><?php echo $row["frequency"];?></td>
									<td  style="border-style:solid; border-width: 1px; border-collapse: collapse; padding:5px;"><?php echo $row["date_done"];?></td>
									<td  style="border-style:solid; border-width: 1px; border-collapse: collapse; padding:5px;"><?php echo $row["date_due"];?></td>
									<td  style="border-style:solid; border-width: 1px; border-collapse: collapse; padding:5px;"><?php echo $row["department"];?></td>
									
									
								</tr>
                                           <?php
										}
										?>
															 <tbody>
															 </table>
															
															
</body>

<?php
// test date to see if query works
// $currentDate = new DateTime();
// //Use the subtract function to subtract a DateInterval
// $suspectDate = $currentDate->sub(new DateInterval('P21D'));
// $suspect = $suspectDate->format('Y-m-d');

// $currentDate = new DateTime();
// $duetime = $currentDate->add(new DateInterval('P18D'));
// $duedate = $duetime->format('Y-m-d');

// //Get yesterday date
// 	$query = "SELECT * FROM  inspection_register where date_due > '".$suspect."' AND date_due = '".$duedate."' and notification=1";
// 	var_dump($query);
?>
															
															