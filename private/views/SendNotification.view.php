
<?php 
    include "includes/nav.admin.view.php";
    include "includes/header.view.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <title>Send Notification</title>
</head>
<style>
    .container{
        padding-top: 50px;
    }
    
        
</style>
<body>
    <div class="row">
        <div class="col">
            <nav aria-label="breadcrumb" class="bg-body-tertiary rounded-3 p-3 mb-4">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="<?= ROOT ?>">Accueil</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Envoyer Notification...</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="p-5 text-center bg-body-tertiary">
        <h1 class="mb-3">Envoyer Notification...</h1>
    </div>
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <form action="notification/sendNot" method="post">
                <div class="form-group mb-3">
                    <label for="courseName">Notification:</label>
                    <textarea class="form-control" name="notification" id="notification" rows="3" placeholder="Write your notification" required></textarea>
                </div>
                <div class="form-group mb-3">
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
                <button type="submit" class="btn btn-outline-primary" name="notif">SEND</button>
                    
            </form>
            
        </div>
    </div>
</body>


</html>

