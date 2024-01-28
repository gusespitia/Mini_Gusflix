<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require('db.inc.php');

$updateUser = $_POST['id'];
$profiles = getProfile($updateUser);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gusflix</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body data-bs-theme="dark">
    <main>
        <header>
            <nav><a href="./index.php"> <img class="logo" src="./logo.png" alt=""></a></nav>
        </header>
        <section>
            <div class="users-form">
                <!-- CODIGO DE LA PAGINA TITULO -->
                <section class="arriba">
                    <div class="row py-lg-5">
                        <div class="col-lg-6 col-md-8 mx-auto">
                            <h3>You can change your name</h3>
                            <hr>
                        </div>
                    </div>
                </section>
                <!-- CODIGO DE USUARIOS -->
                <div class="container">
                    <div class="row row-cols-3 row-cols-sm-3 row-cols-md-5 g-5 justify-content-around">
                        <?php foreach ($profiles as $profile): ?>
                            <div class="row">
                                <form method="post" action="db.inc.php">
                                    <div class="form-group">
                                        <div class="col">
                                            <div class="card shadow-sm text-center">
                                                <input type="hidden" name="id" value="<?= $updateUser ?>">
                                                <img src="<?= $profile['image']; ?>" class="card-img-top"
                                                    alt="<?= $profile['avatar_name']; ?>"
                                                    title="<?= $profile['name']; ?>" />

                                                <div class="update-name-user">
                                                    <!-- Name -->
                                                    <label class="name-user" for="name_edit">Your name:</label>
                                                    <input class="name-user-update" type="text" id="name_edit"
                                                        name="name_edit" placeholder="<?= $profile['name']; ?>" required />

                                                    <!-- Last name -->
                                                    <label class="name-user" for="last_name_edit">Your last name:</label>
                                                    <input class="name-user-update" type="text" id="last_name_edit"
                                                        name="last_name_edit" placeholder="<?= $profile['last_name']; ?>"
                                                        required />
                                                </div>
                                                <div class="update-name-user">
                                                    <hr>
                                                    <button name="submit" type="submit" class="btn btn-primary">
                                                        UPDATE
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                                            fill="currentColor" class="bi bi-person-gear"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm.256 7a4.474 4.474 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10c.26 0 .507.009.74.025.226-.341.496-.65.804-.918C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4s1 1 1 1h5.256Zm3.63-4.54c.18-.613 1.048-.613 1.229 0l.043.148a.64.64 0 0 0 .921.382l.136-.074c.561-.306 1.175.308.87.869l-.075.136a.64.64 0 0 0 .382.92l.149.045c.612.18.612 1.048 0 1.229l-.15.043a.64.64 0 0 0-.38.921l.074.136c.305.561-.309 1.175-.87.87l-.136-.075a.64.64 0 0 0-.92.382l-.045.149c-.18.612-1.048.612-1.229 0l-.043-.15a.64.64 0 0 0-.921-.38l-.136.074c-.561.305-1.175-.309-.87-.87l.075-.136a.64.64 0 0 0-.382-.92l-.148-.045c-.613-.18-.613-1.048 0-1.229l.148-.043a.64.64 0 0 0 .382-.921l-.074-.136c-.306-.561.308-1.175.869-.87l.136.075a.64.64 0 0 0 .92-.382l.045-.148ZM14 12.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0Z" />
                                                        </svg>
                                                    </button>

                                                </div>
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <div class="caja">
                                    <form method="post" action="db.inc.php">
                                        <input type="hidden" name="registro_id" value="<?= $updateUser ?>">
                                        <!-- ID del registro a eliminar -->
                                    </form>
                                </div>
                            </div>
                        <?php endforeach; ?>

                    </div>
                </div>
            </div>
            </div>
    </main>
</body>

</html>