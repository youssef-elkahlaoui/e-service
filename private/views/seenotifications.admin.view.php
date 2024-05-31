<?php 
    include "includes/nav.admin.view.php";
    include "includes/header.view.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<style>
    .container {
        padding-top: 50px;
    }
</style>

<body>
    <div class="container">
        <div class="card">
            <div class="card-header bg-body-tertiary">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="<?= ROOT ?>">Accueil</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Notifications...</li>
                    </ol>
                </nav>
            </div>
            <div class="card-body">
                <?php if (!empty($result)): ?>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Nom Filiere</th> 
                                    <th scope="col">Message</th>
                                    <th scope="col">Date de notification</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($result as $key => $nt): ?>
                                    <tr>
                                        <td><?php echo htmlspecialchars($nt->IdNotification); ?></td>
                                        <td><?php echo htmlspecialchars($nt->NomFiliere); ?></td> <!-- Changed data value -->
                                        <td><?php echo htmlspecialchars($nt->Message); ?></td>
                                        <td><?php echo htmlspecialchars($nt->DateNotification); ?></td>
                                        <td><?php echo $nt->Archive ? "archivé" : "non archivé"; ?></td>
                                        <td>
                                            <form action="<?= ROOT ?>/archiveNotif/archive" method="post">
                                                <input type="hidden" name="archive" value="<?php echo $nt->IdNotification ?>">
                                                <button type="submit" class="btn btn-outline-success btn-sm"> Archivé </button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php else: ?>
                    <p class="text-center">Aucune notification trouvée.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
