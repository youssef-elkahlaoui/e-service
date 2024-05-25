<?php 
    include "includes/nav.view.php";
    include "includes/header.view.php";
?>

    <section style="background-color: #eee; ">
        <div class="container py-5" >
            <div class="row">
                <div class="col">
                    <nav aria-label="breadcrumb" class="bg-body-tertiary rounded-3 p-3 mb-4">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="<?= ROOT ?>">Accuile</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Absences</li>
                    </ol>
                    </nav>
                </div>
            </div>
            <div class="p-5 text-center bg-body-tertiary">
                <h1 class="mb-3">Vos absences</h1>
                <h5 class="mb-3">Nombre totales est:<?=count($data)?></h5>
            </div>
            
            <table class="table table-hover">
                <tr>
                    <th>Modules</th>
                    <th>Date</th>
                    <th>Justifiée</th>
                </tr>
                <?php 
                    
                    foreach ($data as $row) {
                        echo "<tr>";
                        echo "<td>{$row->ModuleName}</td>";
                        echo "<td>{$row->DateAbsence}</td>";
                        // Si la justification est 0, afficher "non", sinon afficher "oui"
                        $justification = $row->Justifiée == 0 ? "non" : "oui";
                        echo "<td>$justification</td>";
                        echo "</tr>";
                    }
                    
                ?>
            </table>
                
        </div>
    </section>

</body>
</html>