<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require('db.inc.php');
$eliminarUser = $_POST['id'];
$profiles = getProfile($eliminarUser);

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
                            <h3 class="fw-light">Are you sure you want to delete it?</h3>
                            <hr>

                        </div>
                    </div>
                </section>
                <!-- CODIGO DE USUARIOS -->
                <div class="container">

                    <div class="row row-cols-3 row-cols-sm-3 row-cols-md-5 g-5 justify-content-around">
                        <?php foreach ($profiles as $profile): ?>
                            <div class="col">
                                <div class="card shadow-sm text-center ">
                                    <img src="<?= $profile['image']; ?>" class="card-img-top"
                                        alt="<?= $profile['avatar_name']; ?>" title="<?= $profile['name']; ?>"
                                        width="400px" />
                                    <div class="card-body">
                                        <p class="card-text justify-content-around">
                                            <?= $profile['name']; ?>
                                        </p>

                                        <p class="card-text justify-content-around">
                                            <?= $profile['last_name']; ?>
                                        </p>
                                    </div>
                                    <div class="update-name-user">
                                        <div class="card-footer text-body-secondary col">
                                            <form method="post" action="db.inc.php">
                                                <input type="hidden" name="registro_id" value="<?= $eliminarUser ?>">
                                                <!-- ID del registro a actualizar -->
                                                <button name="eliminar" type="submit" class="btn btn-primary">
                                                    DELETE
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                        <path
                                                            d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z" />
                                                        <path
                                                            d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z" />
                                                    </svg>
                                                </button>


                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <hr>
            </div>
    </main>
</body>

</html>