/**
 * @author Kelvin
 */

function login() {
	el = document.getElementById("login");
	el.style.visibility = (el.style.visibility == "visible") ? "hidden" : "visible";
}

function toggleMe(val) 
{
	var user = document.getElementById('user');
	//alert(val+" dfasd");
	if(val == 'top_team' || val == 'bottom_team')
	{
		//alert(val+" ");
		user.style.display = "none";
		//label.style.display = "none";
	}
	else
	{
		user.style.display = "block";
		//label.style.display = "block";
	}
}