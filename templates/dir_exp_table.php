

<table  border="1">
    <caption>Contents of the directory </caption>
    <tr >
        <th>Number</th>
        <th>File name</th>
        <th>File size</th>
        <th>Remove file</th>
    </tr>

        <?php
        //выводим содержимое папки Upload и кнопку Delete
            $files = dir_exp($dir_up);
            foreach($files as $file){
                echo "<tr>";
                    echo "<td>".$file['number']."</td>";
                    echo "<td>".$file['file_name']."</td>";
                    echo "<td>".file_size_convert($file['file_size'])."</td>";
                    echo "<td><a href='index.php?action=delete&file_name=".$file['file_name']."'>Delete</a></td>";
                echo "</tr>";
            }
        ?>

</table>