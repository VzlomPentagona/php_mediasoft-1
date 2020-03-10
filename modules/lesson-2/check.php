<?php

# На вход ожидаем POST запрос с параметрами "text_area" и "file"

    function create_csv($prefix_file, $input_text){
        # Чтобы файлы были уникальные и не требовали перезаписи добавлю в конце микросекунды.
        $time = microtime(true);
        $format_time = str_ireplace(".", "", $time);
        $file_name = $prefix_file . $format_time . '.csv';
        $fp = fopen('./csv_results/' . $file_name, "a"); // Открываем файл в режиме записи
        $test = fwrite($fp, $input_text); // Запись в файл

        if ($test)
            echo 'Файл ' . $file_name . ' успешно создан' . '<br>';
        else
            echo 'Ошибка при записи в файл.' . '<br>';
        fclose($fp); //Закрытие файла
    }


    if($_POST["text_area"] == "") {
        echo 'Текст не введен' . '<br>';
    }else{
        echo 'Вы ввели текст: ' . $_POST["text_area"] . '<br>';
        echo 'Будет выполнено создание файла ' . '<br>';
        create_csv('text', $_POST["text_area"]);
    }

    echo "<br>";

    if($_POST["file"] == "") {
        echo 'Файл не указан' . '<br>';
    }else{
        echo 'Вы указали файл: ' . $_POST["file"] . '<br>';
        echo 'Будет выполнено создание файла ' . '<br>';
        create_csv('file_name', $_POST["file"]);
    }



