<?php
    include_once("./lib/simple_html_dom.php");
    include_once("./include/function.php");

    $url = "https://m.search.naver.com/search.naver?sm=mtp_hty.top&where=m&query=%EC%98%A4%EB%8A%98%EC%9D%98+%EB%8B%A8%EC%96%B4";
    $html = file_get_html($url);
    $elements = $html->find('ul.word_lst', 0)->find('li');

    $word_arr = array();
    foreach($elements as $el) {
        $key = $el->find('a.word', 0)->plaintext;
        $value = $el->find('span.mean', 0)->plaintext;
        $value = explode(';', $value);
        $word_arr[$key] = $value;
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>오늘의 단어</title><title>Document</title>
    <link rel="stylesheet" href="./css/style.css">
    <script src="https://kit.fontawesome.com/bf93393bff.js" crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="./js/main.js"></script>
</head>
<body>
    <div id="outer">
        <div id="background-color"></div>
        <div class="container">
            <div class="word-line">
                <? foreach ($word_arr as $eng => $word) { ?>
                    <div class="box">
                        <span class="word-title"><?= $eng ?></span>
                        <? foreach ($word as $value) { ?>
                            <p class="word-text"><?= $value ?></p>                        
                        <? } ?>
                    </div>
                <? } ?>
                <div class="box">
                    
                </div>
            </div>
        </div>
    </div>    
</body>
</html>