const logoutBtn = document.getElementById('logout-btn');

logoutBtn.addEventListener('click', function () {
	// console.log('Logout button clicked'); // Debugging purposes
	if (confirm('Are you sure you want to logout?')) {
		location.replace('assets/includes/logout.inc.php');
	} else {
		// Do nothing
	}
});
