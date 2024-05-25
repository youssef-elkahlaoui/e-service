<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .container {
            padding-top: 25px;
        }
        .breadcrumb {
            background-color: #f8f9fa;
        }
        .hero-section {
            background-color: #f8f9fa;
            padding: 30px 20px;
            border-radius: 15px;
            margin-bottom: 20px;
        }
        .form-container {
            background-color: white;
            padding: 40px 20px;
            border-radius: 15px;
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
    <?php 
        include "includes/nav.admin.view.php";
        include "includes/header.view.php";
    ?>
    <div class="container">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb" class="bg-body-tertiary rounded-3 p-3 mb-4 shadow-sm">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="<?= ROOT ?>">Accueil</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Envoyer Notification...</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="hero-section text-center shadow">
                    <h1 class="mb-3" style="color: #3485c5;">Envoyer Notification...</h1>
                </div>

                <div class="form-container shadow-sm">
                    <form action="<?= ROOT ?>/notification/sendNot" method="post">
                        <div class="form-group mb-4">
                            <label for="notification">Notification:</label>
                            <textarea class="form-control" name="notification" id="notification" rows="4" placeholder="Write your notification" required></textarea>
                        </div>
                        <div class="form-group mb-4">
                            <label for="selectOption">Select Option:</label>
                            <select class="form-control" id="selectOption" name="selectedoption" required>
                                <option value="" disabled selected hidden>Choose an option</option>
                                <option value="CP1">CP1</option>
                                <option value="CP2">CP2</option>
                                <option value="TDIA1">TDIA1</option>
                                <option value="GI1">GI1</option>
                                <option value="ID1">ID1</option>
                                <option value="GM1">GM1</option>
                                <option value="ALL">ALL</option>
                            </select>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-outline-primary btn-lg" name="notif">SEND</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
