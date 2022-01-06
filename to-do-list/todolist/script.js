const tdInput = document.getElementById("value");
const tdButton = document.getElementById("btnAdd");
const tdList = document.getElementById("list");
const tdRemove = document.getElementById("btnRmv");

tdButton.addEventListener("click", addTd);
tdRemove.addEventListener("click",removeAll);


function addTd(event){
	event.preventDefault();

	if (!tdInput.value || tdInput.value.trim() === '') {

        $("#value").addClass("errorInput");

	}else{

		$("#value").removeClass("errorInput");

		/*const newli = document.createElement("li");
		newli.setAttribute('id','idLi');
		newli.classList.add("todo-item");
		tdList.appendChild(newli);*/
		
		/*const newlabel = document.createElement("label");
		newlabel.setAttribute('id','idabel');
		newlabel.classList.add("todo-label");
		newli.appendChild(newlabel);
		var oldtext = newlabel.innerText = tdInput.value;
		tdInput.value = "";*/

		/*const divmode = document.createElement("div");
		divmode = setAttribute('id','idDivmode');
		divmode = classList.add("div-btn-mode");
		divmode.appendChild(editbtn);
		divmode.appendChild(delbtn);*/

		
		const delbtn = document.createElement("button");
		delbtn.innerHTML = "Delete"; 
		delbtn.classList.add("todo-delbtn");
		delbtn.setAttribute("type", "button");
		delbtn.setAttribute('id', 'iddelbtn');
		delbtn.addEventListener("click", delTD);

		const editbtn = document.createElement("button");
		editbtn.innerHTML = "Modify"; 
		editbtn.classList.add("todo-editbtn");
		editbtn.setAttribute("type", "button");
		editbtn.setAttribute('id', 'ideditbtn');

		const okbtn = document.createElement("button");
	    okbtn.innerHTML = "Correct";
	    okbtn.classList.add("todo-okbtn");
	    okbtn.classList.add("hidebtn");
	    okbtn.setAttribute('id', 'idokbtn');
	    
	    const cancelbtn = document.createElement("button");
	    cancelbtn.innerHTML = "Cancel";
	    cancelbtn.classList.add("todo-cancelbtn");
	    cancelbtn.classList.add("hidebtn");
	    cancelbtn.setAttribute('id', 'idcancelbtn');
	    
	    const newtxt = document.createElement("input");
	    newtxt.setAttribute("type", "text");
	    newtxt.setAttribute('id', 'idtextchange');
	    newtxt.classList.add("txt-new");
	    newtxt.value = newlabel.innerText;

	    newli.appendChild(okbtn);
	    newli.appendChild(cancelbtn);
	    newli.appendChild(editbtn);
		newli.appendChild(delbtn);


		$("ul").on("dblclick", "label", function() {
	  		$(this).removeClass("completed")
		});

		$("ul").on("click", "label", function() {
	  		$(this).addClass("completed")
		});

		$("li").on("click", ".todo-editbtn", function() {	
		  	$(this).hide()
		  	$(this).closest("li").find(".todo-delbtn").hide()
		  	$(this).closest("li").find(".todo-cancelbtn").removeClass("hidebtn")
		  	$(this).closest("li").find(".todo-okbtn").removeClass("hidebtn")
		  	$(this).parent().find("label").replaceWith(newtxt)
		});

		$("li").on("click", ".todo-cancelbtn", function(){
			console.log($(this))
			$(this).addClass("hidebtn")
			$(this).closest("li").find(".todo-okbtn").addClass("hidebtn")
			$(this).closest("li").find(".todo-delbtn").show()
			$(this).closest("li").find(".todo-editbtn").show()
			$(this).parent().find("input").replaceWith(newlabel)
		});

		$("li").on("click", ".todo-okbtn", function(){

			if (!idtextchange.value || idtextchange.value.trim() === '') {

       			 $("#idtextchange").addClass("errorInput");
       			 alert("La zone doit saisie doit contenir au moins un caractère")

				}else{


				$(this).addClass("hidebtn")
				var text = newlabel.value = newtxt.value
				$(this).closest("li").find(".todo-cancelbtn").addClass("hidebtn")
				$(this).closest("li").find(".todo-delbtn").show()
				$(this).closest("li").find(".todo-editbtn").show()
				newlabel.innerText = text
				$(this).parent().find("input").replaceWith(newlabel)
			}});

	}
}

function delTD(event2){
	var obj = event2.target;
	if (obj.classList[0] == "todo-delbtn"){
		const del = obj.parentElement;
		del.remove();
	}
}

function removeAll(){

	var inputs = document.querySelectorAll('#list input');
	for(var i=0; input=inputs[i]; i++) {
    input.parentNode.removeChild(input);
	}

	var lis = document.querySelectorAll('#list li');
	for(var i=0; li=lis[i]; i++) {
    li.parentNode.removeChild(li);
	}

}




