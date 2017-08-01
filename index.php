<?php
include ('libs/config.php');
include ('libs/function.php');
//Upload fiels
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    upload_file();
}

//Delete file
if(isset($_GET['action']) && file_exists('upload/'.$_GET['file_name']))
{
    delete_file();
}
//Check the directory for files
if (dir_exp(UPLOAD_PATH))
{
    $files = dir_exp(UPLOAD_PATH);
}
?>
<?php
include('templates/template.php');
?>
