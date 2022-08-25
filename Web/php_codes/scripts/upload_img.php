#enctype & input name = FILES['name']
<form action="" method="post" enctype="multipart/form-data">
            <input class="form-control mx-auto d-block" style="width: 200px; margin-top: 0.5em; width: 70%; "
                    type="file" id="formFile" name="file" onchange="readURL(this);" accept="image/*">
                <br>
            <br>
            <div class="d-flex justify-content-center">
                <input class="btn  btn-primary" name="submit" type="submit" value="Register">
            </div>
    </form> 
<?php
        if (empty($_FILES["file"]["name"])) {
            $image = "https://ryples.com/aladin/img/default1.png";
        } else {
            $target_path = "images/" . $_FILES['file']['name'];
            move_uploaded_file($_FILES['file']['tmp_name'], $target_path);
            $image = "https://ryples.com/aladin/img/" . $target_path;
        }
?>
