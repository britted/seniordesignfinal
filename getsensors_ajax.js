


function DeleteAjax(event){
	var deleted = document.getElementById("delete").value;
	//alert(deleted);
	// Make a URL-encoded string for passing POST data:
	var dataString = "deleted=" + encodeURIComponent(deleted);
        alert(dataString);
	var xmlHttp = new XMLHttpRequest(); // Initialize our XMLHttpRequest instance
	xmlHttp.open("POST", "delete.php", true); // Starting a POST request (NEVER send passwords as GET variables!!!)
	xmlHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); // It's easy to forget this line for POST requests
	xmlHttp.addEventListener("load", function(event){
                alert(event.target.responseText);
                alert("tested");
                var jsonData = JSON.parse(event.target.responseText); // parse the JSON into a JavaScript object
		if(jsonData.success){  // in PHP, this was the "success" key in the associative array; in JavaScript, it's the .success property of jsonData
			alert("Your Event Was Deleted");
		}else{
			alert("Your Event was not deleted");
		}
	}, false); // Bind the callback to the load event
	xmlHttp.send(dataString); // Send the data
}
 
document.getElementById("Delete_btn").addEventListener("click", DeleteAjax, false); // Bind the AJAX call to button click
