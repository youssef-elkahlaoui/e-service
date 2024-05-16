<?php 
    include("../includes/header.view.php");
?>
<body>
    <?php
        include("../includes/nav.etu.view.php");
    ?>

    <section style="background-color: #eee;">
        <div class="container py-5">
            <div class="row">
                <div class="col">
                    <nav aria-label="breadcrumb" class="bg-body-tertiary rounded-3 p-3 mb-4">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="<?= ROOT ?>">Accueil</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Mes Demandes</li>
                        </ol>
                    </nav>
                </div>
            </div>

            <div class="p-5 text-center bg-body-tertiary">
                <h1 class="mb-3">Mes Demandes</h1>
            </div>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Sujet de la Demande</th>
                        <th>Etat</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Alfreds Futterkiste</td>
                        <td>Maria Anders</td>

                    </tr>
                    <tr>
                        <td>Centro comercial Moctezuma</td>
                        <td>Francisco Chang</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>
</body>
</html>
