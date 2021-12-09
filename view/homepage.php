<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Homepage</title>
</head>
<body>
<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/view/layout/base/header.php';
?>
<a href="/about">На страницу О нас</a>
<a href="/posts">На страницу posts</a>
<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/view/layout/base/footer.php';
?>
</body>
</html>

