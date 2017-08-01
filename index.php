<?php
include ('libs/config.php');
include ('libs/function.php');
//Upload fiels
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    if (uploadFile())
    {
        $flag = 1;
    }
    else
    {
        $flag=2;
    }
}

//Delete file
if(isset($_GET['action']) && file_exists('upload/'.$_GET['file_name']))
{
    if(deleteFile())
    {
        $flag=3;
    }
    else
    {
        $flag=4;
    }
}

//Check the directory for files
if (dirExp(UPLOAD_PATH))
{
    $files = dirExp(UPLOAD_PATH);
}
?>
<?php
include('templates/template.php');
?>
