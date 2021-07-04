

// creo l'oggetto di XMLHTTPrequest e si vanno a utilizzare le proprieta e metodi per creare la richiesta http
function getXMLHttpRequestObject() {
	var request = null;
	if (window.XMLHttpRequest) {
		request = new XMLHttpRequest();
	} else if (window.ActiveXObject) { // Older IE.
		request = new ActiveXObject("MSXML2.XMLHTTP.3.0");
	}
	return request;
}


var xhr = null;
//
function ajaxcall(url, container) {
  xhr = getXMLHttpRequestObject();
  xhr.onreadystatechange = function () { // callback 
    let el = document.getElementById(container);
    if ((xhr.readyState == 4) && (xhr.status == 200)) {
        el.innerHTML = xhr.responseText;
    }
  } 
  xhr.open("GET", url, true);
  xhr.send();
}




function ajaxcallTicket(url, container) {
  xhr = getXMLHttpRequestObject();
  xhr.onreadystatechange = function () { // callback 
    let el = document.getElementById(container);
    if ((xhr.readyState == 4) && (xhr.status == 200)) {
            el.innerHTML = xhr.responseText;
    }
  } 
  val1 = document.getElementById("partenza").value;
  val2 = document.getElementById("destinazione").value;
  val3 = document.getElementById("quantita").value;
  val4 = document.getElementById("trip-start").value;
  
  params=encodeURI("partenza=" + val1 + "&destinazione=" + val2 + "&quantita=" + val3 + "&trip-start=" + val4);
  xhr.open("POST", url, true);
  xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
  xhr.send(params);
}



  //testing ajax valid
