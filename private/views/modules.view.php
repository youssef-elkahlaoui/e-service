<?php 
    include "includes/nav.view.php";
    include "includes/header.view.php";
?>
<body>
    <section style="background-color: #eee;">
        <div class="container py-5">
            <div class="row">
                <div class="col">
                    <nav aria-label="breadcrumb" class="bg-body-tertiary rounded-3 p-3 mb-4">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="<?= ROOT ?>">Accuile</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Modules</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="p-5 text-center bg-body-tertiary">
                <h1 class="mb-3">Vos Modules</h1>
            </div>
            
            <table class="table table-hover">
                <tr>
                    <th>Modules</th>
                    <th>Professeur</th>
                    <th>Email du professeur</th>
                    <th>Description</th>
                    <th>Documents</th>
                </tr>
                <?php 
                    foreach ($modulesWithTeacherNames as $moduleWithTeacher) {
                        $module = $moduleWithTeacher['module'];
                        $teacher = $moduleWithTeacher['teacher'];
                        
                        echo '<tr>';
                        echo '<td>' . htmlspecialchars($module->Titre) . '</td>';
                        
                        // Check if teacher data is available
                        if ($teacher) {
                            echo '<td>' . htmlspecialchars($teacher->firstname) . ' ' . htmlspecialchars($teacher->lastname) . '</td>';
                            echo '<td>' . htmlspecialchars($teacher->email) . '</td>';
                        } else {
                            echo '<td>N/A</td>';
                            echo '<td>N/A</td>';
                        }
                        
                        echo '<td>' . htmlspecialchars($module->Description) . '</td>';
                        echo '<td><a href="'.ROOT.'/CoursExercices/displayDoc/'.$_SESSION['NIVEAU']->IdClasse.'/'.$module->IdCours.'?module_title='.urlencode($module->Titre).'">Voir</a></td>';
                        echo '</tr>';
                    }
                ?>
            </table>
        </div>
    </section>
</body>
</html>
