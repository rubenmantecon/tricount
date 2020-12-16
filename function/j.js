function messageWarning(number, message) {
	let numberCodeWarning = number;
	let msgInWarning = message;
	if (numberCodeWarning === 1) {
		document.getElementById("warningSpace").innerHTML = ('<div style="background-color:#fe2222; width:50%;"><h5>Error:' + msgInWarning + '</h5></div>');
	}
	if (numberCodeWarning === 2) {
		document.getElementById("warningSpace").innerHTML = ('<div style="background-color:#65ea0f; width:50%;"><h5>Succes:' + msgInWarning + '</h5></div>');
	}
	else {
		document.getElementById("warningSpace").innerHTML = ('<div style="background-color:#ebf81e; width:50%;"><h5>Warning:' + msgInWarning + '</h5></div>');
	}
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

const insertAfter = (node, element) => {
	element.parentNode.insertBefore(node, element.nextElementSibling);
};