<?php
//function mkdir
function mkDirUpload($path){
    mkdir($path, 0777);
}



//function Upload file
function upload_file()
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {

        if(is_uploaded_file($_FILES['file']['tmp_name']))
        {
            //for class linux
            /*move_uploaded_file($_FILES['file']['tmp_name'], "/usr/home/user6/public_html/MYPHP/task1/upload/".$_FILES['file']['name']);*/
            move_uploaded_file($_FILES['file']['tmp_name'], "upload/".$_FILES['file']['name']);
            return true;
        }
        else
        {
            return false;
        }
    }
}


//Функция просмотра директории и заодно проверки, директория ли это,
//аргументом получает путь
function dir_exp($path)
{
    if(is_dir($path)){
        //yes is dir - go

        if($dir=opendir('upload'))
        {
            $count =1;
            $arr_fiels = array();
            while (false !== ($entry = readdir($dir)))
            {
                //Игнорируем элементы .. и .
                if($entry == '.' || $entry == '..'){
                    continue;
                }
                //создаем массив с именами и размерами файлов - а так же счетчик ставим в индекс, дальше
                // его применить в выводе таблицы как номер п.п.
                $arr_fiels[] = array(
                        'number' => $count,
                        'file_name' => $entry,
                        'file_size' => filesize("upload/".$entry)
                );
                $count++;

            }
            closedir($dir);
            return $arr_fiels;
        }
    }
    else
    {
        return false;
    }

}

//Delete file
function delete_file($file)
{

    if(isset($_GET['action']) && file_exists('upload/'.$_GET['file_name']))
    {

        unlink('upload/'.$_GET['file_name']);
        return true;
    } else
    {
        return false;
    }
}



//функция перевода байтов в КБ, МБ, ГБ

function file_size_convert($bytes)
{
    if ($bytes >= 1073741824)
    {
        $bytes = number_format($bytes / 1073741824, 2) . ' GB';
    }
    elseif ($bytes >= 1048576)
    {
        $bytes = number_format($bytes / 1048576, 2) . ' MB';
    }
    elseif ($bytes >= 1024)
    {
        $bytes = number_format($bytes / 1024, 2) . ' KB';
    }
    elseif ($bytes > 1)
    {
        $bytes = $bytes . ' bytes';
    }
    elseif ($bytes == 1)
    {
        $bytes = $bytes . ' byte';
    }
    else
    {
        $bytes = '0 bytes';
    }
    return $bytes;
}

?>
