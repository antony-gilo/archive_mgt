<?php
session_start();
if (!isset($_SESSION['id-archive'])) {
    header('Location: login.php');
}

include('connection.php');

$user_id = $_SESSION['id-archive'];

            $user_query = "SELECT names FROM users WHERE id = '$user_id'";
            $user_query_result = mysqli_query($db, $user_query);
            $user_query_row = mysqli_fetch_assoc($user_query_result);
            $user_names = $user_query_row['names'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- META SECTION -->
    <title>TAL Archives Management</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon" />
    <!-- END META SECTION -->

    <!-- CSS INCLUDE -->
    <link rel="stylesheet" type="text/css" id="theme" href="css/theme-default.css" />
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
                    <a href="index.php">TAL ADMIN</a>
                    <a href="#" class="x-navigation-control"></a>
                </li>
                <li class="xn-profile">

                    <div class="profile">

                        <div class="profile-data">
                            <div class="profile-data-name">
                                <div class="profile-data-name"><?php echo strtoupper($user_names); ?></div>
                            </div>

                        </div>

                    </div>
                </li>
                <li><a href="archive_items.php"><span class="fa fa-list-ul"></span> <span class="xn-text"> Archived Items List</span></a></li>
                <li><a href="new_file.php"><span class="fa fa-archive"></span> <span class="xn-text"> New File Entry</span></a></li>
                <?php
                if ($_SESSION['role'] == 'hr') {
                ?>
                    <li><a href="audit.php"><span class="fa fa-eye"></span> <span class="xn-text"> Audit List</span></a></li>
                <?php } ?>
                <li><a href="changepassword.php"><span class="fa fa-cogs"></span> <span class="xn-text"> Change Password</span></a></li>

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
                        <input type="text" name="search" placeholder="Search..." />
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
                <li><a href="#">Talgroup Archive Management</a></li>
                <li class="active"><a href="#">Release Archive Item</a></li>

            </ul>
            <!-- END BREADCRUMB -->

            <!-- PAGE TITLE -->
            <div class="page-title">
                <h2><span class="fa fa-arrow-circle-o-left"></span> Get Out Archive Item</h2>
            </div>
            <!-- END PAGE TITLE -->

            <!-- PAGE CONTENT WRAPPER -->
            <div class="page-content-wrap">

                <?php

                $archive_item_query = 'SELECT * FROM `archive_items` WHERE id =' . (int)$_GET['id'];
                $result = mysqli_query($db, $archive_item_query);

                $row = mysqli_fetch_array($result);
                $company = $row['company'];
                $file_name = $row['file_name'];
                $department = $row['dept'];
                $storage_type = ucfirst($row['storage_type']);
                $file_desc = $row['description'];
                $file_loc = $row['location'];
                $mode_copy = ucfirst($row['mode_copy']);
                $files = $row['docs'];
                ?>


                <div class="row">
                    <div class="col-md-12">

                        <form class="form-horizontal" method="post" action="transac.php?action=release" enctype="multipart/form-data">
                            <div class="panel panel-default">
                                <div class="panel-heading">

                                    <ul class="panel-controls">
                                        <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                                    </ul>
                                </div>

                                <div class="panel-body">

                                    <div class="form-group">
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <input type="hidden" name="file_name" class="form-control" value="<?php echo $file_name;   ?>" />
                                                <input type="hidden" name="id" class="form-control" value="<?php echo $_GET['id']; ?>" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Name Of File Requester</label>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" required=required name="requested_by" class="form-control" />
                                            </div>
                                            <span class="help-block">The Name Of the Person Requesting Archive File</span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Expected Return Date</label>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                                <input type="date" name="lead_time" class="form-control" value="<?php echo $date_due; ?>">
                                            </div>
                                            <span class="help-block">Click on CALENDER ICON ON THE RIGHT to get datepicker</span>
                                        </div>
                                    </div>

                                <div class="panel-footer">
                                    <button type="reset" class="btn btn-default">Clear Form</button>
                                    <button type="submit" class="btn btn-primary pull-right" name="release_file">Submit</button>
                                </div>
                            </div>
                        </form>
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
                    <p>Press No if you want to continue work. Press Yes to logout current user.</p>
                </div>
                <div class="mb-footer">
                    <div class="pull-right">
                        <a href="login.php" class="btn btn-success btn-lg">Yes</a>
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


    <script type="text/javascript" src="js/plugins.js"></script>
    <script type="text/javascript" src="js/actions.js"></script>
    <!-- END TEMPLATE -->
    <!-- END SCRIPTS -->
</body>

</html>