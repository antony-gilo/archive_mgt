<!DOCTYPE html>
<html lang="en">
    <head>        
        <!-- META SECTION -->
        <title>Request Approvals</title>            
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        
        <link rel="icon" href="favicon.ico" type="image/x-icon" />
        <!-- END META SECTION -->
        
        <!-- CSS INCLUDE -->        
        <link rel="stylesheet" type="text/css" id="theme" href="css/theme-default.css"/>
        <!-- EOF CSS INCLUDE -->                                      
    </head>
    <body>
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
                    <li class="active"><a href="#">Request Approval</a></li>
                    
                </ul>
                <!-- END BREADCRUMB -->
                
                <!-- PAGE TITLE -->
                <div class="page-title">                    
                    <h2><span class="fa fa-arrow-circle-o-left"></span> Pending Requests</h2>
                </div>
                <!-- END PAGE TITLE -->                
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                
                    
                    
                    <div class="row">
                        <div class="col-md-12">
                            
                            <!-- START DATATABLE EXPORT -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    
                                    <div class="btn-group pull-right">
                                        <button class="btn btn-danger dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i> Export Data</button>
                                        <ul class="dropdown-menu">
                                            
                                            <li><a href="#" onClick ="$('#customers2').tableExport({type:'excel',escape:'false'});"><img src='img/icons/xls.png' width="24"/> XLS</a></li>
                                            <li><a href="#" onClick ="$('#customers2').tableExport({type:'doc',escape:'false'});"><img src='img/icons/word.png' width="24"/> Word</a></li>
                                           
                                        </ul>
                                    </div>                                    
                                    
                                </div>
                                <div class="panel-body">
                                    <table id="customers2" class="table datatable">
                                        <thead>
                                            <tr>
                                                <th>Request Id</th>
                                                <th>Department</th>
                                                <th>Date</th>
                                                <th>Request Status</th>
                                                <th>Requester</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><a href="approve_request.php">12223</a></td>
                                                <td>ICT</td>
                                                <td>2011/04/25</td>
                                                <td><span class="label label-danger">Rejected</span></td>
                                                <td>Nelson Omukhango</td>
                                                <td><div class="btn-group">
                                                    <a href="#" data-toggle="dropdown" class="btn btn-primary dropdown-toggle" aria-expanded="true">Action <span class="caret"></span></a>
                                                    <ul class="dropdown-menu" role="menu">
                                                        
                                                        <li><a href="#">View Request</a></li>
                                                        <li><a href="#">Issue Request</a></li>
                                                        <li><a href="#">Cancel Request</a></li>                                                    
                                                    </ul>
                                                </div></td>
                                            </tr>
                                            <tr>
                                                <td><a href="approve_request.php">12223</a></td>
                                                <td>ICT</td>
                                                <td>2011/04/25</td>
                                                <td><span class="label label-success">New</span></td>
                                                <td>Nelson Omukhango</td>
                                                <td><div class="btn-group">
                                                    <a href="#" data-toggle="dropdown" class="btn btn-primary dropdown-toggle" aria-expanded="true">Action <span class="caret"></span></a>
                                                    <ul class="dropdown-menu" role="menu">
                                                        
                                                        <li><a href="#">View Request</a></li>
                                                        <li><a href="#">Issue Request</a></li>
                                                        <li><a href="#">Cancel Request</a></li>                                                    
                                                    </ul>
                                                </div></td>
                                            </tr>
                                            <tr>
                                                <td><a href="approve_request.php">12223</a></td>
                                                <td>ICT</td>
                                                <td>2011/04/25</td>
                                                <td><span class="label label-warning">Approved</span></td>
                                                <td>Nelson Omukhango</td>
                                                <td><div class="btn-group">
                                                    <a href="#" data-toggle="dropdown" class="btn btn-primary dropdown-toggle" aria-expanded="true">Action <span class="caret"></span></a>
                                                    <ul class="dropdown-menu" role="menu">
                                                        
                                                        <li><a href="#">View Request</a></li>
                                                        <li><a href="#">Issue Request</a></li>
                                                        <li><a href="#">Cancel Request</a></li>                                                    
                                                    </ul>
                                                </div></td>
                                            </tr>
                                            
                                        </tbody>
                                    </table>                                    
                                    
                                </div>
                            </div>
                            <!-- END DATATABLE EXPORT -->                            
                            
                            <!-- START DEFAULT TABLE EXPORT -->
                            
                            <!-- END DEFAULT TABLE EXPORT -->

                        </div>
                    </div>

                </div>         
                <!-- END PAGE CONTENT WRAPPER -->
            </div>            
            <!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTAINER -->    

        <!-- MESSAGE BOX-->
        <div class="message-box animated fadeIn" data-sound="alert" id="mb-remove-row">
            <div class="mb-container">
                <div class="mb-middle">
                    <div class="mb-title"><span class="fa fa-times"></span> Remove <strong>Data</strong> ?</div>
                    <div class="mb-content">
                        <p>Are you sure you want to remove this row?</p>                    
                        <p>Press Yes if you sure.</p>
                    </div>
                    <div class="mb-footer">
                        <div class="pull-right">
                            <button class="btn btn-success btn-lg mb-control-yes">Yes</button>
                            <button class="btn btn-default btn-lg mb-control-close">No</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MESSAGE BOX-->        
        
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
        
        <!-- START THIS PAGE PLUGINS-->        
        <script type='text/javascript' src='js/plugins/icheck/icheck.min.js'></script>
        <script type="text/javascript" src="js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>
        
        <script type="text/javascript" src="js/plugins/datatables/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="js/plugins/tableexport/tableExport.js"></script>
	<script type="text/javascript" src="js/plugins/tableexport/jquery.base64.js"></script>
	<script type="text/javascript" src="js/plugins/tableexport/html2canvas.js"></script>
	<script type="text/javascript" src="js/plugins/tableexport/jspdf/libs/sprintf.js"></script>
	<script type="text/javascript" src="js/plugins/tableexport/jspdf/jspdf.js"></script>
	<script type="text/javascript" src="js/plugins/tableexport/jspdf/libs/base64.js"></script>        
        <!-- END THIS PAGE PLUGINS-->  
        
        <!-- START TEMPLATE -->
        <script type="text/javascript" src="js/settings.js"></script>
        
        <script type="text/javascript" src="js/plugins.js"></script>        
        <script type="text/javascript" src="js/actions.js"></script>        
        <!-- END TEMPLATE -->
    <!-- END SCRIPTS -->                 
    </body>
</html>






