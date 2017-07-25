<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>index php</title>
</head>
<body>

<?php
include ('libs/config.php');
include ('libs/function.php');
include('templates/upload_file.php');

?>

<hr>

<?php
//Delet file
if(delete_file($file)) {
    echo MESSAGE_DEL_TRUE;
}

//Upload file
if(upload_file()){
    echo FILE_UPLOAD;
}

//Explore folder /upload
include('templates/dir_exp_table.php');

?>






</body>
</html>





