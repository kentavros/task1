<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Выше 3 Мета-теги ** должны прийти в первую очередь в голове; любой другой руководитель контент *после* эти теги -->
    <title>Task 1 _ Upload files</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- Предупреждение: Respond.js не работает при просмотре страницы через файл:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script >
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<h1 class="text-center">Upload files</h1>

<!-- Form for upload files -->
<form role="form" class="form-inline text-center" action="index.php" method="post" enctype="multipart/form-data" >
    <div class="form-group">
        <input class="btn btn-default" type="file" value="Select file" name="file" />
    </div>
    <div class="form-group">
        <input class="btn btn-success" type="submit" value="Upload" name="upload" />
    </div>
</form>

<!--The contents of the Upload folder -->
<table class="table table-bordered table-hover ">
    <caption class="text-center">Contents of the directory </caption>
    <tr class="alert-info">
        <th>Number</th>
        <th >File name</th>
        <th>File size</th>
        <th>Remove file</th>
    </tr>

    <?php
    if(!empty($files))
    {    //Output the contents of the Upload folder and the Delete button
        foreach ($files as $file) {
        echo "<tr>";
            echo "<td>" . $file['number'] . "</td>";
            echo "<td>" . $file['file_name'] . "</td>";
            echo "<td>" . file_size_convert($file['file_size']) . "</td>";
            echo "<td class='alert-danger'><a href='index.php?action=delete&file_name=" . $file['file_name'] . "'>
                    Delete
                  </a></td>";
            echo "</tr>";
    }
}
else
{
    echo "<tr><td></td><td>< - Folder is empty or Unavailable- ></td><td></td><td></td></tr>";
}
?>
</table>
<!-- на jQuery (необходим для Bootstrap - х JavaScript плагины) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Включают все скомпилированные плагины (ниже), или включать отдельные файлы по мере необходимости -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>