<?php
// AGREGAR NUEVO USUARIO


if (array_key_exists("name", $_GET) && array_key_exists("last_name", $_GET)) {
  agregarNuevoUser();
}
;


// ACTUALIZAR NUEVO USUARIO

// COMPROBAR SI SE QUIERE actualizar UN USUARIO
if (isset($_POST['name_edit'])) {
  $registro_id = $_POST["id"];
  $name = $_POST["name_edit"];
  $last_name = $_POST["last_name_edit"];

  updateProfiles($registro_id, $name, $last_name);
}
;

// COMPROBAR SI SE QUIERE ELIMINAR UN USUARIO
if (isset($_POST['eliminar'])) {
  $registro_id = $_POST['registro_id'];
  deleteProfiles($registro_id);
}
;




// CONECTARSE A LAS BD
function connectToDB()
{
  $db_host = '127.0.0.1';
  $db_user = 'root';
  $db_password = 'root';
  $db_db = 'php_mysql';
  $db_port = 8889;

  try {
    $db = new PDO('mysql:host=' . $db_host . '; port=' . $db_port . '; dbname=' . $db_db, $db_user, $db_password);
  } catch (PDOException $e) {
    echo "Error!: " . $e->getMessage() . "<br/>";
    die();
  }
  $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);

  return $db;
}
;

// CARGAR TODOS LOS PERFILES

function getProfiles(): array
{
  $sql = "SELECT profiles.id, profiles.name, profiles.last_name, profiles.maturity, profiles.avatar_id, avatars.image, avatars.name as avatar_name 
      FROM profiles 
      LEFT JOIN avatars 
      ON profiles.avatar_id = avatars.id
      WHERE profiles.status = 1
      ORDER BY profiles.name ASC";

  $stmt = connectToDB()->prepare($sql);
  $stmt->execute();

  return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
;

// CARGAR TODOS LOS PELICULAS

function getMovies(): array
{
  $sql = "SELECT movies.id, movies.name, movies.description, movies.year, movies.genero, movies.image, movies.url 
  FROM php_mysql.movies";

  $stmt = connectToDB()->prepare($sql);
  $stmt->execute();

  return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
;



// CARGAR TODOS LOS AVATARS

function getAvatars(): array
{
  $sql = "SELECT category, id, name, image
      FROM avatars
      WHERE status = 1      
      ORDER BY category ASC";

  $stmt = connectToDB()->prepare($sql);
  $stmt->execute();

  return $stmt->fetchAll(PDO::FETCH_ASSOC);
}



// CARGAR POR CATEGORIA TODOS LOS AVATARS

function getCategory(): array
{
  $sql = "SELECT  avatars.category
      FROM avatars order by category ASC";




  $stmt = connectToDB()->prepare($sql);
  $stmt->execute();

  return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
;


// OBTENER EL PERFIL SELECIONADO
function getProfile($eliminarUser): array
{
  $sql = "SELECT profiles.id, profiles.name, profiles.last_name, profiles.maturity, profiles.avatar_id, avatars.image, avatars.name as avatar_name 
      FROM profiles 
      LEFT JOIN avatars 
      ON profiles.avatar_id = avatars.id
      WHERE profiles.id = $eliminarUser";

  $stmt = connectToDB()->prepare($sql);
  $stmt->execute();

  return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
;

//ELIMINAR PERFIL SELECIONADO
function deleteProfiles($eliminarUser)
{
  $status = 0;
  // Asegúrate de tener una conexión válida a la base de datos
  $conn = connectToDB();

  // Sanitiza el valor del ID del usuario para evitar ataques de inyección SQL
  $registro_id = intval($eliminarUser);

  // Sentencia SQL para eliminar el registro
  // $sql = "DELETE FROM profiles WHERE profiles.id = :registro_id";

  $sql = "UPDATE `profiles` SET status= '$status'  WHERE id = :registro_id";

  // Prepara la sentencia
  $stmt = $conn->prepare($sql);

  // Vincula el valor del registro_id a la sentencia
  $stmt->bindParam(':registro_id', $registro_id, PDO::PARAM_INT);

  // Ejecuta la consulta DELETE
  if ($stmt->execute()) {
    // Éxito al eliminar el usuario

    echo "<script>
                alert('Usuario Eliminado de tu Perfil');
                window.location= 'index.php'
    </script>";
  } else {
    // Error al eliminar el usuario
    echo "<script>alert('ERROR!!');</script>";
  }

  // Redirige al usuario a la página principal

}
;

// AGREGAR NUEVO USUARIO

function agregarNuevoUser()
{
  $numero_aleatorio = rand(1, 100);
  $name = $_GET["name"];
  $last_name = $_GET["last_name"];
  $avatarId = $_GET["avatarid"];
  $status = 1;
  if (isset($_GET["maturity"])) {
    $maturity = 1;
  } else {
    $maturity = 0;
  }

  try {
    $conn = connectToDB();

    $sql = "INSERT INTO `profiles` (name, last_name, maturity , avatar_id, status) VALUES (:name, :last_name, :maturity, :avatarId , '$status')";
    $stmt = $conn->prepare($sql);

    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->bindParam(':last_name', $last_name, PDO::PARAM_STR);
    $stmt->bindParam(':maturity', $maturity, PDO::PARAM_INT);
    $stmt->bindParam(':avatarId', $avatarId, PDO::PARAM_INT);

    $stmt->execute();
    header('Location:index.php');
  } catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
  } finally {
    $conn = null;
  }
}

function updateProfiles($registro_id, $name, $last_name)
{
  try {
    // Asegúrate de tener una conexión válida a la base de datos
    $conn = connectToDB();
    // Sanitiza el valor del ID del usuario para evitar ataques de inyección SQL
    $registro_id = intval($registro_id);

    // Sentencia SQL para actualizar el registro
    $sql = "UPDATE `profiles` SET name= :name, last_name= :last_name  WHERE id = :registro_id";

    // Prepara la sentencia
    $stmt = $conn->prepare($sql);

    // Vincula los valores a los marcadores de posición
    $stmt->bindParam(':registro_id', $registro_id, PDO::PARAM_INT);
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->bindParam(':last_name', $last_name, PDO::PARAM_STR);

    // Ejecuta la consulta UPDATE
    if ($stmt->execute()) {
      // Éxito al actualizar el usuario
      echo "<script>
                        alert('Usuario Actualizado en tu Perfil ');
                        window.location= 'index.php'
                    </script>";
    } else {
      // Error al actualizar el usuario
      echo "<script>alert('Error al actualizar el usuario');</script>";
      // Optional: Log the actual error for debugging purposes
      error_log("Error updating user: " . print_r($stmt->errorInfo(), true));
    }
  } catch (PDOException $e) {
    // Handle the exception, e.g., log or display an error message
    echo "Error: " . $e->getMessage();
  } finally {
    // Cierra la conexión a la base de datos
    $conn = null;
  }
}

