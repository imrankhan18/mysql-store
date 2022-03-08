<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $filename = $_FILES['f-upload']['name'];
    if (isset($_SESSION['pics'])) {
        array_push($_SESSION['pics'], $filename);
    } else {
        $_SESSION['pics'] = array($filename);
    }
    $file = 'uploads/' . $_FILES['f-upload']['name'];
    
    if (isset($_POST['submit'])) {
        
        move_uploaded_file($_FILES['f-upload']['tmp_name'], $file);
        
        echo "uploaded Successfully!!!";
    }
}
header("loaction:index.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        img {
            border: 1px solid #ddd;
            border-radius: 4px;
            padding: 5px;
            width: 150px;
            max-width: 100%;
            height: auto;
        }

        body {
            background-color: cornsilk;
        }
    </style>
</head>


<body>

    </form>
    <div>
        <h2>Gallery</h2>
        <p>This page displayed the list of uploaded images. </p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" enctype="multipart/form-data">
            <input type="file" name="f-upload">
            <input type="submit" value="upload" name="submit" style="color:white; background-color:rgb(22,76,122); width:80px; height:40px;"><br><br>
        </form>
    </div>

    <?php
    //$location = 'uploads/';
    //$files =array_diff(scandir($location), array('.', '..'));
    if (isset($_SESSION['pics'])) {
        foreach ($_SESSION['pics'] as $p) {
            echo "<img src='uploads/$p'>";
            //print_r($file);
        }
    }



    ?>
</body>

</html>