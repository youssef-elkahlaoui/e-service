<?php $this->view('includes/header')?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<link rel="stylesheet" href="style.css">
<title>e-Serv Login </title>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap');

    body{
        font-family: 'Poppins', sans-serif;
        background: #ececec;
    }


    .box-area{
        width: 930px;
    }


    .right-box{
        padding: 40px 30px 40px 40px;
    }


    ::placeholder{
        font-size: 16px;
    }

    .rounded-4{
        border-radius: 20px;
    }
    .rounded-5{
        border-radius: 30px;
    }



    @media only screen and (max-width: 768px){

        .box-area{
            margin: 0 10px;

        }
        .right-box{
            padding: 20px;
        }

    }
</style>
</head>
<form method="post">
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="row border rounded-5 p-3 bg-white shadow box-area">
            <div class="col-md-5 rounded-4 d-flex justify-content-center align-items-center flex-column left-box" style="background: #103cbe;">
                <div class="featured-image mb-3">
                    <img src="<?=ROOT?>/assets/e.png" class="img-fluid" style="width: 150px;">
                </div>
                <p class="text-white fs-2" style="font-family: 'Courier New', Courier, monospace; font-weight: 600;">e-Service</p>
                <small class="text-white text-wrap text-center" style="width: 17rem;font-family: 'Courier New', Courier, monospace;">The École Nationale des Sciences Appliquées d'Al Hoceima is a Moroccan public engineering school located in Al Hoceima, Al Hoceïma Province.</small>
            </div>
            <div class="col-md-6 right-box">
                <div class="row align-items-center">
                    <div class="header-text mb-4">
                        <h2>Hello,Again</h2>
                        <p>We are happy to have you back.</p>
                    </div>

                    <?php if(count($errors) > 0):?>
                        <div class="alert alert-warning alert-dismissible fade show p-1" role="alert">
                            <strong>Errors:</strong>
                            <?php foreach($errors as $error):?>
                                <br><?=$error?>
                            <?php endforeach;?>
                            <span  type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </span>
                        </div>
                    <?php endif;?>

                    <div class="input-group mb-3">
                        <input type="text" value="<?=get_var('email')?>" class="form-control form-control-lg bg-light fs-6" name="email" autofocus autocomplete="off" placeholder="Email address">
                    </div>

                    <div class="input-group mb-1">
                        <input type="password" value="<?=get_var('email')?>" class="form-control form-control-lg bg-light fs-6" name="password" placeholder="Password">
                    </div>

                    <div class="input-group mb-5 d-flex justify-content-between">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="rememberMe" name="rememberMe">
                            <label for="rememberMe" class="form-check-label text-secondary"><small>Remember Me</small></label>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <button class="btn btn-lg btn-primary w-100 fs-6">Login</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<?php $this->view('includes/footer')?>
