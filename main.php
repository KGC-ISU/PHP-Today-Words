<?php
    include_once("./include/db_connect.php");
    include_once("./lib/simple_html_dom.php"); 
    include_once("./include/function.php");    

    $conn = db_connect();

    $nowdt = date("Y-m-d");
    $query = "SELECT COUNT(*) AS 'cnt' FROM today_word WHERE modt = '$nowdt'";
    $row = mysqli_fetch_array( mysqli_query($conn, $query) );

    if ($row['cnt'] < 1) {
        $date = date("Y.m.d");
        $url = "https://learn.dict.naver.com/m/endic/today/words.nhn?targetDate=".$date;
        $data = file_get_html($url);

        $html = new simple_html_dom();        

        setTodayWords($conn, $data, $html);
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
 
</body>
</html>