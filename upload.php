<?php
$success = false;
$showError = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $file1 = $_FILES["file1"];
    $uploaddir = "files/";
    $uploadfile1 = $uploaddir.basename($file1["name"]);
    if (move_uploaded_file($file1["tmp_name"], $uploadfile1)) {
        $success = "File has been uploaded successfully!";
    } else {
        $showError = "Some error occurred!";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Uploading in PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <?php 
        if ($success) {
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> '.$success.'
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        }
        if ($showError) {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong> '.$showError.'
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        }
    ?>
    <div class="container my-3">
        <h1 class="text-center">File Uploading in PHP</h1>
        <form action="<?php echo $_SERVER["REQUEST_URI"] ?>" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="file1">File</label>
                <input type="file" name="file1" id="file1" class="form-control">
            </div>
            <button type="submit" class="btn btn-dark">Upload</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>