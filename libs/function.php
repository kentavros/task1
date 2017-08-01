<?php
//Функция просмотра директории и заодно проверки, директория ли это,
//аргументом получает путь
function dir_exp($path)
{
    if(is_dir($path)){
        //yes is dir - go

        if($dir=opendir(UPLOAD_PATH))
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



//function Upload file
function upload_file()
{
        if(is_uploaded_file($_FILES['file']['tmp_name']))
        {
            move_uploaded_file($_FILES['file']['tmp_name'], "upload/".$_FILES['file']['name']);
            return true;
        }
        else
        {
            return false;
        }
}

//Delete file
function delete_file()
{
        unlink('upload/'.$_GET['file_name']);
        return true;
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
