<?php 
    include "includes/nav.prof.view.php";
    include "includes/header.view.php";
    // Assuming you have a function to fetch archived courses and files
    $archivedFiles = Auth::getArchivedFiles();
?>

<section style="background-color: #eee;">
    <div class="container py-5">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb" class="bg-body-tertiary rounded-3 p-3 mb-4">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="<?= ROOT ?>">Accueil</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Archivage des Cours et Fichiers</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="p-5 text-center bg-body-tertiary">
            <h1 class="mb-3">Archivage des Cours et Fichiers</h1>
        </div>
        <table class="table table-hover">
            <tr>
                <th>Nom du cours</th>
                <th>Fichier</th>
                <th>Date d'archivage</th>
            </tr>
            <?php 
                foreach ($archivedFiles as $file) {
                    echo "<tr>";
                    echo "<td>{$file['courseName']}</td>";
                    echo "<td><a href='{$file['filePath']}'>Télécharger</a></td>";
                    echo "<td>{$file['archiveDate']}</td>";
                    echo "</tr>";
                }
            ?>
        </table>
    </div>
</section>

</body>
</html>
