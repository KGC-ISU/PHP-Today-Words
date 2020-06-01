<?php 
    function dd($array) 
    {
        echo "<pre>";
        var_dump($array);
        echo "</pre>";
    }

    function alert($msg) {
        echo "<script>alert('$msg');</script>";
    }

    function setTodayWords($conn, $data, $html)
    {        
        $html->load($data);

        $elements = $html->find('div#ct', 0)->find('ul.lst_ul', 0)->find('li.lst_li2');        
        foreach($elements as $el) {       
            $eng = $el->find('em.words', 0)->plaintext;
            $text = $el->find('p.txt_ct2', 0)->plaintext;

            $query = "
                INSERT INTO today_word SET
                    eng = '".$eng."',
                    meaning = '".$text."',
                    modt = '".date('Y-m-d')."'
            ";

            if (!mysqli_query($conn, $query)) {
                alert("오늘의 단어 저장 중 오류 발생");
                exit;
            }
        }

        unset($html);
    }
?>