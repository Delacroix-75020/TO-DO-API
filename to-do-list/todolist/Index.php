<!DOCTYPE html>
<html>
  <meta charset="utf-8">
  <head>
    <title>To-Do List</title>
    <h1>Bienvenue sur ma To-Do Liste</h1>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">  
    <link rel="stylesheet" href="styles.css" type="text/css">  
  </head>
  <body>
    <div class="col-6 centre"></div>
      <form class="form">
        <div class="input-group">
          <input id="value" type="text" class="form-control todo-input" placeholder="Ajouter une tâche" aria-label="Recipient's username" aria-describedby="basic-addon2">
          <div class="input-group-append">
            <button id="btnAdd" class="btn btn-success" type="button">Ajouter</button>
            <button id="btnRmv" class="btn btn btn-danger" type="button">Supprimer</button>
          </div>
        </div>
      </form>
    <div class="container col-4">
      <ul id="list" class="todo-list"></ul>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript" src="script.js"></script>
  </body>
</html>