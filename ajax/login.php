<?php
    include_once "../include/db_connect.php";

    $conn = db_connect();

    $name = $_POST['name'];

    $query = "SELECT COUNT(seq) as cnt FROM member WHERE user_name = '$name'";
    $rs = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($rs);

    $cnt = $row['cnt'];

    if ($cnt < 1) {
        $insert = "
            INSERT INTO member SET
                user_name = '".$name."',
                create_dt = '".date("Y-m-d H:i:s")."'
        ";
        if(!mysqli_query($conn, $insert)) {
            $res = array("status" => false, "msg" => "새로운 정보 추가 중 오류가 발생했습니다!", "icon" => "error", "title" => "이런!");
            echo json_encode($res);
            exit;
        } 
    }

    $res = array("status" => true, "msg" => "환영합니다! ".$name."님!", "icon" => "success", "title" => "성공!");
    echo json_encode($res);
    exit;
