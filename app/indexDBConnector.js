
//function to update conference list
function populateList(){
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange=function(){
		document.getElementById("conference").innerHTML=xmlhttp.responseText;
	}
	xmlhttp.open("GET", "list_conf.php", true);
	xmlhttp.send();
}

//function to display details of selected conference room
function displayConference(name){
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange=function(){
		if(xmlhttp.readyState==4 && xmlhttp.status==200){
			document.getElementById("conferenceDisplay").innerHTML = xmlhttp.responseText;
		}
	}
	xmlhttp.open("GET", "conferencedetails.php?q="+name, true);
	xmlhttp.send();
}

//function which extracts room capacity from db and stores it locally when user chooses to join room
//then redirect to next view.
function setCapacity(name){
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange=function(){
		if(xmlhttp.readyState==4 && xmlhttp.status==200){
			var result = xmlhttp.responseText;
			sessionStorage.setItem("confpeople", result);
			while(sessionStorage.confname == null || sessionStorage.confpeople == null){
				//wait				
			}
			window.location.href = "panel.php";
		}
	}
	xmlhttp.open("GET", "capacitydetails.php?q="+name, false);
	xmlhttp.send();
}

$(document).ready(function(){

	//create a eventsource connection to server for room list updates
	var source = new EventSource("notifier.php");
	//store local data of number of rooms in database
	sessionStorage.setItem("roompopulation", "0");
	//event listener when message is sent from server
	source.addEventListener('message', function(e){
		//console.log(e.data);
		//if any changes in rooms, refresh room list (drop down menu)
		//update local room population data
		if(e.data != sessionStorage.roompopulation){
			console.log("refreshing room list");
			populateList();
			sessionStorage.setItem("roompopulation", e.data);
		}
	}, false);

	source.addEventListener('open', function(e){
		//console.log("Eventsource connected");
	}, false);

	source.addEventListener('error', function(e){
		if(e.readyState == EventSource.CLOSED){
			console.log("EventSource closed");
		}
	}, false);




	$("#start").click(function(){
				//grab inputs and print to console for debug
				var name = $("#confName").val();
				var people = $("#confPeople").val();
				console.log($("#setupConf").serialize());



				//make sure no input fields are empty
				if(name == ""){
					alert("Such Empty. WoW");
				}
				//else use ajax to send data and run php file at server backend
				else{
					$.ajax({
						url:"updateDB.php",
						type: "POST",
						data: $("#setupConf").serialize(),
						error: function(xhr){
							// report error with sending data
							alert("Error: " + xhr.status + " " + xhr.statusText);
						},
						success: function(data, status){
							//check back if successful.
							console.log("Status: " + status);

							//store conference data on local client browser
							sessionStorage.setItem("confname", name);
							sessionStorage.setItem("confpeople", people);
							console.log("Session name stored as: " + sessionStorage.confname);
							sessionStorage.setItem("sessiontype", "Create");
							//redirect to next view
							while(sessionStorage.confname == null || sessionStorage.confpeople == null){
								//wait
							}

							window.location.href = "panel.php";
						}

					});
				}
			});

	$("#join").click(function(){
		//get name of room from drop down selection 
		var name = $("#conference").val();
		//store name, set capacity, store session type, and then redirect to next view
		sessionStorage.setItem("confname", name);
		sessionStorage.setItem("sessiontype", "Join");
		setCapacity(name);
		
		

	});


});