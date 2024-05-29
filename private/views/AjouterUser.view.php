<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter Utilisateur</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php
include "includes/nav.admin.view.php";
include "includes/header.view.php";
?>

<div class="container-fluid">
    <div class="row">
        <div class="col">
            <ol class="breadcrumb mb-0 bg-body-tertiary rounded-3 p-3 mb-4 shadow">
                <li class="breadcrumb-item"><a href="<?= ROOT ?>">Accueil</a></li>
                <li class="breadcrumb-item active" aria-current="page">Ajouter utilisateur..</li>
            </ol>
        </div>
    </div>
    <form method="post" action="<?= ROOT ?>/addUser/addUser">
        <div class="p-4 mx-auto mr-4 shadow rounded" style="margin-top: 50px;width:100%;max-width: 340px;">
            <h3 class="text-center p-3">Ajouter Utilisateur</h3>

            <?php if (isset($errors) && !empty($errors)): ?>
                <div class="alert alert-danger">
                    <?php foreach ($errors as $error): ?>
                        <p><?= htmlspecialchars($error) ?></p>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <?php if (isset($success_message)): ?>
                <div class="alert alert-success">
                    <p><?= htmlspecialchars($success_message) ?></p>
                </div>
            <?php endif; ?>

            <input class="my-2 form-control" type="text" name="firstname" placeholder="First Name" required>
            <input class="my-2 form-control" type="text" name="lastname" placeholder="Last Name" required>
            <input class="my-2 form-control" type="email" name="email" placeholder="Email" required>
            <input class="my-2 form-control" type="text" name="cne" placeholder="CNE" >
            <input class="my-2 form-control" type="text" name="cin" placeholder="CIN" required>

            <select class="my-2 form-control" name="gender" required>
                <option value="">--Select a Gender--</option>
                <option value="Male" <?= (isset($_POST['gender']) && $_POST['gender'] === 'Male') ? 'selected' : '' ?>>Male</option>
                <option value="Female" <?= (isset($_POST['gender']) && $_POST['gender'] === 'Female') ? 'selected' : '' ?>>Female</option>
            </select>

            <select class="my-2 form-control" name="rank" required>
                <option value="">--Select a Rank--</option>
                <option value="student" <?= (isset($_POST['rank']) && $_POST['rank'] === 'student') ? 'selected' : '' ?>>Student</option>
                <option value="prof" <?= (isset($_POST['rank']) && $_POST['rank'] === 'prof') ? 'selected' : '' ?>>Prof</option>
                <option value="admin" <?= (isset($_POST['rank']) && $_POST['rank'] === 'admin') ? 'selected' : '' ?>>Admin</option>
            </select>
			

            <select class="form-control" id="filiere" name="filiere" >
                <option value="" disabled selected hidden>--Filière--</option>
                <option value="CP1" <?= (isset($_POST['filiere']) && $_POST['filiere'] === 'CP1') ? 'selected' : '' ?>>CP1</option>
                <option value="CP2" <?= (isset($_POST['filiere']) && $_POST['filiere'] === 'CP2') ? 'selected' : '' ?>>CP2</option>
                <option value="TDIA1" <?= (isset($_POST['filiere']) && $_POST['filiere'] === 'TDIA1') ? 'selected' : '' ?>>TDIA1</option>
				<option value="TDIA2" <?= (isset($_POST['filiere']) && $_POST['filiere'] === 'TDIA2') ? 'selected' : '' ?>>TDIA2</option>
				<option value="TDIA3" <?= (isset($_POST['filiere']) && $_POST['filiere'] === 'TDIA3') ? 'selected' : '' ?>>TDIA3</option>
                <option value="GI1" <?= (isset($_POST['filiere']) && $_POST['filiere'] === 'GI1') ? 'selected' : '' ?>>GI1</option>
				<option value="GI2" <?= (isset($_POST['filiere']) && $_POST['filiere'] === 'GI2') ? 'selected' : '' ?>>GI2</option>
				<option value="GI3" <?= (isset($_POST['filiere']) && $_POST['filiere'] === 'GI3') ? 'selected' : '' ?>>GI3</option>
                <option value="ID1" <?= (isset($_POST['filiere']) && $_POST['filiere'] === 'ID1') ? 'selected' : '' ?>>ID1</option>
                <option value="ID2" <?= (isset($_POST['filiere']) && $_POST['filiere'] === 'ID2') ? 'selected' : '' ?>>ID2</option>
                <option value="ID3" <?= (isset($_POST['filiere']) && $_POST['filiere'] === 'ID3') ? 'selected' : '' ?>>ID3</option>
                <option value="GM1" <?= (isset($_POST['filiere']) && $_POST['filiere'] === 'GM1') ? 'selected' : '' ?>>GM1</option>
            </select>

            <input class="my-2 form-control" type="password" name="password" placeholder="Password" required>
            <input class="my-2 form-control" type="password" name="confirmation" placeholder="Retype Password" required>
            <br>
            <button class="btn btn-primary float-end" type="submit">Add User</button>
            <a href="<?= ROOT ?>/users">
                <button type="button" class="btn btn-danger">Cancel</button>
            </a>
        </div>
    </form>
</div>

</body>
</html>
