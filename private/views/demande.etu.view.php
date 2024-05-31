

    <?php include "includes/nav.view.php"; ?>
    <?php include "includes/header.view.php"; 
    ?>
    <section style="background-color: #eee;">
        <div class="container py-5">
            <div class="row">
                <div class="col">
                    <nav aria-label="breadcrumb" class="bg-body-tertiary rounded-3 p-3 mb-4">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="<?= ROOT ?>">Accueil</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Nouveau Demande</li>
                        </ol>
                    </nav>
                </div>
            </div>

            <div class="p-5 text-center bg-body-tertiary">
                <h1 class="mb-3">Nouveau Demande</h1>
            </div>
            <?php if (isset($error)) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= $error ?>
                </div>
            <?php endif; ?>

            <?php if (isset($success)) : ?>
                <div class="alert alert-success" role="alert">
                    <?= $success ?>
                </div>
            <?php endif; ?>
            <form method="post" action="<?= ROOT ?>/sendEtu/demande">
                <div class="form-group">
                    <label for="exampleFormControlInput1">Sujet</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" name="sujet" placeholder="sujet">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Demande de</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="demande_type">
                        <option>Demande de stage</option>
                        <option>Attestation de poursuite d'étude</option>
                        <option>Attestation d assurance</option>
                        <option>Activite parascolaire</option>
                        <option>Autre</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Description</label>
                    <textarea placeholder="....." class="form-control" id="exampleFormControlTextarea1" name="description" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary" data-mdb-ripple-init style="margin: 10px;">Envoyer</button>
            </form>
        </div>
    </section>
    <!-- Inclure vos fichiers JavaScript et autres ressources -->
</body>
</html>
