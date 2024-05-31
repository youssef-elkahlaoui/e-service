<?php 
    include "includes/header.view.php";
    ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>e-Serv Login</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
            background: #ececec;
        }

        .box-area {
            width: 930px;
        }

        .right-box {
            padding: 40px 30px 40px 40px;
        }

        ::placeholder {
            font-size: 16px;
        }

        .rounded-4 {
            border-radius: 20px;
        }

        .rounded-5 {
            border-radius: 30px;
        }

        @media only screen and (max-width: 768px) {
            .box-area {
                margin: 0 10px;
            }

            .right-box {
                padding: 20px;
            }
        }

        .input-group-text {
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="row border rounded-5 p-3 bg-white shadow box-area">
            <div class="col-md-5 rounded-4 d-flex justify-content-center align-items-center flex-column left-box" style="background: #103cbe;">
                <div class="featured-image mb-3">
                    <img src="<?= ROOT?>/mdb/img/logo.png" class="img-fluid" style="width: 150px;">
                </div>
                <p class="text-white fs-2" style="font-family: 'Courier New', Courier, monospace; font-weight: 600;">e-Service</p>
                <small class="text-white text-wrap text-center" style="width: 17rem;font-family: 'Courier New', Courier, monospace;">The École Nationale des Sciences Appliquées d'Al Hoceima is a Moroccan public engineering school located in Al Hoceima.</small>
            </div>
            <div class="col-md-6 right-box">
                <div class="row align-items-center">
                    <div class="header-text mb-4">
                        <h2>Hello, Again</h2>
                        <p>Nous sommes heureux de vous revoir.</p>
                    </div>

                    <?php if(count($errors) > 0):?>
                        <div class="alert alert-warning alert-dismissible fade show p-1" role="alert">
                            <strong>Errors:</strong>
                            <?php foreach($errors as $error):?>
                                <br><?=$error?>
                            <?php endforeach;?>
                            <span type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </span>
                        </div>
                    <?php endif;?>

                    <form method="post">
                        <div class="input-group mb-3">
                            <input type="text" value="<?=get_var('email')?>" class="form-control form-control-lg bg-light fs-6" name="email" autofocus placeholder="Email address">
                        </div>

                        <div class="input-group mb-1">
                            <input type="password" id="password" value="<?=get_var('password')?>" class="form-control form-control-lg bg-light fs-6" name="password" placeholder="Password">
                            <span class="input-group-text" id="togglePassword">
                                <i class="fas fa-eye"></i>
                            </span>
                        </div>

                        <div class="input-group mb-5 d-flex justify-content-between">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="rememberMe" name="rememberMe">
                                <label for="rememberMe" class="form-check-label text-secondary"><small>Se rappeler de moi</small></label>
                            </div>
                        </div>

                        <div class="input-group mb-3">
                            <button type="submit" class="btn btn-lg btn-primary w-100 fs-6">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('togglePassword').addEventListener('click', function () {
            const passwordInput = document.getElementById('password');
            const icon = this.querySelector('i');
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        });
    </script>
</body>
</html>