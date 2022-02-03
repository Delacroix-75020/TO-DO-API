<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>To-Do List</title>
    <h1>Bienvenue sur ma To-Do Liste</h1>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.0/css/jquery.dataTables.css">
    <link rel="stylesheet" href="styles.css" type="text/css">
</head>
<body>
	<div class="col-6 centre"></div>
      <form class="ajoutClass">
        <div class="input-group">
          <input id="nameInput"  name="nameInput" type="text" class="form-control todo-input" placeholder="Ajouter une tâche" aria-describedby="basic-addon2">
          <div class="input-group-append">
            <button id="btnAdd" name="btnAdd" class="btn btn-success"  type="button">Ajouter</button>
          </div>
        </div>
      </form>
	<h2 id="message"></h2>
	<div class="box">
		
	<table id="table_id" class="display">
  <?php // $tasks = json_decode(file_get_contents("https://infra.ofii.fr/services/alternance/todo-list/api/task.php")); //?>
	<thead>
   	 <tr>
        	<th>#</th>
        	<th>Nom</th>
        	<th>Date</th>
		<th>Action</th>
    	</tr>
	</thead>
	<tbody>
    	<?php foreach ($tasks as $task) : ?>
   	<tr id="<?= $task->id ?>">	
        	<td><?= $task->id ?></td>
        	<td class="tdnom"><?= $task->nom ?></td>
        	<td><?= $task->date ?></td>
		<td><button id="btnmodify" type="button" name="btnmodify">Modifier</button><button id="btndelete" type="button" name="btndelete">Supprimer</button><button id="btncancel" type="button" class="hidebtn" name="btncancel">Cancel</button><button id="btnok" type="button" class="hidebtn"  name="btnok">Confirm</button> </td>
   	</tr>
    	<?php endforeach; ?> 
	</tbody>
	</table>
	</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.0/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="script.js"></script>
</body>
</html>
