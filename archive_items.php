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
                <li><a href="docs.php"><span class="fa fa-list-ul"></span> <span class="xn-text"> Document List</span></a></li>
                <?php
                if ($_SESSION['role'] == 'hr') {
                ?>
                    <li><a href="archive_items.php"><span class="fa fa-pencil"></span> <span class="xn-text"> Archived Items List</span></a></li>
                    <li><a href="new_file.php"><span class="fa fa-th"></span> <span class="xn-text"> New File Entry</span></a></li>
                <?php } ?>

                <li><a href="changepassword.php"><span class="fa fa-pencil"></span> <span class="xn-text"> Release Archive Item</span></a></li>

                <li><a href="changepassword.php"><span class="fa fa-pencil"></span> <span class="xn-text"> Change Password</span></a></li>

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
                <li class="active"><a href="#">List of Archive Items</a></li>

            </ul>
            <!-- END BREADCRUMB -->

            <!-- PAGE TITLE -->
            <div class="page-title">
                <h2><span class="fa fa-arrow-circle-o-left"></span> Archive Items List</h2>
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

                                        <li><a href="#" onClick="$('#customers2').tableExport({type:'excel',escape:'false'});"><img src='img/icons/xls.png' width="24" /> XLS</a></li>

                                    </ul>
                                </div>

                            </div>
                            <div class="panel-body">
                                <table id="customers2" class="table datatable">
                                    <thead>
                                        <tr>
                                        <tr>
                                            <th>REF No.</th>
                                            <th>File Name</th>
                                            <th>Company</th>
                                            <th>File Description</th>
                                            <th>Department</th>
                                            <th>Storage Type</th>
                                            <th>File Location</th>
                                            <th>File Status</th>
                                            <th>Mode of Copy</th>
                                            <th>Received By</th>
                                            <th>IN Date</th>
                                            <th>Related Documents</th>
                                            <th>Requested By</th>
                                            <th>Lead Time</th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $query = 'SELECT * FROM  `archive_items`';
                                        $result = mysqli_query($db, $query) or die(mysqli_error($db));
                                        $i = 0;
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $i = $i + 1;
                                            echo '<tr>';
                                            echo '<td>' . $i . '</td>';
                                            echo '<td> <a class="btn btn-xs" href="drilldown.php?action=edit&id=' . $row['id'] . '" > ' . $row['file_name'] . '</a></td>';
                                            echo '<td>' . $row['company'] . '</td>';
                                            echo '<td>' . $row['description'] . '</td>';
                                            echo '<td>' . $row['dept'] . '</td>';
                                            echo '<td>' . ucfirst($row['storage_type']) . '</td>';
                                            echo '<td>' . $row['location'] . '</td>';
                                            echo '<td>' . $row['status'] . '</td>';
                                            echo '<td>';
                                            if ($row['mode_copy'] === 'hard') {
                                                echo 'Hard Copy';
                                            }else {
                                                echo 'Scanned';
                                            }
                                            echo '</td>';
                                            echo '<td>' . $row['received_by'] . '</td>';
                                            echo '<td>' . $row['in_date'] . '</td>';
                                            
                                            $file_names = $row['docs'];

                                            $files_array = explode(',', $file_names);

                                            echo '<td>';
                                            foreach ($files_array as $file_name) {
                                                if ($file_name === null ) {
                                                    echo 'Documents not scanned.';
                                                } else {
                                                    echo ', ' . $file_name;
                                                }
                                            }
                                            echo '</td>';

                                            echo '<td>';
                                            if ($row['requested_by'] === '') {
                                                echo '--';
                                            }else {
                                                echo $row['requested_by'];
                                            }
                                            echo '</td>';

                                            echo '<td>';
                                            if ($row['lead_time'] === '') {
                                                echo '--';
                                            }else {
                                                echo $row['lead_time'];
                                            }
                                            echo '</td>';

                                            if ($_SESSION['role'] != 'hr') {
                                                echo '<td></td>';
                                                echo '<td></td>';
                                            } else {
                                        ?>

                                                <?php
                                                echo '<td> <a  type="button" class="btn btn-xs btn-warning" href="edit_file.php?action=edit&id=' . $row['id'] . '"> EDIT </a> </td>';
                                                ?>
                                                <td>
                                                    <a type="button" href="<?php echo 'transac.php?action=delete&id=' . $row['id'] ?>" title="delete" class="btn btn-xs btn-danger" onclick="return confirm('Are you sure you want to delete this item')">DELETE</a>
                                                </td>
                                        <?php
                                            }
                                            echo '</tr> ';
                                        }
                                        ?>


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