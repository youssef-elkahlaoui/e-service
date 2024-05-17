<?php 
    include "includes/nav.view.php";
    include "includes/header.view.php";
?>
<body>
    
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
                <tr>
                    <th>Modules</th>
                    <th>Professeur</th>
                    <th>Description</th>
                    <th>Documantation</th>
                </tr>
                <?php 
                    foreach ($data as $key => $value) {
                        echo '<tr>';
                        echo '<td>' . htmlspecialchars($value->IdCours) . '</td>';
                        echo '<td>' . htmlspecialchars($value->Titre) . '</td>';
                        echo '<td>' . htmlspecialchars($value->Description) . '</td>';
                        echo '<td><a href="documentation.php?id=' . urlencode($value->IdCours) . '">Voir</a></td>';
                        echo '</tr>';
                    }
                ?>
            </table>

                
            </div>
            
        </div>
    </section>
    

</body>
</html>