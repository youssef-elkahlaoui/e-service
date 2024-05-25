<?php 
    require("includes/header.view.php")
?>
<body>
    <?php
        require("includes/nav.etu.view.php")
    ?>
    
    <section style="background-color: #eee; ">
        <div class="container py-5" >
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
<<<<<<< HEAD
    <tr>
        <th>Modules</th>
        <th>Professeur</th>
        <th>Email du professeur</th>
        <th>Description</th>
        <th>Documentation</th>
    </tr>
    <?php 
        foreach ($modulesWithTeacherNames as $moduleWithTeacher) {
            $module = $moduleWithTeacher['module'];
            $teacher = $moduleWithTeacher['teacher'];
            
            echo '<tr>';
            echo '<td>' . htmlspecialchars($module->Titre) . '</td>';
            echo '<td>' . htmlspecialchars($teacher->firstname) . ' ' . htmlspecialchars($teacher->lastname) . '</td>';
            echo '<td>' . htmlspecialchars($teacher->email) . '</td>';
            echo '<td>' . htmlspecialchars($module->Description) . '</td>';
            echo '<td><a href="documentation.php?id=' . urlencode($module->IdCours) . '">Voir</a></td>';
            echo '</tr>';
        }
    ?>
</table>

=======
                <tr>
                    <th>Modules</th>
                    <th>Professeur</th>
                    <th>Documant</th>
                </tr>
                <tr>
                    <td>Alfreds Futterkiste</td>
                    <td>Maria Anders</td>
                    <td><a href="documentation">Voir</a></td>
                </tr>
                <tr>
                    <td>Centro comercial Moctezuma</td>
                    <td>Francisco Chang</td>
                    <td><a href="documentation">Voir</a></td>
                </tr>
            </table>
>>>>>>> anas

                
            </div>
            
        </div>
    </section>
    

</body>
</html>