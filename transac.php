<?php
session_start();
if (!isset($_SESSION['id-archive'])) {
    header('Location: login.php');
}

include('connection.php');

$get_request = $_GET['action'];

switch ($get_request) {
    case 'add':

        $file_name = $_POST['file_name'];
        $company = $_POST['company'];
        $department = $_POST['dept'];
        $storage_type = $_POST['storage'];
        $file_desc = $_POST['file_desc'];
        $file_loc = $_POST['file_loc'];
        $mode_copy = $_POST['mode_copy'];

        if (isset($_POST['add_claim'])) {

            $allowed_ext = [
                'pdf',
                'png',
                'jpeg',
                'jpg',
            ];

            $errors = array();

            $uploaded_files = $_FILES['related_docs'];
            $file_names_to_db = '';

            foreach ($uploaded_files['name'] as $key => $file) {

                $doc_name = $file;
                $target_dir = 'assets/fileupload/files/';

                $file_path = $target_dir . $doc_name;
                $file_ext = pathinfo($file_path, PATHINFO_EXTENSION);
                $file_size = $uploaded_files['size'][$key];
                $temp_location = $uploaded_files['tmp_name'][$key];

                if (in_array($file_ext, $allowed_ext) === false) {
                    $errors[] = 'The File Extensions Allowed .PDF, .PNG and .JPEG/JPG.';
                }

                if ($file_size > 3145728) {
                    $errors[] = 'File size MUST be Below 3.5MBs';
                }

                $file_names_to_db .= $doc_name . ', ';
            }

            $user_id = $_SESSION['id-archive'];

            $user_query = "SELECT names FROM users WHERE id = '$user_id'";
            $user_query_result = mysqli_query($db, $user_query);
            $user_query_row = mysqli_fetch_assoc($user_query_result);
            $names = $user_query_row['names'];

            if (empty($errors)) {

                move_uploaded_file($temp_location, $file_path);

                $query = "INSERT INTO `archive_items` (`id`, `file_name`, `company`, `dept`, `storage_type`, `description`, `location`, `mode_copy`, `docs`, `recieved_by`) VALUES ('', '$file_name', '$company', '$department', '$storage_type', '$file_desc', '$file_loc', '$mode_copy', '$file_names_to_db', '$names')";

                $insert = mysqli_query($db, $query);
                if ($insert) {
                    echo '<script type="text/javascript">
                            alert("Claim Item Added Successfully!");
                            window.location = "index.php";
                        </script>';
                }
            } else {
                foreach ($errors as $error) {
                    echo '<script type="text/javascript">
                            alert("' . $error . '");
                            window.history.back();
                        </script>';
                }
            }
        }
        break;

    case 'edit':

        if (isset($_POST['edit_claim'])) {

            $edit_id = (int)$_POST['id'];
            $file_name = $_POST['file_name'];
            $company = $_POST['company'];
            $department = $_POST['dept'];
            $storage_type = strtolower($_POST['storage']);
            $file_desc = $_POST['file_desc'];
            $file_loc = $_POST['file_loc'];
            $mode_copy = strtolower($_POST['mode_copy']);

            $allowed_ext = [
                'pdf',
                'png',
                'jpeg',
                'jpg',
            ];

            $user_id = $_SESSION['id-archive'];

            $user_query = "SELECT names FROM users WHERE id = '$user_id'";
            $user_query_result = mysqli_query($db, $user_query);
            $user_query_row = mysqli_fetch_assoc($user_query_result);
            $user_names = $user_query_row['names'];

            $errors = array();

            $edit_uploaded_files = $_FILES['related_docs'];
            $edit_file_names_to_db = '';

            foreach ($edit_uploaded_files['name'] as $key => $edit_file) {


                if ($edit_file !== "") {
                    $exist_files_query = mysqli_query($db, "SELECT * FROM `archive_items` WHERE id = '$edit_id'");
                    $exist_files_result = mysqli_fetch_array($exist_files_query);
                    $exist_files = ', ';

                    $doc_name = $edit_file;
                    $target_dir = 'assets/fileupload/files/';

                    $file_path = $target_dir . $doc_name;
                    $file_ext = pathinfo($file_path, PATHINFO_EXTENSION);
                    $file_size = $edit_uploaded_files['size'][$key];
                    $temp_location = $edit_uploaded_files['tmp_name'][$key];

                    if (in_array($file_ext, $allowed_ext) === false) {
                        $errors[] = 'The File Extensions Allowed .PDF, .PNG and .JPEG/JPG.';
                    }

                    if ($file_size > 3145728) {
                        $errors[] = 'File size MUST be Below 3.5MBs';
                    }


                    if (empty($errors)) {
                        $edit_file_names_to_db .= $doc_name;
                        $edit_file_names_to_db =  $edit_file_names_to_db . $exist_files;

                        move_uploaded_file($temp_location, $file_path);

                        $update_query = "UPDATE `archive_items` SET `file_name` = '$file_name', `company` = '$company',`dept` = '$department', `storage_type`= '$storage_type', `description` = '$file_desc',`location` = '$file_loc', `mode_copy` = '$mode_copy', `docs` = '" . $edit_file_names_to_db . "', `last_edit` ='$user_names' WHERE `id` = '$edit_id'";

                        $update_archive = mysqli_query($db, $update_query);
                    
                        if ($update_archive) {
                            echo '<script type="text/javascript">
                                    alert("Archive Item Edited Successfully!");
                                    window.location = "index.php";
                                </script>';
                        }
                    } else {
                        foreach ($errors as $error) {
                            echo '<script type="text/javascript">
                                    alert("' . $error . '");
                                    window.history.back();
                                </script>';
                        }
                    }
                } else {
                    $no_file_query = "UPDATE `archive_items` SET `file_name` = '$file_name', `company` = '$company',`dept` = '$department', `storage_type`= '$storage_type', `description` = '$file_desc',`location` = '$file_loc', `mode_copy` = '$mode_copy', `last_edit` ='$user_names' WHERE `id` = '$edit_id'";

                    $insert = mysqli_query($db, $no_file_query);
                    if ($insert) {
                        echo '<script type="text/javascript">
                                    alert("Claim Item Edited Successfully!");
                                    window.location = "index.php";
                                </script>';
                    }
                }
            }
        }



        break;

    case 'delete':

        $delete_id = $_GET['id'];
        $delete_query = "DELETE FROM `archive_items` WHERE id = '$delete_id'";

        $delete_item = mysqli_query($db, $delete_query);

        if ($delete_item) {
            echo '<script type="text/javascript">
                    alert("Claim Item Deleted Successfully!");
                    window.location = "archive_items.php";
                  </script>';
        }


        break;

    default:
        # code...
        break;
}
