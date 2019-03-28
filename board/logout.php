<?php
    session_start();
    if(!($_SESSION['id'])) {
        echo "<script>alert('로그인 상태가 아닙니다.');location.href='./main.php';</script>";
    }
    session_destroy();
    echo "<script>alert('로그아웃되었습니다.');location.replace('./main.php');</script>";
?>