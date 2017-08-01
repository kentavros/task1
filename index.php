<?php
include ('libs/config.php');
include ('libs/function.php');

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
