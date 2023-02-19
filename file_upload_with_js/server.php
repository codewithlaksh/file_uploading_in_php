<?php
$success = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $file1 = $_FILES["files"];
    $msg = array();
    $uploaddir = "uploads/";
    $uploadfile1 = $uploaddir.basename($file1["name"]);
    if (move_uploaded_file($file1["tmp_name"], $uploadfile1)) {
        $success = true;
        array_push($msg, array(
            "success" => $success,
            "message" => "Your file has been uploaded successfully!"
        ));
        echo json_encode($msg);
    } else {
        array_push($msg, array(
            "success" => $success,
            "message" => "Some error occurred!"
        ));
        echo json_encode($msg);
    }
}

?>