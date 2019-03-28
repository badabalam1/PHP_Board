<?php
    include "./conn.php";
    error_reporting(E_ALL);
    ini_set('display_errors', '0');

    function injection_check($String) {
        if(preg_match("/\s+/",$String)) {exit("<script>alert('공백을 넣지마세요 $String');location.href='./register.php';</script>");}
        if(preg_match("/[가-힣]/", $String)) {exit("<script>alert('영어만 사용해주세요');location.href='./register.php';</script>");}
        if(preg_match("/'|\"|-|#/", $String)) { exit('<script>alert("해킹하지마세요");location.href="./register.php";</script>');}
    }
    
    $id = $_POST['id'];
    injection_check($id);
    $pw = $_POST['pw'];
    injection_check($pw);

    $sql = "INSERT into member(`id`, `pw`) values ('$id', '$pw')";
    if($mysqli->query($sql)) {
        echo "<script>alert('회원가입 되었습니다. 로그인 화면으로 이동합니다.');location.replace('./login.php');</script>";
    } else {
        echo "<script>alert('이미 회원가입된 아이디입니다.');history.back();</script>";
    }
?>