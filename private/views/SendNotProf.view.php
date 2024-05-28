<?php 
        include "includes/nav.prof.view.php";
        include "includes/header.view.php";
    ?>
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
.drop-zone {
    border: 2px dashed #ced4da;
    border-radius: 5px;
    padding: 30px;
    text-align: center;
    cursor: pointer;
    transition: background-color 0.3s;
}
.drop-zone.dragover {
    background-color: #e9ecef;
}
.drop-zone input[type="file"] {
    display: none;
}
</style>

</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
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
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
