<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require('db.inc.php');

$profiles = getProfiles();
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

<body data-bs-theme="dark">
    <main>
        <header>
            <nav><a href="./index.php"> <img class="logo" src="./logo.png" alt=""></a></nav>
        </header>
        <section>
            <div class="users-form">
                <!-- CODIGO DE LA PAGINA TITULO -->
                <section class="arriba">
                    <div>
                        <div>
                            <h3>Who is watching?</h3>
                            <hr>
                            <div class="new-profile">
                                <a href="form.php" class="btn btn-primary btn-lg active" role="button"
                                    aria-pressed="true">
                                    Add new profile +
                                </a>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- CODIGO DE USUARIOS -->
                <div class="container">
                    <div class="row row-cols-3 row-cols-sm-3 row-cols-md-5 g-5 justify-content-around">
                        <?php foreach ($profiles as $profile): ?>
                            <div class="col">
                                <div class="card shadow-sm text-center">
                                    <form method="post" action="user.php">
                                        <input type="hidden" name="id" value="<?= $profile['id']; ?>">
                                        <button type="submit" role="link">
                                            <img src="<?= $profile['image']; ?>" class="card-img-top"
                                                alt="<?= $profile['avatar_name']; ?>" title="<?= $profile['name']; ?>" />

                                        </button>
                                    </form>


                                    <div class="card-body">
                                        <span>
                                            <?= $profile['name']; ?>
                                        </span>
                                        <br>
                                        <span>
                                            <?= $profile['last_name']; ?>
                                        </span>
                                    </div>
                                    <div class="caja">
                                        <div class="edit">
                                            <form method="post" action="update.php">
                                                <input type="hidden" name="id" value="<?= $profile['id']; ?>">
                                                <button type="submit" class="edit" role="link">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18px" height="18px"
                                                        fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                                        <path
                                                            d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                        <div class="delete">
                                            <form method="post" action="delete.php">
                                                <input type="hidden" name="id" value="<?= $profile['id']; ?>">
                                                <button type="submit" class="delete" role="link">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
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
    </main>
</body>

</html>