<?php
    include_once "../include/db.php";

    $name = $_POST['name'];

    $query = "SELECT * FROM member WHERE name = '$name'";
    $rs = $mysqli->query($query);
    $cnt = mysqli_num_rows($rs);
    if ($cnt < 1) {
        $insert = "
            INSERT INTO member SET
                name = '".$name."',
                modt = '".date("Y-m-d H:i:s")."'
        ";
        if(!$mysqli->query($insert)) {
            $res = array("status" => false, "msg" => "새로운 정보 추가 중 오류가 발생했습니다!", "icon" => "error", "title" => "이런!");
            echo json_encode($res);
            exit;
        } 
    }

    $res = array("status" => true, "msg" => "환영합니다! ".$name."님!", "icon" => "success", "title" => "성공!");
    echo json_encode($res);
    exit;
?>
