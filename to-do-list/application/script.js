$(document).ready(function () {

 var table =$('#table_id').DataTable(
{
    ajax: {
      url: "https://infra.ofii.fr/services/alternance/todo-list/api/task.php",
      dataSrc: "",  
    },   
    "columns": [
      { "data": "id", className: "my_class" },
      { "data": "nom", className: "taskNom"  },
      { "data": "date" },
      { "data": null,"defaultContent":"<button id='btnmodify' type='button' class='btn btn-secondary' name='btnmodify'>Modifier</button><button id='btndelete' class='btn btn-danger'  type='button' name='btndeleete'>Supprimer</button><button id='btnok' type='button' class='hidebtn btn btn-success '  name='btnok'>Confirm</button><button id='btncancel' type='button' class='hidebtn btn btn-info ' name='btncancel'>Cancel</button></td>" },
    ]
  } 

);

 var taskInput=$('#nameInput');
 var message=$('#message');
 var btnmodify=$('#btnmodify');

 $("form #btnAdd").click(function (event){
  
 var formData = {
	nom: $("#nameInput").val(),
    };

  if(taskInput.val() || taskInput.val().trim() !== ''){
    $.ajax({
      type: "POST",
      url: "https://infra.ofii.fr/services/alternance/todo-list/api/task.php",
      data: formData,
      dataType: "json",
      encode: true,
    });
      table.ajax.reload();
      message.html("Tâche ajoutée");
      setTimeout(function(){ message.empty();}, 2000);
      taskInput.empty()
}
else{
   	 message.html("Tâche vide");
   	 setTimeout(function(){ message.empty();}, 2000);
    }
   });

$('.dataTable').on('click', 'tbody td #btnmodify', function() {
var txt = $(this).parent().siblings("td").eq(1).text().replace(/'/g,"&apos;");  
$(this).addClass("hidebtn")
$(this).parent().find("#btndelete").addClass("hidebtn")
$(this).parent().find("#btnok").removeClass("hidebtn");
$(this).parent().find("#btncancel").removeClass("hidebtn");
//$(this).parent().siblings("td").eq(1).replaceWith("<input class='changeInput' id='changeInput' value="$(this).parent().siblings("td").eq(1).text()">")
$(this).parent().siblings("td").eq(1).replaceWith("<input class='form-control' type='text'  id='inputChange' value='"+ txt + "' / >")
});


$('.dataTable').on('click', 'tbody td #btncancel', function() {
var oldtxt = $(this).parent().siblings("td").eq(1).val()
var txt = $(this).parent().siblings("input").val()
console.log(oldtxt)
$(this).addClass("hidebtn")
$(this).parent().find("#btnok").addClass("hidebtn");
$(this).parent().find("#btnmodify").removeClass("hidebtn");
$(this).parent().find("#btndelete").removeClass("hidebtn");
$(this).parent().siblings("input").replaceWith("<td id='change'>")
$(this).parent().siblings("td").eq(1).html(txt)
$(this).parent().siblings("td").eq(1).removeAttr('id')
});

$('.dataTable').on('click', 'tbody td #btndelete', function() {
var id = $(this).parent().siblings("td").eq(0).text() //Récuperation de l'id
console.log(id)
if (confirm('Voulez vous vraiment supprimez la tâche n°'+id )) {
   // Save it!
   $.ajax({
    type: "DELETE",
    url: "https://infra.ofii.fr/services/alternance/todo-list/api/task.php/"+id,
   });
   console.log('La tache a été supprimé');
    message.html("Tâche supprimée");
    setTimeout(function(){ message.empty();}, 2000);

   $(this).parent().parent().remove()
   }
   else
   {
   // Do nothing!
   console.log('La suppression a été abandonnée');
   }
});

$('.dataTable').on('click', 'tbody td #btnok', function(){
  var id = $(this).parent().siblings("td").eq(0).text() //Récuperation de l'id
  var value = $(this).parent().siblings("input").val()
  var formData = {
        nom: $(this).parent().siblings("input").val(),
    };
  console.log(formData)
  if (confirm('Voulez vous vraiment modifié la tâche n°'+id )) {
      $.ajax({
         type: "PUT",
         url: "https://infra.ofii.fr/services/alternance/todo-list/api/task.php/"+id,
         data: JSON.stringify(formData).replace(/'/g,"&apos;"),
	 dataType: "json",
             });
         console.log('La tache a été modifié');
         message.html("Tâche modifié");
         setTimeout(function(){ message.empty();}, 2000);
	 var newtxt = $(this).parent().siblings("input").val()
	 console.log("Le nouveau texte est :"+ newtxt)
	 $(this).parent().siblings("input").replaceWith("<td>"+ newtxt +"</td> ")
	 $(this).addClass("hidebtn");
	 $(this).parent().find("#btncancel").addClass("hidebtn");
	 $(this).parent().find("#btnmodify").removeClass("hidebtn");
	 $(this).parent().find("#btndelete").removeClass("hidebtn");

	  
        } 
          else
         {
          // Do nothing!
          console.log('La suppression a été abandonnée');
         }
 });


});




