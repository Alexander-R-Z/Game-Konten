const loginBtn = document.getElementById('login-btn');
const logoutBtn = document.getElementById('logout-btn');

console.log('loginBtn: ' + loginBtn); // Debug Login nav button

loginBtn.addEventListener('click', function () {
	//console.log('login'); // Debug Login nav button
	loginBtn.style.display = 'none';
	logoutBtn.style.display = 'block';
});

logoutBtn.addEventListener('click', function () {
	if (confirm('Are you sure you want to logout?')) {
		// Save it!
		//console.log('logout'); // Debug Logout nav button
		loginBtn.style.display = 'block';
		logoutBtn.style.display = 'none';
	} else {
		// Do nothing!
	}
});
