<?php
	include("dbconnect.php");
	$request_method = $_SERVER["REQUEST_METHOD"];

function getTasks(){
    $pdo = getConnexion();
    $req = "SELECT * FROM todo ORDER BY id asc";
    $stmt = $pdo->prepare($req);
    $stmt->execute();
    $formations = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    sendJSON($formations);
}

  function getTask($id){
    $pdo = getConnexion();
    $req = "SELECT * FROM todo where id=".$id." LIMIT 1";
    $stmts = $pdo->prepare($req);
    $stmts->bindValue(":id",$id,PDO::PARAM_INT);
    $stmts->execute();
    $formation = $stmts->fetchAll(PDO::FETCH_ASSOC);
    $stmts->closeCursor();
    sendJSON($formation);
}

  function deleteTask($id){
    $pdo = getConnexion();
    $req = "DELETE FROM `todo` where id=".$id." LIMIT 1";
    $supp = $pdo->prepare($req);
    $supp->bindValue(":id",$id,PDO::PARAM_INT);
    $supp->execute();
    $formation = $supp->fetchAll(PDO::FETCH_ASSOC);
    $supp->closeCursor();
  }

function AddTask(){
    $pdo = getConnexion();
    $insertion = $pdo->prepare("INSERT INTO todo (nom, date) VALUES (:nom ,Now())");
    $insertion->bindParam(':nom', $_POST['nom']);
    if( $insertion->execute() ){
        echo "Le produit a bien été ajouté";
    }else{
        echo "Une erreur d'ajout s'est produite";
    }
  }

  function updateTask($id){
    $pdo = getConnexion();
      $_PUT = array();
      //parse_str(file_get_contents("php://input"), $_PUT);
      $_PUT = json_decode(file_get_contents("php://input"), true);
      $nom = $_PUT["nom"];
      $update = $pdo->prepare("UPDATE todo SET nom='".$nom."', date = Now() WHERE id=".$id);
      //var_dump($_PUT["nom"]);
      if( $update->execute()){
          echo "Le produit a bien été Modifié";
      }else{
          echo "Une erreur s'est produite";
      }
  }

    function sendJSON($infos){
    header("Content-Type: application/json");
    echo json_encode($infos, JSON_PRETTY_PRINT);
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
    
    case 'POST':

      AddTask();
      break;

    case 'PUT':
      if( !empty($_GET['id']) )
      {
        $id = intval($_GET["id"]);
        updateTask($id);
      }
      else
      {
        echo "Vous n'avez pas renseigné l'id";
      }
      break;

    case 'DELETE':
      if(!empty($_GET['id']))
      {
        $id = intval($_GET["id"]);
        deleteTask($id);
	echo"La tache a bien été supprimé"; 
      }
      else
      {
        echo "Vous n'avez pas renseigné l'id";
      }
      break;

    default:
      echo "Choisie un verbe http";
      break;
  }
?>

