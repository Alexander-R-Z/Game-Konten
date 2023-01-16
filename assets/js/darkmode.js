let darkMode = localStorage.getItem('darkMode'); // Get Dark Mode from Local Storage
const darkModeToggle = document.querySelector('#dark-mode-toggle'); // Dark Mode Toggle Button ID

const enableDarkMode = () => {
	// Enable Dark Mode Function
	document.body.classList.add('darkmode'); // Add Dark Mode Class to Body
	localStorage.setItem('darkMode', 'enabled'); // Set Dark Mode to Enabled in Local Storage
}; // End Enable Dark Mode

const disableDarkMode = () => {
	// Disable Dark Mode Function
	document.body.classList.remove('darkmode'); // Remove Dark Mode Class from Body
	localStorage.setItem('darkMode', null); // Set Dark Mode to Null in Local Storage
}; // End Disable Dark Mode

if (darkMode === 'enabled') {
	// If Dark Mode is Enabled
	enableDarkMode(); // Enable Dark Mode
} // End If

darkModeToggle.addEventListener('click', function () {
	darkMode = localStorage.getItem('darkMode'); // Get Dark Mode from Local Storage to refresh the value
	if (darkMode !== 'enabled') {
		// If Dark Mode is not Enabled
		enableDarkMode(); // Enable Dark Mode
		//console.log('Dark Mode Enabled'); // Log Dark Mode Enabled
	} else {
		// If Dark Mode is Enabled
		disableDarkMode(); // Disable Dark Mode
		//console.log('Dark Mode Disabled'); // Log Dark Mode Enabled
	} // End If
}); // End Click Event Listener
