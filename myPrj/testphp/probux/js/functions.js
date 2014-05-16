function d(i){return document.getElementById(i);}

function showError(i,v,method){
	if(i==1){
	t = "Username cannot be left blank."; 
	}
	if(i==2){
	t = "Username cannot have less than 4 characters."; 
	}
	if(i==3){
	t = "Username cannot contain spaces."; 
	}
	if(i==4){
	t = "Please use only letters (a-z) and numbers."; 
	}
	if(i==5){
	t = "Password cannot be left blank.";
	}
	if(i==6){
	t = "Password cannot have less than 4 characters."
	}
	if(i==7){
	t = "Confirm your password here.";
	}
	if(i==8){
	t = "These passwords don't match. Try again.";
	}
	if(i==9){
	t = "Email cannot be left blank.";
	}
	if(i==10){
	t = "Enter a valid email address.";
	}
	if(i==11){
	t = "Birth year cannot be left blank.";
	}
	if(i==12){
	t = "Enter a valid 4 digit Birth Year.";
	}
	
	/* username */
	if(i==13){
	t = "Someone already has that username. Try another.";
	}
	/* email */ 
	if(i==14){
	t = "Someone already has that email address. Try another.";
	}
	if(i==15){
	t = "Type the letters on the image";
	}
	if(i>=1 && i<=4 || i == 13){
		d("username").className = "error";
		d("u_error").style.display = "block";
		d("username_error").innerHTML = t;
	}
	if(i>=5 && i<=6){
		d("password").className = "error";
		d("p_error").style.display = "block";
		d("password_error").innerHTML = t;
	}
	if(i>=7 && i<=8){
		d("cpassword").className = "error";
		d("cp_error").style.display = "block";
		d("cpassword_error").innerHTML = t;
	}
	if(i>=9 && i<=10 || i == 14){
		d("email").className = "error";
		d("e_error").style.display = "block";
		d("email_error").innerHTML = t;
	}
	if(i>=11 && i<=12){
		d("birth").className = "error";
		d("b_error").style.display = "block";
		d("birth_error").innerHTML = t;
	}
	if(i==15){
		d("captcha").className = "error";
		d("cap_error").style.display = "";
		d("captcha_error").innerHTML = t;
	}
}

var error = 0;
function checkUsername(){
d("username").value.replace(/^\s+|\s+$/g, '');
	/*USERNAME VERIFICATION*/
		d("u_error").style.display = "none";
		d("username").className = "";
		if(d("username").value.length==0){showError(1);error=1;}else
		if(d("username").value.length<4){showError(2);error=1;}else 
		if(d("username").value.match(/\s/g)){showError(3);error=1;}else 
		if(!d("username").value.match(/^[A-Za-z0-9]{4,15}$/)){showError(4);error=1;}
}

function checkPassword(){
d("password").value.replace(/^\s+|\s+$/g, '');
	/*PASSWORD VERIFICATION*/
		d("p_error").style.display="none";
		d("password").className="";
		if(d("password").value.length==0){showError(5);error=1;}else
		if(d("password").value.length<4){showError(6);error=1;}
}

function checkEmail(){
d("email").value.replace(/^\s+|\s+$/g, '');
	/*EMAIL VERIFICATION*/
		d("e_error").style.display = "none";
		d("email").className = "";
		if(d("email").value.length>0){
		/*if(d("email").value.length==0){showError(9,d("email").value, 'js');error=1;}else*/
		if(!d("email").value.match(/^[^@]+@[^\.]{1}[^@]+[^\.]{1}$/)){showError(10,d("email").value, 'js');error=1;}
		}
}

function checkBirth(){
d("birth").value.replace(/^\s+|\s+$/g, '');
	/*BIRTH VERIFICATION*/
		d("b_error").style.display = "none";
		d("birth").className = "";
		if(d("birth").value.length>0){
		/*if(d("birth").value.length==0){showError(11,d("birth").value, 'js');error=1;}else*/
		if(!d("birth").value.match(/^[0-9]{4}$/) || !(d("birth").value>=1901 && d("birth").value<=((new Date().getFullYear())-5))){showError(12,d("birth").value, 'js');error=1;}
		}
}

function checkCaptcha(){
d("captcha").value.replace(/^\s+|\s+$/g, '');
	/*BIRTH VERIFICATION*/
		d("cap_error").style.display = "none";
		d("captcha").className = "";
		if(d("captcha").value.length>0){
		if(d("captcha").value.length<5){showError(15,d("captcha").value, 'js');error=1;}
		}
}

function checkForm(form){

	checkUsername();
	checkPassword();
	
	if(d("username").getAttribute("class")=="error" || 
	d("password").getAttribute("class")=="error"){
		return false;
	} else {
		processForm(form)
	}
}
