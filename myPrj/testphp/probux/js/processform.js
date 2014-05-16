function processForm(form){
	form.setAttribute("onsubmit","return false;");
	var inputs = form.getElementsByTagName("input"); 
	for (var i = 0; i < inputs.length; i++) {if (inputs[i].type === 'submit') {inputs[i].disabled = true;inputs[i].value = "Processing...";inputs[i].className = "button-submit-d";}}
}
