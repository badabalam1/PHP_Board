<?php
    include "./conn.php";

    error_reporting(E_ALL);
    ini_set('display_errors', '0');

    session_start();

    function injection_check($String) {
    }

    $id = $_POST['id'];
    //injection_check($id);
    $pw = $_POST['pw'];
    //injection_check($pw);

    $sql = "SELECT * FROM member WHERE id='$id' AND pw='$pw'";
    $result = $mysqli->query($sql);

    $row=mysqli_fetch_assoc($result);
    if($row['id']) {
        echo "<script>alert('로그인에 성공했습니다.');</script>";
    } else {
        echo "<script>alert('아이디 혹은 비밀번호가 잘못되었습니다.');location.replace('./login.php');</script>";
    }
    $_POST['pw'] = addcslashes($_POST['pw']);
    if(($row['pw']) && ($row['pw'] == $pw)) {
        $_SESSION['id']=$id;
        $_SESSION['pw']=$pw;
        echo "<script>location.replace('./main.php');</script>";
    } else {
        echo "<script>location.replace('./main.php');</script>";
    }
?>