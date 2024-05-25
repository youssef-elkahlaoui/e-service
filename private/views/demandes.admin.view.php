<?php 
    include "includes/header.view.php";
    include "includes/nav.admin.view.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Liste des Demandes</title>
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
    <style>
        .liste {
            text-align: center;
            padding: 20px;
        }
    </style>
</head>
<body>
    <div class="liste">
        <h1>Liste des Demandes</h1>
    </div>
    <div class="container">
        <?php if (!empty($demandes)): ?>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Student ID</th>
                        <th scope="col">Type de Demande</th>
                        <th scope="col">Description</th>
                        <th scope="col">Date de Demande</th>
                        <th scope="col">Status</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($demandes as $key => $demande): ?>
                        <tr>
                            <th scope="row"><?php echo $key + 1; ?></th>
                            <td><?php echo htmlspecialchars($demande->student_id); ?></td>
                            <td><?php echo htmlspecialchars($demande->demand_type); ?></td>
                            <td><?php echo htmlspecialchars($demande->demand_description); ?></td>
                            <td><?php echo htmlspecialchars($demande->demand_date); ?></td>
                            <td><?php echo htmlspecialchars($demande->status); ?></td>
                            <td>
                                <form action="modifyDemand/modify" method="post">
                                    <input type="hidden" name="approuver" value="<?php echo htmlspecialchars($demande->id); ?>">
                                    <button type="submit" class="btn btn-outline-success btn-sm"> Approuver </button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p class="text-center">Aucune demande trouvée.</p>
        <?php endif; ?>
    </div>

</body>
</html>