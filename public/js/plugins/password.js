function togglePasswordVisibility(input, icon) {
	input.onfocus = () => (icon.style.right = "3px");
	input.onblur = () => (icon.style.right = "10px");
	icon.onclick = function () {
		const isEye = this.classList.contains("fa-eye");
		this.classList.toggle("fa-eye-slash", isEye);
		this.classList.toggle("fa-eye", !isEye);
		input.setAttribute("type", isEye ? "text" : "password");
		this.style.color = isEye ? "#f44335" : "#3866ba";
	};
}

var myInput = document.getElementById("password");
var myIcon = document.getElementById("icon");
togglePasswordVisibility(myInput, myIcon);

var mycInput = document.getElementById("c-password");
var mycIcon = document.getElementById("c-icon");
togglePasswordVisibility(mycInput, mycIcon);