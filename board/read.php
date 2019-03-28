<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> -->
    <title>메인</title>
    <link rel='stylesheet' href='public/stylesheet/bootstrap.css'>
    <link rel='stylesheet' href='public/stylesheet/bootstrap.min.css'>
    <link rel='stylesheet' href='public/stylesheet/login.css'>
    <link rel='stylesheet' href='public/stylesheet/write.css'>
    <link rel='stylesheet' href='public/stylesheet/read.css'>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
    <script type='text/javascript' src='public/javascript/bootstrap.js'></script>
    <script src='public/javascript/write.js'></script>
</head>

<body>
    <?php
    include './conn.php';
    session_start();
    if(!($_GET['idx'])) {
        echo "<script>alert('게시물을 선택해주세요.');location.href='./main.php';</script>";
    }
    $idx = $_GET['idx'];
    $sql = "SELECT * FROM board WHERE id=$idx";
    $result = $mysqli->query($sql);
    $row = $result->fetch_array();
    ?>
    <nav class="navbar navbar-dark bg-dark navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="./main.php">샘플 게시판</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01"
            aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="./main.php">홈 <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./logout.php">로그아웃</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0" method='post'>
                <input class="form-control mr-sm-2" name='search' type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>
    <form class="form-signin">
        <div class="text-center mb-4">
            <div class="card-header">Read</div>
        </div>
        <div class="form-label-group NameDiv">
            <label for="inputName">글쓴이</label>
            <input type="text" id="inputName" class="form-control" placeholder="글쓴이" required autofocus
                style='text-align: center' value='<?php echo $row["1"]?>' disabled>
        </div>
        <div class="form-label-group DateDiv">
            <label for="inputDate">날짜</label>
            <input type="text" id="inputDate" class="form-control" placeholder="날짜" required autofocus
                style='text-align: center' value='<?php echo $row["4"]?>' disabled>
        </div>
        <div class="form-label-group">
            <label for="inputTitle">제목</label>
            <input type="text" id="inputTitle" class="form-control" placeholder="제목" required autofocus
                style='text-align: center' value='<?php echo $row["2"]?>' disabled>
        </div>
        <div class='form-label-group'>
            <label form=inputText>내용</label>
            <div style='height: 250px;background: #e9ecef;border: 1px solid #ced4da;'><?php echo $row["3"]?></div>
        </div>
        <div class="checkbox mb-3">
            <label>
            </label>
        </div>
    </form>
    <button type="button" class="btn btn-outline-secondary write" onclick="location.href='./update.php?idx=<?php echo $idx ?>'">수정</button>
    <button type="button" class="btn btn-outline-secondary write" onclick="location.href='./remove.php?idx=<?php echo $idx ?>'">삭제</button>
</body>

</html>