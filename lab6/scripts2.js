
function callback() {
	if(this.readyState===this.DONE) {
		var data=JSON.parse(this.responseText);
		var textElement = document.getElementById("txtInfo");

		//textElement.append(data["text"]);
		textElement.append(data["text"]);
		textElement.style.overflow="hidden";
		textElement.style.height=textElement.scrollHeight+'px';
		document.getElementById("card").style.height=document.getElementById("card").scrollHeight+'px';
		} 
	}


function ReadMore() {	
	var textElement = document.getElementById("txtInfo");
	textElement.style.overflow="hidden";	
	textElement.style.display="block";
	textElement.type="text";	
	var request = new XMLHttpRequest();
	var sessid=String(document.cookie.match(/PHPSESSID=[^;]+/));	
	var sessionid=sessid.split("=");
	var textLenghth=textElement.value.length-23;
	request.open("GET", "http://localhost:8081/web-programing/lab4/index.php?method=get&action=data&sessionid="+sessionid[1]+"&isFull=0&offset="+textLenghth, true);

	request.onload = callback;
	request.send();

	
}

function Edit() {
var modal = document.getElementById('myModal');
var btn = document.getElementById("edit");
modal.style.display = "block";
var span = document.getElementsByClassName("close")[0];
span.onclick = function() {
    modal.style.display = "none";
}
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
}

	
