<?php include "includes/header.view.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>e-Serv Reset Password</title>
    <!-- Bootstrap CSS and Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Custom CSS -->
    <style>
        /* Your custom styles here */
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
    <?php if (!empty($message)): ?>
        <div class="card mb-4">
            <div class="card-body shadow rounded-3">
                <?= $message ?>
            </div>
        </div>
    <?php endif; ?>

    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="row border rounded-5 p-3 bg-white shadow box-area">
            <div class="col-md-5 rounded-4 d-flex justify-content-center align-items-center flex-column left-box" style="background: #103cbe;">
                <div class="featured-image">
                    <img src="<?= ROOT?>/mdb/img/logo.png" class="img-fluid" style="width: 150px;">
                </div>
                <p class="text-white fs-2" style="font-family: 'Courier New', Courier, monospace; font-weight: 600;">e-Service</p>
                <small class="text-white text-wrap text-center" style="width: 17rem;font-family: 'Courier New', Courier, monospace;">The École Nationale des Sciences Appliquées d'Al Hoceima is a Moroccan public engineering school located in Al Hoceima, Al Hoceïma Province.</small>
            </div>
            <div class="col-md-6 right-box">
                <div class="row align-items-center">
                    <h2 class="text-center m-5">Reset Your Password</h2>
                    <form method="post" action="<?=ROOT?>/reset_password/modifyPassword">
                        <input type="hidden" name="token" value="<?= htmlspecialchars($data['token']); ?>">
                        <div class="input-group ms-5">
                            <input type="password" id="password" value="<?= get_var('password') ?>" class="form-control form-control-lg bg-light fs-6" name="password" placeholder="New Password">
                            <span class="input-group-text" id="togglePassword">
                                <i class="fas fa-eye"></i>
                            </span>
                        </div>
                        <div class="input-group m-5">
                            <button type="submit" name="reset" class="btn btn-lg btn-primary w-100 fs-6">Update Your password</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap and custom script imports -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
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
