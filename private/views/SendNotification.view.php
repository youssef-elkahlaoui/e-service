<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <title>Send Notification</title>
</head>
<body>
    <form action="notification/sendNot" method="post">
    <div class="container" style="padding:100px">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="notification">Notification:</label>
                    <textarea class="form-control" name="notification" placeholder="Write your notification" id="notification" rows="3" required></textarea>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="selectOption">Select Option:</label>
                        <select class="form-control" id="selectOption" placeholder="Choose an option" name="selectedoption">
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
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 text-center">
                <button type="submit" class="btn btn-outline-primary" name="notif">SEND</button>
            </div>
        </div>
    </div>
    </form>
</body>
</html>
