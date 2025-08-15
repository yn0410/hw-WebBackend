<?php include_once "./api/db.php";?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Koko</title>
    <!-- 載入bs5 css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.7/css/bootstrap.min.css"
        integrity="sha512-fw7f+TcMjTb7bpbLJZlP8g2Y4XcCyFZW8uy8HsRZsH/SwbMw0plKHFHr99DN3l04VsYNwvzicUX/6qurvIxbxw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- 載入font-awesome css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            background: linear-gradient(to bottom, #70e1f5, #ffd194);
            font-family: 'Segoe UI', sans-serif;
            transition: background 0.5s ease;
        }

        .bd {
            border: 1px solid rgba(0, 0, 0, 0.1);
            border-radius: 15px;
            padding: 20px;
            transition: all 0.3s ease;
        }
        .bd:hover {
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.25);
            transform: translateY(-3px);
        }

        .card {
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.25);
        }
        .card-img-top {
            transition: transform 0.3s ease;
        }
        .card:hover{
            transform: scale(1.05);
        }

        .btn {
            transition: all 0.3s ease;
        }
        .btn:hover {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
            transform: translateY(-2px);
        }

        .comment {
            border: 1px solid rgba(0, 0, 0, 0.1);
            border-radius: 15px;
            padding: 20px;
            background-color: #eee;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .comment:hover {
            transform: translateY(-4px);
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.2);
        }

        #carouselBtnHover {
            transition: all 0.3s ease;
        }
        #carouselBtnHover:hover {
            border-radius: 50%;
            border: 1px solid #fff;
            background-color: rgba(255, 255, 255, 0.3);
        }

        .carousel-inner img {
            transition: opacity 0.5s ease-in-out;
        }
        .carousel-item.active img {
            opacity: 1;
        }
        .carousel-item img {
            opacity: 0.85;
        }
        .carousel-item:hover img {
            opacity: 1;
        }

        footer .btn {
            border-color: #333;
            color: #333;
        }
        footer .btn:hover {
            background-color: #333;
            color: #fff;
            transform: scale(1.1);
        }

        #aboutUs{
            height: 450px;
        }

    </style>
</head>

