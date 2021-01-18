function messageWarning(number, message) {
	if (number === 1) {
		document.getElementById("warningSpace").innerHTML = ('<div style="background-color:#fe2222; width:50%;"><h5>Error:' + message + '</h5></div>');
	}
	if (number === 2) {
		document.getElementById("warningSpace").innerHTML = ('<div style="background-color:#65ea0f; width:50%;"><h5>Succes:' + message + '</h5></div>');
	}
	else {
		document.getElementById("warningSpace").innerHTML = ('<div style="background-color:#ebf81e; width:50%;"><h5>Warning:' + message + '</h5></div>');
	}
}

function isNumeric(num) {
	return !isNaN(parseFloat(num)) && isFinite(num);
}

function insertAfter(newNode, existingNode) {
	existingNode.parentNode.insertBefore(newNode, existingNode.nextSibling);
}

function customCreateElement(tag, text, parent, beforeElement, attributes) {
	let element = document.createElement(tag);
	if (text) {
		let txtNode = document.createTextNode(text);
		element.appendChild(txtNode);
	}
	if (attributes != null) {
		for (var key in attributes) {
			element.setAttribute(key, attributes[key]);
		}
	}
	if (beforeElement != undefined && parent != undefined) {
		customNextElement = beforeElement.nextElementSibling;
		insertAfter(element, beforeElement);
	} else if (beforeElement != undefined) {
		parent.appendChild(element);
	}

}

function addNextElement(elementToSelect, elementToAdd) {
	let elem = document.getElementsByTagName(elementToSelect)[0];
	let lastElemElement = elem.children[elem.children.length - 1];
	let lastValue = lastElemElement.innerText;

	customCreateElement(elementToAdd, lastValue * 2, elem, lastElemElement);
}

function destroyElement(elementToDelete) {
	elementToDelete.parentNode.removeChild(elementToDelete);

}

function createForm() {
	var f = document.createElement("form");
	f.setAttribute('method', "post");
	f.setAttribute('action', "invitations.html");

	var i = document.createElement("input"); //input element, text
	i.setAttribute('type', "text");
	i.setAttribute('name', "name");
	i.setAttribute('placeholder', "Nombre");

	var o = document.createElement("input");
	o.setAttribute('type', "text");
	o.setAttribute('name', "description");
	o.setAttribute('placeholder', "Descripción");
	var p = document.createElement("input");
	p.setAttribute('type', "text");
	p.setAttribute('name', "moneyType");
	p.setAttribute('placeholder', "Moneda");

	var s = document.createElement("input"); //input element, Submit button
	s.setAttribute('type', "submit");
	s.setAttribute('value', "Enviar");

	f.appendChild(i);
	f.appendChild(o);
	f.appendChild(p);
	f.appendChild(s);
	document.getElementsByTagName('body')[0].appendChild(f);
}
function newEmailField() {
	var newForm = document.createElement("input");
	newForm.setAttribute('type', "text");
	newForm.setAttribute('name', "email[]");
	newForm.setAttribute('placeholder', "email");

	emailForm.appendChild(newForm);
}

