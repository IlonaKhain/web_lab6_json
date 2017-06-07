
function callback() {
	if(this.responseText) {
		var data=JSON.parse(this.responseText);
		var textElement = document.getElementById("txtInfo");
		textElement.append(data["text"]);
			} 
	}


function ReadMore() {
	var textElement = document.getElementById("txtInfo");
	textElement.style.overflowY="scroll";
	textElement.style.display="block";
	textElement.type="text";
	document.getElementById("card").style.overflowY="scroll";
	var request = new XMLHttpRequest();
	var sessid=String(document.cookie.match(/PHPSESSID=[^;]+/));	
	var sessionid=sessid.split("=");
	request.open("GET", "http://localhost:8081/web-programing/lab4/index.php?method=get&action=data&sessionid="+sessionid[1]);	
	request.onload = callback();
	request.send();
}

function Edit() {

var modal = document.getElementById('myModal');
// Get the button that opens the modal
var btn = document.getElementById("edit");
 modal.style.display = "block";
// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];
	
// When the user clicks the button, open the modal 
// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}
	//document.getElementById("txtEdit").value="kgkj,";	
	// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
}
	
