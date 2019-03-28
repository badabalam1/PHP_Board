<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>메인</title>
    <link rel='stylesheet' href='public/stylesheet/bootstrap.css'>
    <link rel='stylesheet' href='public/stylesheet/bootstrap.min.css'>
    <link rel='stylesheet' href='public/stylesheet/bootstrap-grid.css'>
    <link rel='stylesheet' href='public/stylesheet/main.css'>
</head>

<body>
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
                <?php 
                session_start();

                if(!$_SESSION['id']) {
                ?>
                <li class="nav-item">
                    <a class="nav-link" href="./login.php">로그인</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./register.php">회원가입</a>
                </li>
                <?php
                } else { 
                ?>
                <li class="nav-item">
                    <a class="nav-link" href="./logout.php">로그아웃</a>
                </li>
                <?php
                }
                ?>
            </ul>
            <form class="form-inline my-2 my-lg-0" method='get'>
                <input class="form-control mr-sm-2" name='search' type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>
    <div class='notice'>
        <div style='padding: 30px 0 0 0;'>
            <h1><b>샘플 게시판</b></h1>
        </div>
        <div style='padding: 10px 0 0 0;'>
            <table class="table">
                <thead>
                    <tr class="table_header">
                        <th scope="col">번호</th>
                        <th class='t_text t_one' scope="col">제목</th>
                        <th class='t_text' scope="col">작성자</th>
                        <th class='t_text' scope="col">작성날짜</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include './conn.php';

                    $page_list_size = 10;
                    $no = $_GET['idx'] * 10;
                    if($no / 10 <= 0 || $no / 10 == 1 ) {
                        $no = 0;
                    } else {
                        $no = $no - 10;
                    }

                    if($_GET['search']) {
                        $search = $_GET['search'];
                        $sql = "SELECT * FROM board where title like '%$search%' order by id desc limit $no, $page_list_size";
                        $result = $mysqli->query($sql);
                        while($row = $result->fetch_assoc()) {
                    ?>
                    <tr>
                        <th scope="row">
                            <?php echo $row['id']?>
                        </th>
                        <td class='t_text t_one'>
                            <a href='<?php echo "./read.php?idx=".$row['id']; ?>' style='text-decoration: none;color: #343a40!important;'><?php echo $row['title']?></a>
                        </td>
                        <td class='t_text'>
                            <?php echo $row['name']?>
                        </td>
                        <td class='t_text'>
                            <?php echo $row['wdate']?>
                        </td>
                    </tr>
                    <?php
                        }
                    } else {
                    $sql = "SELECT * FROM board order by id desc limit $no, $page_list_size";
                    $mysqli->query("SET NAMES utf8");
                    $result = $mysqli->query($sql);
                    while($row = $result->fetch_assoc()) {
                    ?>
                    <tr>
                        <th scope="row">
                            <?php echo $row['id']?>
                        </th>
                        <td class='t_text t_one'>
                            <a href='<?php echo "./read.php?idx=".$row['id']; ?>' style='text-decoration: none;color: #343a40!important;'><?php echo $row['title']?></a>
                        </td>
                        <td class='t_text'>
                            <?php echo $row['name']?>
                        </td>
                        <td class='t_text'>
                            <?php echo $row['wdate']?>
                        </td>
                    </tr>
                    <?php }} ?>
                </tbody>
            </table>
            <button type="button" class="btn btn-outline-secondary write" onclick="location.href='./write.php'">글쓰기</button>
            <nav class='number' aria-label="Page navigation">
                <ul class="pagination justify-content-center">
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                            <span class="sr-only">Previous</span>
                        </a>
                    </li>
                    <?php
                    $list = 3;
                    $block = 10;
                    if($_GET['search']) {
                        $search = $_GET['search'];
                        $sql = "SELECT ceil((SELECT count(*) from board where title like '%$search%') / 10)";
                        $result = $mysqli->query($sql);
                        $page_list_count = mysqli_fetch_array($result, MYSQLI_NUM);
                        $page = ($_GET['idx'])?$_GET['idx']:1;
                        $nowBlock = ceil($page/$block);
                        $s_page = ($nowBlock * $block) - ($block - 1);
                        if($s_page <= 1) {
                        $s_page = 1;
                        }
                        for ($p=$s_page; $p<=$page_list_count[0]; $p++) {
                        ?>
                        <li class="page-item <?php if($page == $p ) echo "active" ?>"><a class="page-link" href="?idx=<?=$p."&search=".$search?>"><?=$p?></a></li>
                        <?php
                        }
                    } else {
                    $sql = "SELECT ceil((SELECT count(*) from board) / 10)";
                    $result = $mysqli->query($sql);
                    $page_list_count = mysqli_fetch_array($result, MYSQLI_NUM);
                    $page = ($_GET['idx'])?$_GET['idx']:1;
                    $nowBlock = ceil($page/$block);

                    $s_page = ($nowBlock * $block) - ($block - 1);
                    if($s_page <= 1) {
                        $s_page = 1;
                    }

                    for ($p=$s_page; $p<=$page_list_count[0]; $p++) {
                    ?>
                    <li class="page-item <?php if($page == $p ) echo "active" ?>"><a class="page-link" href="?idx=<?=$p?>"><?=$p?></a></li>
                    <?php
                    }}
                    ?>
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                            <span class="sr-only">Next</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
        <script type='text/javascript' src='public/javascript/bootstrap.js'></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
            crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
            crossorigin="anonymous"></script>
    </div>
</body>

</html>