<?php ?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Загрузка нескольких файлов. Занятие 6, задача 1</title>
</head>
<body>

    <form enctype="multipart/form-data" action="multipart-load-handler.php" method="POST">
        <!-- <input type="hidden" name="MAX_FILE_SIZE" value="30000" /> -->
        Выбор файла: <input name="pictures[]" type="file" accept="image/*" multiple/>
        <input type="submit" name="submit" value="Отправить файл" />
    </form>
    
</body>
</html>