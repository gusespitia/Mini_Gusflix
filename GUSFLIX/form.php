<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require('db.inc.php');

$avatars = getAvatars();
$categories = getCategory();

// print '<pre>';
// print_r($avatars);
// print '</pre>';
// exit;
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Gusflix</title>
  <link rel="stylesheet" href="./reset.css">
  <link rel="stylesheet" href="./style.css" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body>
  <main>
    <header>
      <nav><a href="./index.php"> <img class="logo" src="./logo.png" alt=""></a></nav>
    </header>
    <div class="users-form">
      <h3>Please choose a profile name</h3>
      <div class="datos">
        <ul>
          <form action="">
            <div class="form-group">
              <label for="name">Name: </label>
              <input type="text" id="name" name="name" size="20" placeholder="Please type your name" required />
            </div>
            <div class="form-group">
              <label for="last_name">Last Name:</label>
              <input type="text" id="last_name" name="last_name" size="20" placeholder="Your last name" required />
            </div>
            <div class="form-group form-check">
              <input type="checkbox" class="form-check-input" name="maturity" id="maturity" />
              <label class="choose-a-user" for="maturity">Allow mature content ?</label>
            </div>
            <hr>
            <h4>Choose an avatar!</h4>
      </div>
      <div style="overflow:scroll; height:400px;">
        <?php $category = ""; ?>
        <?php foreach ($avatars as $avatar): ?>
          <?php if ($category != $avatar['category']) {
            $category = $avatar['category'] ?>
            <h3>
              <?= $avatar['category'] ?>
            </h3>
            <hr>
          <?php }
          ; ?>
          <div class="form-check form-check-inline">
            <input class="btn-check" type="radio" name="avatarid" id="avatar<?= $avatar["id"]; ?>"
              value="<?= $avatar["id"]; ?>">
            <label class="btn" for="avatar<?= $avatar["id"]; ?>">
              <img src="<?= $avatar["image"]; ?>" alt="<?= $avatar["name"]; ?>" title="<?= $avatar["name"]; ?>"
                class="rounded mx-auto d-block" width="120px" />
            </label>
          </div>
        <?php endforeach; ?>
      </div>
      <hr />
      <button name="submit" type="submit" class="btn btn-primary w-100 py-2">
        Submit
      </button>
      </form>
      </ul>
    </div>
    <hr>

  </main>
</body>

</html>