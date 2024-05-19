<?php 
    include "includes/header.view.php";

    include "includes/nav.admin.view.php";
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

    .containeer{

    }



        
</style>
<body>

    <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card mb-4">
                        <div class="card-body">
                            <form action="notification/sendNot" method="post">
                                <div class="form-group">
                                    <label for="notification">Notification:</label>
                                    <textarea class="form-control" name="notification" id="notification" rows="3" placeholder="Write your notification" required></textarea>
                                </div>
                                <div class="form-group">
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
                </div>
            </div>
        </div>

    <div class="containeer">
        <a href="notification_list.php">Liste des notifications?</a>
    </div>
   
</body>


</html>
