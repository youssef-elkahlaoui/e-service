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
                            <li class="breadcrumb-item active" aria-current="page">Rendre les Devoirs</li>
                        </ol>
                    </nav>
                </div>
            </div>

            <div class="p-5 text-center bg-body-tertiary">
                <h1 class="mb-3">Devoir</h1>
            </div>
            <form>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Sujet</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="sujet">
                </div>
                <div class="form-group">
                    <label class="form-label" for="customFile">Default file input example</label>
                    <input type="file" class="form-control" id="customFile" />
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Module de :</label>
                    <select class="form-control" id="exampleFormControlSelect1">
                    <option>5</option>
                    <option>4</option>
                    <option>3</option>
                    <option>2</option>
                    <option>1</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Description</label>
                    <textarea placeholder="....." class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
                <button type="button" class="btn btn-primary" data-mdb-ripple-init style="margin: 10px;">Envoyer</button>
            </form>
        </div>
    </section>
</body>
</html>
