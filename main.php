<?php
    include("./lib/simple_html_dom.php");

    $url = "https://m.search.naver.com/search.naver?sm=mtp_hty.top&where=m&query=%EC%98%A4%EB%8A%98%EC%9D%98+%EB%8B%A8%EC%96%B4";
    $html = file_get_html($url);
    $elements = $html->find('ul.word_lst', 0)->find('li');

    $word_arr = array();
    foreach($elements as $el) {
        $key = $el->find('a.word', 0)->plaintext;
        $value = $el->find('span.mean', 0)->plaintext;
        $value = explode(';', $value);
        $word_arr[$key] = $value[0];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>오늘의 단어</title><title>Document</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css" integrity="sha384-v8BU367qNbs/aIZIxuivaU55N5GPF89WBerHoGA4QTcbUjYiLQtKdrfXnqAcXyTv" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="./js/main.js"></script>
</head>
<body>
    <div id="background-color"></div>
</body>
</html>