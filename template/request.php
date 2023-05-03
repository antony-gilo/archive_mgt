<!DOCTYPE html>
<html lang="en">
    <head>        
        <!-- META SECTION -->
        <title>Request</title>            
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        
        <link rel="icon" href="favicon.ico" type="image/x-icon" />
        <!-- END META SECTION -->
                        
        <!-- CSS INCLUDE -->        
        <link rel="stylesheet" type="text/css" id="theme" href="css/theme-default.css"/>
        <!-- EOF CSS INCLUDE -->  

  <style>
        table {
            width: 70%;
            font: 17px Calibri;
        }
        table, th, td {
            border: solid 1px #DDD;
            border-collapse: collapse;
            padding: 2px 3px;
            text-align: center;
        }
    </style>		
    </head>
    <body onload="createTable()">
        <!-- START PAGE CONTAINER -->
        <div class="page-container">
            
            <!-- START PAGE SIDEBAR -->
            <div class="page-sidebar">
                <!-- START X-NAVIGATION -->
                <ul class="x-navigation">
                    <li class="xn-logo">
                        <a href="index.php">TAL INVENTORY</a>
                        <a href="#" class="x-navigation-control"></a>
                    </li>
                    <li class="xn-profile">
                       
                        <div class="profile">
                          
                            <div class="profile-data">
                                <div class="profile-data-name">Nelson Omukhango</div>
                                <div class="profile-data-title">Web Developer/Designer</div>
                            </div>
                            
                        </div>                                                                        
                    </li>
                    <li class="xn-title">Inventory Management</li>
                    <li class="active">
                        <a href="index.php"><span class="fa fa-desktop"></span> <span class="xn-text">Dashboard</span></a>                        
                    </li>                    
                    <li class="xn-openable">
                        <a href="#"><span class="fa fa-files-o"></span> <span class="xn-text">Stock Activities</span></a>
                        <ul>
                            <li><a href="request.php"><span class="fa fa-image"></span>New Stock Request</a></li>
                            <li><a href="request_approval.php"><span class="fa fa-user"></span> Stock Request Approval</a></li>
							<li><a href="allrequests.php"><span class="fa fa-image"></span>All Requests</a></li>
                            <li><a href="stk_issue.php"><span class="fa fa-users"></span> Stock Issue </a></li>
							<li><a href="all_stk_issues.php"><span class="fa fa-users"></span> All Stock Issues </a></li>
                            
                                                     
                        </ul>
                    </li>
                    <li class="xn-openable">
                        <a href="#"><span class="fa fa-file-text-o"></span> <span class="xn-text">Inventory</span></a>
                        <ul>
                            <li><a href="layout-boxed.html">New Item</a></li>
                            <li><a href="layout-nav-toggled.html">All Items</a></li>
                            <li><a href="layout-nav-top.html">Inventory Status</a></li>
                            
                        </ul>
                    </li>
                    <li class="xn-title">Procurement</li>
                    <li class="xn-openable">
                        <a href="#"><span class="fa fa-cogs"></span> <span class="xn-text">Suppliers</span></a>                        
                        <ul>
                            <li><a href="ui-widgets.html"><span class="fa fa-heart"></span> New Supplier</a></li>                            
                            <li><a href="ui-elements.html"><span class="fa fa-cogs"></span> All Suppliers</a></li>
                           
                        </ul>
                    </li>                    
                    <li class="xn-openable">
                        <a href="#"><span class="fa fa-pencil"></span> <span class="xn-text">Source Procurement</span></a>
                        <ul>
                         
                            <li><a href="new_procurement.php"><span class="fa fa-file-text-o"></span> New Procurement Request</a></li>
                            <li><a href="allprocurement.php"><span class="fa fa-list-alt"></span> All Procurement Requests</a></li>
                            <li><a href="proc_pending_approval.php"><span class="fa fa-arrow-right"></span> Procurement Pending Approvals</a></li>
                            <li><a href="cfo_pending_approval.php"><span class="fa fa-arrow-right"></span> CFO Pending Approvals</a></li>
                            <li><a href="gm_pending_approva.php"><span class="fa fa-arrow-right"></span> GM Pending Approvals</a></li>
                            <li><a href="director_pending_approval.php"><span class="fa fa-arrow-right"></span> Director Pending Approvals</a></li>
                            
                        </ul>
                    </li>
                    <li class="xn-openable">
                        <a href="tables.html"><span class="fa fa-table"></span> <span class="xn-text">LPO</span></a>
                        <ul>                            
                            <li><a href="table-basic.html"><span class="fa fa-align-justify"></span> New LPO</a></li>
                            <li><a href="table-datatables.html"><span class="fa fa-sort-alpha-desc"></span> All LPO</a></li>
                            <li><a href="table-export.html"><span class="fa fa-download"></span> Receive Goods</a></li> 
                            <li><a href="table-export.html"><span class="fa fa-download"></span> Goods Reveived Notes</a></li> 
							
                        </ul>
                    </li>
                    <li class="xn-openable">
                        <a href="#"><span class="fa fa-bar-chart-o"></span> <span class="xn-text">Reports</span></a>
                        <ul>
                            <li><a href="charts-morris.html"><span class="xn-text">Issues by Department</span></a></li>
                            <li><a href="charts-nvd3.html"><span class="xn-text">LPOs by Cost Centers</span></a></li>
                            <li><a href="charts-rickshaw.html"><span class="xn-text">Stock Below reoder</span></a></li>
                           
                        </ul>
                    </li>                    
                                       
                   
                    
                </ul>
                <!-- END X-NAVIGATION -->
            </div>
            <!-- END PAGE SIDEBAR -->
            
            <!-- PAGE CONTENT -->
            <div class="page-content">
                
                <!-- START X-NAVIGATION VERTICAL -->
                <ul class="x-navigation x-navigation-horizontal x-navigation-panel">
                    <!-- TOGGLE NAVIGATION -->
                    <li class="xn-icon-button">
                        <a href="#" class="x-navigation-minimize"><span class="fa fa-dedent"></span></a>
                    </li>
                    <!-- END TOGGLE NAVIGATION -->
                    <!-- SEARCH -->
                    <li class="xn-search">
                        <form role="form">
                            <input type="text" name="search" placeholder="Search..."/>
                        </form>
                    </li>   
                    <!-- END SEARCH -->
                    <!-- SIGN OUT -->
                    <li class="xn-icon-button pull-right">
                        <a href="#" class="mb-control" data-box="#mb-signout"><span class="fa fa-sign-out"></span></a>                        
                    </li> 
                    <!-- END SIGN OUT -->
                    <!-- MESSAGES -->
                    
                    <!-- END MESSAGES -->
                    <!-- TASKS -->
                    
                    <!-- END TASKS -->
                </ul>
                <!-- END X-NAVIGATION VERTICAL -->                   
                
                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="#">Inventory</a></li>
                    <li class="active"><a href="#">Request</a></li>
                   
                </ul>
                <!-- END BREADCRUMB -->
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                
                    <div class="row">
                        <div class="col-md-12">
                            
                            <form class="form-horizontal">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><strong>New</strong> Request</h3>
                                    <ul class="panel-controls">
                                        <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                                    </ul>
                                </div>
                               
                                <div class="panel-body">                                                                        
                                    
                                    <div class="row">
                                        
                                        <div class="col-md-6">
										<div class="form-group">
                                        <label class="col-md-3 control-label">Department</label>
                                        <div class="col-md-9">                                        
                                            <select class="form-control select">
                                                <option>ICT</option>
                                                <option>Marketing</option>
                                                
                                            </select>
                                        </div>
                                    </div>
									<div class="form-group">
                                        <label class="col-md-3 control-label">Priority</label>
                                        <div class="col-md-9">                                        
                                            <select class="form-control select">
                                                <option>Low</option>
                                                <option>High</option>
                                                
                                            </select>
                                        </div>
                                    </div>
                                            
                                            
                                         
                                            
                                        </div>
                                        <div class="col-md-6">
                                            
                                            <div class="form-group">                                        
                                                <label class="col-md-3 control-label">Datepicker</label>
                                                <div class="col-md-9">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                                        <input type="text" class="form-control datepicker" value="<?php echo date("d/m/Y");?>">                                            
                                                    </div>
                                                    <span class="help-block">Click on input field to get datepicker</span>
                                                </div>
                                            </div>
                                            
                                           
                                            
                                           
                                            
                                        </div>
										
										
										
										
										
										
										
                                        
                                    </div>
									
									
									
			<br />						
		<p>							
    <INPUT type="button" value="Add Row" onclick="addRow('dataTable')" />

	<INPUT type="button" value="Delete Row" onclick="deleteRow('dataTable')" />
	</p>

	<TABLE id="dataTable" width="350px" border="1">
	
	<TR>
			<TD></TD>
			<TD> </TD>
			<TD> Product </TD>
			<TD> Qty </TD>
		</TR>
		<TR>
			<TD><INPUT type="checkbox" name="chk"/></TD>
			<TD> 1 </TD>
			<TD> <INPUT type="text" /> </TD>
			<TD> <INPUT type="text" /> </TD>
		</TR>
	</TABLE>

                                </div>
                                <div class="panel-footer">
                                    <button class="btn btn-default">Clear Form</button>                                    
                                    <button class="btn btn-primary pull-right">Submit</button>
                                </div>
                            </div>
                            </form>
                            
                        </div>
                    </div>                    
                    
                </div>
                <!-- END PAGE CONTENT WRAPPER -->                                                
            </div>            
            <!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTAINER -->
        
        <!-- MESSAGE BOX-->
        <div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
            <div class="mb-container">
                <div class="mb-middle">
                    <div class="mb-title"><span class="fa fa-sign-out"></span> Log <strong>Out</strong> ?</div>
                    <div class="mb-content">
                        <p>Are you sure you want to log out?</p>                    
                        <p>Press No if youwant to continue work. Press Yes to logout current user.</p>
                    </div>
                    <div class="mb-footer">
                        <div class="pull-right">
                            <a href="pages-login.html" class="btn btn-success btn-lg">Yes</a>
                            <button class="btn btn-default btn-lg mb-control-close">No</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MESSAGE BOX-->

        <!-- START PRELOADS -->
        <audio id="audio-alert" src="audio/alert.mp3" preload="auto"></audio>
        <audio id="audio-fail" src="audio/fail.mp3" preload="auto"></audio>
        <!-- END PRELOADS -->             
        
    <!-- START SCRIPTS -->
        <!-- START PLUGINS -->
        <script type="text/javascript" src="js/plugins/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="js/plugins/jquery/jquery-ui.min.js"></script>
        <script type="text/javascript" src="js/plugins/bootstrap/bootstrap.min.js"></script>                
        <!-- END PLUGINS -->
        
        <!-- THIS PAGE PLUGINS -->
        <script type='text/javascript' src='js/plugins/icheck/icheck.min.js'></script>
        <script type="text/javascript" src="js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>
        
        <script type="text/javascript" src="js/plugins/bootstrap/bootstrap-datepicker.js"></script>                
        <script type="text/javascript" src="js/plugins/bootstrap/bootstrap-file-input.js"></script>
        <script type="text/javascript" src="js/plugins/bootstrap/bootstrap-select.js"></script>
        <script type="text/javascript" src="js/plugins/tagsinput/jquery.tagsinput.min.js"></script>
        <!-- END THIS PAGE PLUGINS -->       
        
        <!-- START TEMPLATE -->
        <script type="text/javascript" src="js/settings.js"></script>
        
        <script type="text/javascript" src="js/plugins.js"></script>        
        <script type="text/javascript" src="js/actions.js"></script>        
        <!-- END TEMPLATE -->
    <!-- END SCRIPTS -->   

