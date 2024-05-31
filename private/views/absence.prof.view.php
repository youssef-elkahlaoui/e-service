<?php require("includes/header.view.php"); ?>
<?php require("includes/nav.prof.view.php"); 

if (isset($data) && isset($data['modules'])) {
    $modules = $data['modules'];
} else {
    $modules = [];
}

?>

<style>
        .container {
            padding-top: 50px;
        }
        .card {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); 
        }
        .crd-body {
            border: 1px solid #ced4da;
            border-radius: 10px;
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
        .bg-body-tertiary {
            background-color: #f8f9fa ;
        }
        .clr{
            background-color: #f8f9fa;
        }
        .rounded-3 {
            border-radius: 0.3rem !important;
        }
        .p-3 {
            padding: 1rem !important;
        }
        .mb-4, .my-4 {
            margin-bottom: 1.5rem !important;
        }
        .breadcrumb-item a {
            color: #007bff;
            text-decoration: none;
        }
        .profile-icon {
            width: 30px;
            height: 30px;
            margin-right: 10px;
            border-radius: 50%;
        }
</style>
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="row bg-white">
                <div class="col">
                    <nav aria-label="breadcrumb" class="bg-body-tertiary rounded-3 p-3 mb-4 shadow">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="<?= ROOT ?>">Accueil</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Les absences</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-body shadow rounded-3">
                    <div class="p-5 text-center clr crd-body">
                        <h1 class="mb-3">Les Absences</h1>
                    </div>
                    <form action="insert_absence.php" method="post">
            <div class="mb-3">
                <label for="studentId" class="form-label">Student ID</label>
                <input type="number" class="form-control" id="studentId" name="studentId" required>
            </div>
            <div class="mb-3">
                <label for="courseId" class="form-label">Course ID</label>
                <input type="number" class="form-control" id="courseId" name="courseId" required>
            </div>
            <div class="mb-3">
                <label for="dateAbsence" class="form-label">Date of Absence</label>
                <input type="date" class="form-control" id="dateAbsence" name="dateAbsence" required>
            </div>
            <div class="mb-3">
                <label for="justified" class="form-label">Justified</label>
                <select class="form-control" id="justified" name="justified" required>
                    <option value="0">No</option>
                    <option value="1">Yes</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Insert Absence</button>
        </form>
                </div>
            </div> 
        </div>
    </div>
</div>
</body>
<script>
    function zoomProfileIcon(element) {
        element.style.transform = "scale(7)";
        element.style.transition = "transform 1s";
        setTimeout(function(){
            element.style.transform = "scale(1)";
        }, 1000);
    }
</script>
</html>
</body>
</html>