<body>
    <!-- NavBar -->
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <div class="container-fluid">
            <!-- logo -->
            <a class="navbar-brand" href="">
                <!-- front awesome -->
                <i class="fa-solid fa-crown fa-rotate-by" style="color: #FFD43B; --fa-rotate-angle: 315deg;"></i>
                Koko
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mynavbar">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#aboutUs">關於我們</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#menu">菜單</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#box4">評價</a>
                    </li>
                </ul>
                <div class="text-end">
                    <?php
                    if(isset($_SESSION['login'])){
                        echo "<span class='text-white'> 哈囉 ";
                        echo $_SESSION['login'];
                        echo " ~</span>";
                        echo "<a type='button' class='btn btn-outline-info me-2' href='./backend.php?do=banner'>回後台</a>";
                    }else{
                        echo "<button type='button' class='btn btn-outline-warning me-2' data-bs-toggle='modal' data-bs-target='#myModal-login'>登入</button>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </nav>
    <!-- NavBar end -->
    
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

    <!-- container1：banner -->
    <!-- Carousel -->
    <div id="demo" class="carousel slide bg-dark" data-bs-ride="carousel" data-bs-interval="4000">

        <!-- Indicators/dots -->
        <div class="carousel-indicators">
            <?php
            $banners=$Banner->all(['sh'=>1]);
            // dd($banners);
            foreach($banners as $key => $value): 
                $active=($key==0)?'active':'';
            ?>
                <button type="button" data-bs-target="#demo" data-bs-slide-to="<?=$key;?>" class="<?=$active;?>"></button>
            <?php
            endforeach;
            ?>
        </div>

        <!-- The slideshow/carousel -->
        <div class="carousel-inner">
            <?php
            foreach($banners as $key => $value):
                $active=($key==0)?'active':'';
            ?>
                <div class="carousel-item <?=$active;?>">
                    <img src="./image/<?=$value['img'];?>" alt="<?=$value['alt'];?>" class="d-block" style="width:80%; margin: auto;">
                </div>
            <?php
            endforeach;
            ?>
        </div>

        <!-- Left and right controls/icons -->
        <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" id="carouselBtnHover"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
            <span class="carousel-control-next-icon" id="carouselBtnHover"></span>
        </button>
    </div>
    <!-- Carousel end -->
    <!-- container1 end -->

    <!-- container2：About -->
    <?php $about=$About->find(['sh'=>1]);?>
    <div class="container mt-5 bd box2" id="aboutUs">
        <div class="row">
            <div class="col text-center">
                <h2>關於我們</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-sm-6">
                <h3><?=$about['text'];?></h3>
                <a href="about.html">About</a>
            </div>
            <div class="col-12 col-sm-6 text-end">
                <img src="./image/<?=$about['img'];?>" style="height: 35%;">
            </div>
        </div>
    </div>
    <!-- container2 end -->

    <!-- container3：Drinks -->
    <div class="container mt-5 box3 bd" id="menu">
        <div class="row">
            <div class="col text-center">
                <h2>菜單</h2>
            </div>
        </div>
        <div class="row">
            <?php 
            $menu=$Menu->all(['sh'=>1]);
            foreach($menu as $key => $value):
            ?>
                <div class="col-4 mt-3">
                    <div class="card">
                        <img class="card-img-top" src="./image/<?=$value['img'];?>" alt="Card image" style="width:100%">
                        <div class="card-body">
                            <h4 class="card-title"><?=$value['name'];?></h4>
                            <p class="card-text"><?=$value['description'];?></p>
                            <a href="https://order.nidin.shop/menu/21975" target="_blank" class="btn btn-primary">$<?=$value['price'];?></a>
                        </div>
                    </div>
                </div>

            <?php
            endforeach;
            ?>
        </div>

    </div>
    <!-- container3 end -->


    <!-- container4 ： 評價 -->
    <div class="container mt-5 box4 bd" id="box4">
        <div class="row">
            <div class="col text-center">
                <h2>評價</h2>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="comment">
                    <h5>小明</h5>
                    <p>
                        <i class="fa-solid fa-star" style="color: yellow;"></i>
                        <i class="fa-solid fa-star" style="color: yellow;"></i>
                        <i class="fa-solid fa-star" style="color: yellow;"></i>
                        <i class="fa-solid fa-star" style="color: yellow;"></i>
                        <i class="fa-solid fa-star" style="color: yellow;"></i>
                    </p>
                    <p>「鮮芋雪冰，好喝」</p>
                </div>
            </div>
            <div class="col">
                <div class="comment">
                    <h5>小美</h5>
                    <p>
                        <i class="fa-solid fa-star" style="color: yellow;"></i>
                        <i class="fa-solid fa-star" style="color: yellow;"></i>
                        <i class="fa-solid fa-star" style="color: yellow;"></i>
                        <i class="fa-solid fa-star" style="color: yellow;"></i>
                        <i class="fa-solid fa-star" style="color: yellow;"></i>
                    </p>
                    <p>「芒果冰沙，好喝!」</p>
                </div>
            </div>
            <div class="col">
                <div class="comment">
                    <h5>小王</h5>
                    <p>
                        <i class="fa-solid fa-star" style="color: yellow;"></i>
                        <i class="fa-solid fa-star" style="color: yellow;"></i>
                        <i class="fa-solid fa-star" style="color: yellow;"></i>
                        <i class="fa-solid fa-star" style="color: yellow;"></i>
                    </p>
                    <p>「葡萄柚果粒茶，好喝!!」</p>
                </div>
            </div>
        </div>
    </div>
    <!-- container4 end -->


    <!-- footer -->
    <footer class="bg-light mt-5">
        <div class="container p-4">
            <div class="row">
                <div class="col text-center">
                    <!-- Section: Social Media -->
                    <!-- Facebook -->
                    <a class="btn btn-outline-dark rounded-circle m-1" href="#!" role="button"><i
                            class="fab fa-facebook-f"></i></a>

                    <!-- Twitter -->
                    <a class="btn btn-outline-dark rounded-circle m-1" href="#!" role="button"><i
                            class="fab fa-twitter"></i></a>

                    <!-- Google -->
                    <a class="btn btn-outline-dark rounded-circle m-1" href="#!" role="button"><i
                            class="fab fa-google"></i></a>

                    <!-- Instagram -->
                    <a class="btn btn-outline-dark rounded-circle m-1" href="#!" role="button"><i
                            class="fab fa-instagram"></i></a>

                    <!-- Linkedin -->
                    <a class="btn btn-outline-dark rounded-circle m-1" href="#!" role="button"><i
                            class="fab fa-linkedin-in"></i></a>

                    <!-- Github -->
                    <a class="btn btn-outline-dark rounded-circle m-1" href="#!" role="button"><i
                            class="fab fa-github"></i></a>

                    <!--End of Section: Social media -->
                </div>
            </div>
            <div class="row mt-2">
                <div class="col">
                    <p class="text-center text-muted mb-0">
                        <?php
                        echo $Footer->find(1)['text'];
                        ?>
                    </p>

                </div>
            </div>
        </div>
    </footer>
    <!-- footer end -->




    <!-- 載入bs5 bundle js (有bundle才是完整版) -->
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

        });
    </script>
</body>

</html>