<SCRIPT language="javascript">
		function addRow(tableID) {

			var table = document.getElementById(tableID);

			var rowCount = table.rows.length;
			var row = table.insertRow(rowCount);

			var cell1 = row.insertCell(0);
			var element1 = document.createElement("input");
			element1.type = "checkbox";
			element1.name="chkbox[]";
			cell1.appendChild(element1);

			var cell2 = row.insertCell(1);
			cell2.innerHTML = rowCount + 1;

			var cell3 = row.insertCell(2);
			var element2 = document.createElement("input");
			element2.type = "text";
			element2.name = "txtbox[]";
			cell3.appendChild(element2);
			
			
			var cell4 = row.insertCell(3);
			var element3 = document.createElement("input");
			element3.type = "text";
			element3.name = "txtbox[]";
			cell4.appendChild(element3);


		}

		function deleteRow(tableID) {
			try {
			var table = document.getElementById(tableID);
			var rowCount = table.rows.length;

			for(var i=0; i<rowCount; i++) {
				var row = table.rows[i];
				var chkbox = row.cells[0].childNodes[0];
				if(null != chkbox && true == chkbox.checked) {
					table.deleteRow(i);
					rowCount--;
					i--;
				}


			}
			}catch(e) {
				alert(e);
			}
		}

	</SCRIPT>	
    </body>
</html>






