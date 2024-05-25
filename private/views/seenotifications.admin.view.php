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
    <title>Notification</title>
</head>
<style>
    .container {
        padding-top: 50px;
    }
</style>

<body>
    <div class="row">
        <div class="col">
            <nav aria-label="breadcrumb" class="bg-body-tertiary rounded-3 p-3 mb-4">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="<?= ROOT ?>">Accueil</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Notifications...</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="container">
        <?php if (!empty($allnotifications)): ?>
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Filiere</th>
                            <th scope="col">Message</th>
                            <th scope="col">Date de notification</th>
                            <th scope="col">Status</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($allnotifications as $key => $nt): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($nt['IdNotification']); ?></td>
                                <td><?php echo htmlspecialchars($nt['Filiere']); ?></td>
                                <td><?php echo htmlspecialchars($nt['Message']); ?></td>
                                <td><?php echo htmlspecialchars($nt['DateNotification']); ?></td>
                                <td><?php echo $nt['Archivé'] ? "archivé" : "non archivé"; ?></td>
                                <td>
                                    <form action="archiveNotif/archive" method="post">
                                        <input type="hidden" name="archive" value="<?php echo $nt['IdNotification'] ?>">
                                        <button type="submit" class="btn btn-outline-success btn-sm"> Archivé </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>

                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <p class="text-center">Aucune notification trouvée.</p>
        <?php endif; ?>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>