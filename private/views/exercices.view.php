<?php 
    include "includes/header.view.php";
    include "includes/nav.prof.view.php";
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
</style>

<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="form-container">
                        <form action="CoursExercices/uploadExercice" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label class="form-label" for="titre">Titre de l'exercice :</label>
                                <input type="text" id="titre" name="titre" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="description">Description de l'exercice :</label>
                                <textarea id="description" name="description" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="selectedoption">Choisir la classe :</label>
                                <select class="form-control" id="selectedoption" name="selectedoption" required>
                                    <option value="" disabled selected hidden>Choose an option</option>
                                    <option value="TDIA1">TDIA1</option>
                                    <option value="GI1">GI1</option>
                                    <option value="ID1">ID1</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="pdf">Télécharger un exercice (PDF) :</label>
                                <input type="file" id="pdf" name="pdf" class="form-control" accept=".pdf" required>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-outline-primary" name="upload">Télécharger</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>