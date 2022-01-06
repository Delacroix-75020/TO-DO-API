<?php
  include("dbconnect.php");
  $request_method = $_SERVER["REQUEST_METHOD"];

  function getTasks()
  {
    global $conn;
    $query = "SELECT * FROM todo";
    $response = array();
    $result = mysqli_query($conn, $query);
    while($row = mysqli_fetch_assoc($result))
    {
      $response[] = $row;
    }
    header('Content-Type: application/json');
    echo json_encode($response, JSON_PRETTY_PRINT);
  }


  function getTask($id=0)
  {
    global $conn;
    $query = "SELECT * FROM todo";
    if($id != 0)
    {
      $query .= " WHERE id=".$id." LIMIT 1";
    }
    $response = array();
    $result = mysqli_query($conn, $query);
    while($row = mysqli_fetch_assoc($result))
    {
      $response[] = $row;
    }
    header('Content-Type: application/json');
    echo json_encode($response, JSON_PRETTY_PRINT);
  }

   function AddTask()
  {
    date_default_timezone_set('Europe/Paris');
    $time = date('Y-m-d', time());
    global $conn;
    $nom = $_POST["nom"];
    $date = date('Y-m-d H:i:s');
    $query="INSERT INTO todo(nom,  date) VALUES ('".$nom."',Now())";
    if(mysqli_query($conn, $query))
    {
      $response=array(
        'status' => 1,
        'status_message' =>'Produit ajoute avec succes.'
      );
    }
    else
    {
      $response=array(
        'status' => 0,
        'status_message' =>'ERREUR!.'. mysqli_error($conn)
      );
    }
    header('Content-Type: application/json');
    echo json_encode($response);
  }

    function updateTask($id)
  {
    date_default_timezone_set('Europe/Paris');
    global $conn;
    $_PUT = array(); //tableau qui va contenir les données reçues
    parse_str(file_get_contents('php://input'), $_PUT);
    $nom = $_PUT["nom"];
    $date = date('Y-m-d H:i:s');
    //construire la requête SQL
    $query="UPDATE todo SET nom='".$nom."', date = Now() WHERE id=".$id;
    
    if(mysqli_query($conn, $query))
    {
      $response=array(
        'status' => 1,
        'status_message' =>'Tâche mis a jour avec succes.'
      );
    }
    else
    {
      $response=array(
        'status' => 0,
        'status_message' =>'Echec de la mise a jour de la tâche. '. mysqli_error($conn)
      );
      
    }
    
    header('Content-Type: application/json');
    echo json_encode($response);
  }

  function deleteTask($id)
  {
    global $conn;
    $query = "DELETE FROM todo WHERE id=".$id;
    if(mysqli_query($conn, $query))
    {
      $response=array(
        'status' => 1,
        'status_message' =>'Produit supprime avec succes.'
      );
    }
    else
    {
      $response=array(
        'status' => 0,
        'status_message' =>'La suppression du produit a echoue. '. mysqli_error($conn)
      );
    }
    header('Content-Type: application/json');
    echo json_encode($response);
  }


  switch($request_method)
  {
    case 'GET':
      if(!empty($_GET["id"]))
      {
        $id = intval($_GET["id"]);
        getTask($id);
      }
      else
      {
        getTasks();
      }
      break;
    default:
      header("HTTP/1.0 405 Method Not Allowed");
      break;

    case 'POST':

      AddTask();
      break;

    case 'PUT':

      $id = intval($_GET["id"]);
      updateTask($id);
    break;

    case 'delete':

      $id = intval($_GET["id"]);
      deleteTask($id);
    break;
  }
?>
