<?php
include("PHPExcel/Classes/PHPExcel.php");

 include('../connection.php');

															?>
															
															<body style ='font-family: "Jost",sans-serif;
    font-size: 18px!important;
    line-height: 1.7!important;
    font-weight: 500!important;'>
															<h3>QF34A INSPECTION REGISTER</h3>
															<p>Dear All,</p>
															<p>The following Registers have expired. </p>
															<p>Kindly follow up for renewal.</p>
															<table id="table"   style='border-style:solid; border-width: 1px; border-collapse: collapse;font-weight: 500!important;
    line-height: 1.7!important;
    margin-bottom: 1.5em!important;
    font-size: 18px!important;
    font-family: "jost"!important;'>
                                        <thead>
                                            <tr>
                                               
                                                
                                                <th  style="border-style:solid; border-width: 1px; border-collapse: collapse;">NO</th>
                                                <th  style="border-style:solid; border-width: 1px; border-collapse: collapse;">GOVERNING BODY</th>
                                                <th  style="border-style:solid; border-width: 1px; border-collapse: collapse;">COMPANY</th>
                                                <th  style="border-style:solid; border-width: 1px; border-collapse: collapse;">ITEM</th>
                                                <th  style="border-style:solid; border-width: 1px; border-collapse: collapse;">FREQUENCY</th>
                                                <th  style="border-style:solid; border-width: 1px; border-collapse: collapse;">DATE DONE</th>
												<th  style="border-style:solid; border-width: 1px; border-collapse: collapse;">DATE DUE</th>
												<th  style="border-style:solid; border-width: 1px; border-collapse: collapse;">DEPARTMENT</th>
												
                                            </tr>
                                        </thead>
                                        <tbody>
															
															<?php
															
																			//Get AGent Emails
													 $query = 'SELECT * FROM  inspection_register where date_due<CURDATE() and notification=1';
													 //$query = 'SELECT * FROM  inspection_register where date_due >CURDATE() AND date_due < CURDATE()+7';
                    $result = mysqli_query($db, $query) or die (mysqli_error($db));
                  $i=0;
				    while ($row = mysqli_fetch_assoc($result)) {
                            $i=$i+1;

															
															?>
                                             <tr style='border-style:solid; border-width: 1px; border-collapse: collapse; padding:5px; font-weight: 500!important;
    line-height: 1.7!important;
    margin-bottom: 1.5em!important;
    font-size: 18px!important;
    font-family: "jost"!important;' >
											 
											
									
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
															 
															 
															 
															
															