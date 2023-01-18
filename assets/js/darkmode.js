let currentTheme = localStorage.getItem('theme'); // Get Dark Mode from Local Storage
const darkModeToggle = document.querySelector('#dark-mode-toggle'); // Dark Mode Toggle Button ID

const enableDarkMode = () => {
	// Enable Dark Mode Function
	document.getElementById('stylesheet').setAttribute('href', 'assets/scss/dark-login.css'); // Add Dark Mode Class to Body
	localStorage.setItem('theme', 'darkmode'); // Set Dark Mode to Enabled in Local Storage
}; // End Enable Dark Mode

const disableDarkMode = () => {
	// Disable Dark Mode Function
	document.getElementById('stylesheet').setAttribute('href', 'assets/scss/light-login.css'); // Add Dark Mode Class to Body // Remove Dark Mode Class from Body
	localStorage.setItem('theme', null); // Set Dark Mode to Null in Local Storage
}; // End Disable Dark Mode

if (currentTheme === 'darkmode') {
	// If Dark Mode is Enabled
	enableDarkMode(); // Enable Dark Mode
} // End If

darkModeToggle.addEventListener('click', () => {
	currentTheme = localStorage.getItem('theme'); // Get Dark Mode from Local Storage to refresh the value
	if (currentTheme !== 'darkmode') {
		// If Dark Mode is not Enabled
		enableDarkMode(); // Enable Dark Mode
		console.log('Dark Mode Enabled'); // Log Dark Mode Enabled
	} else {
		// If Dark Mode is Enabled
		disableDarkMode(); // Disable Dark Mode
		console.log('Dark Mode Disabled'); // Log Dark Mode Enabled
	} // End If
}); // End Click Event Listener
