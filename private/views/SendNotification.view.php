<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send Notification</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .container {
            padding-top: 50px;
        }
        .card {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); 
        }
        .form-container {
            background-color: #f8f9fa;
            border: 1px solid #ced4da;
            border-radius: 10px;
            padding: 30px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-label {
            font-weight: bold;
        }
        .form-control {
            width: 100%;
            padding: 10px;
            border: 1px solid #ced4da;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <?php include "includes/nav.admin.view.php"; ?>
    <?php include "includes/header.view.php"; ?>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="row">
                    <div class="col">
                        <nav aria-label="breadcrumb" class="bg-body-tertiary rounded-3 p-3 mb-4 shadow">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="<?= ROOT ?>">Accueil</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Envoyer Notification...</li>
                            </ol>
                        </nav>
                    </div>
                </div>

                <?php if (isset($message)): ?>
                <div class="card mb-4">
                    <div class="card-body shadow rounded-3">
                        <div class="alert alert-success" role="alert">
                            <?= $message ?>
                        </div>
                    </div>
                </div>
                <?php endif; ?>

                <?php if (isset($message1)): ?>
                <div class="card mb-4">
                    <div class="card-body shadow rounded-3">
                        <div class="alert alert-info" role="alert">
                            <?= $message1 ?>
                        </div>
                    </div>
                </div>
                <?php endif; ?>

                <div class="card mb-4">
                    <div class="card-body shadow rounded-3">
                        <div class="form-container">
                            <form action="<?= ROOT ?>/notification/sendNot" method="post">
                                <div class="form-group">
                                    <label class="form-label" for="notification">Notification:</label>
                                    <textarea class="form-control" name="notification" id="notification" rows="4" placeholder="Write your notification" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="selectOption">Select Option:</label>
                                    <select class="form-control" id="selectOption" name="selectedoption" required>
                                        <option value="" disabled selected hidden>Choose an option</option>
                                        <?php foreach ($data['classes'] as $class): ?>
                                            <option value="<?= $class->IdClasse ?>"><?= $class->NomClasse ?></option>
                                        <?php endforeach; ?>
                                        
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
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
