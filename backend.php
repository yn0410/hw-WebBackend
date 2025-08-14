<?php include_once "./api/db.php";?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Koko後台</title>
    <!-- 載入bs5 css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.7/css/bootstrap.min.css"
        integrity="sha512-fw7f+TcMjTb7bpbLJZlP8g2Y4XcCyFZW8uy8HsRZsH/SwbMw0plKHFHr99DN3l04VsYNwvzicUX/6qurvIxbxw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- 載入font-awesome css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Custom styles for this template -->
    <link href="./css/dashboard.css" rel="stylesheet">
</head>

<body>
    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">後臺管理</a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <span class="form-control bg-dark w-100"></span>
        <div class="navbar-nav">
            <div class="nav-item text-nowrap">
                <?php
                if(isset($_SESSION['login'])){
                    echo "<span class='text-white'> 哈囉 ";
                    echo $_SESSION['login'];
                    echo " ~ </span>";
                    echo "<a type='button' class='btn btn-outline-info me-2' href='./index.php'>回前台</a>";
                    echo "<a type='button' class='btn btn-warning me-2' href='./api/logout.php'>登出</a>";
                }else{
                    echo "<button type='button' class='btn btn-outline-warning me-2' data-bs-toggle='modal' data-bs-target='#myModal-login'>登入</button>";
                }
                ?>
            </div>
        </div>
    </header>

    <!-- The Modal (login) -->
    <div class="modal fade" id="myModal-login">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h2 class="modal-title">管理者登入</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <form action="./api/login.php" method="post">
                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="mb-3 mt-3">
                            <label for="acc">帳號:</label>
                            <input type="text" class="form-control" name="acc">
                        </div>
                        <div class="mb-3">
                            <label for="pw">密碼:</label>
                            <input type="password" class="form-control" name="pw">
                        </div>
                    </div>
                    
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">登入</button>
                        <button type="button" class="btn btn-warning" data-bs-dismiss="modal">關閉</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="position-sticky pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="?do=banner">
                                Banner管理
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="?do=about">
                                About管理
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="?do=menu">
                                菜單管理
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="?do=admin">
                                帳號管理
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="?do=footer">
                                Footer管理
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                
                    <?php 
                    $do = $_GET['do'];
                    $file = "./backend/${do}.php";
                    if(isset($_SESSION['login'])){
                        if (file_exists($file)) {
                            include $file;
                        }else{
                            include "./backend/banner.php";
                        }
                    }else{
                        echo "<h1>請先登入</h1>";
                    }
                    ?>

            </main>
        </div>
    </div>

    <!-- 載入bs5 bundle js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.7/js/bootstrap.bundle.min.js"
        integrity="sha512-Tc0i+vRogmX4NN7tuLbQfBxa8JkfUSAxSFVzmU31nVdHyiHElPPy2cWfFacmCJKw0VqovrzKhdd2TSTMdAxp2g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- 載入jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer">
        </script>

    <script>
        $(document).ready(function () {
            // jQuery methods go here...
        });
    </script>
</body>

</html>