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
    <div class="container my-3">
        <h1 class="text-center">File Uploading in PHP</h1>
        <div id="alertMsg"></div>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="file1">File</label>
                <input type="file" name="file1" id="file1" class="form-control">
            </div>
            <div id="status"></div>
            <button type="button" class="btn btn-dark" id="filesBtn">Upload</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    <script>
        document.getElementById("filesBtn").addEventListener("click", (e) => {
            e.preventDefault();
            const files = document.getElementById("file1").files;
            const formData = new FormData();
            formData.append('files', files[0]);
            document.getElementById("status").innerHTML = `
            <div class="d-flex align-items-center">
                <strong>Uploading...</strong>
                <div class="spinner-border" role="status" aria-hidden="true"></div>
            </div>
            `;
            fetch('server.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                const success = data[0].success;
                const message = data[0].message;

                let alertMsg = document.getElementById("alertMsg");
                alertMsg.setAttribute("class", success?"alert alert-success":"alert alert-danger");
                alertMsg.innerHTML = success?"<strong>Success!</strong>\t":"<strong>Error!</strong>\t";
                alertMsg.innerHTML += message;
                document.getElementById("status").innerHTML = `
                <div class="d-flex align-items-center">
                    <strong>Uploaded</strong>
                </div>
                `;
                document.getElementById("file1").value = "";
                setTimeout(() => {
                    alertMsg.removeAttribute("class");
                    alertMsg.innerHTML = "";
                    document.getElementById("status").innerHTML = "";
                }, 2000);
            })
        })
    </script>
</body>

</html>