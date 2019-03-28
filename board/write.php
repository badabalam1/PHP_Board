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
    session_start();
    if(!($_SESSION['id'])) {
        echo "<script>alert('로그인 후 이용해주십시오.');location.href='./main.php';</script>";
    }
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
    <form class="form-signin" method='post' action='./wrt_ck.php' encType="multipart/form-data">
        <div class="text-center mb-4">
            <div class="card-header">Write</div>
        </div>
        <div class="form-label-group">
            <label for="inputTitle">Title</label>
            <input type="text" name='title' id="inputTitle" class="form-control" placeholder="제목" required autofocus
                style='text-align: center'>
        </div>
        <div class='form-label-group'>
            <label form=inputText>내용</label>
            <textarea class="form-control" rows="10" name="content" id="inputText" style="text-align: center" required></textarea>
        </div>
        <div class='form-label-group'>
            <label for='inputFile' id='asdf'>File</label>
            <input id="fileName" class="form-control inputFile" style='background-color: white;text-align: center;'
                placeholder="File" disabled/>
            <input type="file" id='inputFile' name='img' class='form-control' placeholder='file'>
        </div>
        <div class="checkbox mb-3">
            <label>
            </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Write</button>
    </form>
</body>

</html>