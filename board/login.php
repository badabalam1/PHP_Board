<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> -->
    <title>로그인</title>
    <link rel='stylesheet' href='public/stylesheet/bootstrap.css'>
    <link rel='stylesheet' href='public/stylesheet/bootstrap.min.css'>
    <link rel='stylesheet' href='public/stylesheet/login.css'>
</head>

<body>
    <?php
    session_start();
    if($_SESSION['id']) {
        echo "<script>alert('이미 로그인 상태입니다.');location.href='./main.php';</script>";
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
                <li class="nav-item">
                    <a class="nav-link" href="./main.php">홈 <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="./login.php">로그인</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./register.php">회원가입</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0" method='post'>
                <input class="form-control mr-sm-2" name='search' type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>
    <div class='login'>
        <form class="form-signin" action='./log_ck.php' method='post'>
            <div class='form'>
                <img class="mb-4" src="../../assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
                <h1 class="h3 mb-3 font-weight-normal">로그인</h1>
                <label for="inputid" class="sr-only">id</label>
                <input type="id" id="inputid" class="form-control" placeholder="아이디" name='id' required="" autofocus="">
                <label for="inputPassword" class="sr-only">password</label>
                <input type="password" id="inputPassword" class="form-control" placeholder="비밀번호" name='pw' required="">
                <div class="checkbox mb-3">
                    <label>
                        <input type="checkbox" value="remember-me"> Remember me
                    </label>
                </div>
                <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
                <table class='user_menu'>
                    <tr>
                        <td><a href='#'>아이디 찾기</a></td>
                        <td><a href='#'>비밀번호 찾기</a></td>
                        <td style='border-right: 0px'><a href='./register.php'>회원가입</a></td>
                    </tr>
                </table>
            </div>
        </form>
    </div>
    <script type='text/javascript' src='public/javascript/bootstrap.js'></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
</body>

</html>