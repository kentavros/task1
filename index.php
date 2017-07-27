<?php
include ('libs/config.php');
include ('libs/function.php');

//Delet file
if (delete_file($file))
{
    echo MESSAGE_DEL_TRUE;
}

//Upload file
if (upload_file())
{
    echo FILE_UPLOAD;
}

//Check the directory for files
if (dir_exp($dir_up))
{
    $files = dir_exp($dir_up);
}
else
{
    mkDirUpload($dir_up);
}
?>

<?php
include('templates/template.php');
?>







