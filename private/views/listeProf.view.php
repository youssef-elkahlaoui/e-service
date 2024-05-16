<?php require("includes/header.view.php"); ?>

<body>
    <?php require("includes/nav.etu.view.php"); ?>

    <section style="background-color: #eee;">
        <div class="container py-5">
            <div class="row">
                <div class="col">
                    <nav aria-label="breadcrumb" class="bg-body-tertiary rounded-3 p-3 mb-4">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="<?= ROOT ?>">Accueil</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Mes professeurs</li>
                        </ol>
                    </nav>
                </div>
            </div>

            <div class="p-5 text-center bg-body-tertiary">
                <h1 class="mb-3">Vos professeurs</h1>
            </div>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Professeurs</th>
                        <th>Modules</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Alfreds Futterkiste</td>
                        <td>Maria Anders</td>
                        <td>Maria Anders</td>

                    </tr>
                    <tr>
                        <td>Centro comercial Moctezuma</td>
                        <td>Francisco Chang</td>
                        <td>Maria Anders</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>
</body>
</html>
