// Select all create account modal elements
const createAccountModalOpenButtons = document.querySelectorAll('[data-modal-target-create]');
const createAccountModalCloseButtons = document.querySelectorAll('[data-close-button-create]');
const createAccountModalOverlay = document.getElementById('overlay');

// Check if required variables are found
if (!createAccountModalOpenButtons || !createAccountModalCloseButtons || !createAccountModalOverlay) {
	console.error('Could not find required variables');
}

// Open create account modal when button is clicked
createAccountModalOpenButtons.forEach((button) => {
	button.addEventListener('click', () => {
		const modal = document.querySelector(button.dataset.modalTargetCreate);
		openCreateAccountModal(modal);
	});
});

// Close create account modal when overlay is clicked
createAccountModalOverlay.addEventListener('click', () => {
	const modals = document.querySelectorAll('.modal-create-account-data-form.active');
	modals.forEach((modal) => {
		closeCreateAccountModal(modal);
	});
});

// Close create account modal when close button is clicked
createAccountModalCloseButtons.forEach((button) => {
	button.addEventListener('click', () => {
		const modal = button.closest('.modal-create-account-data-form');
		closeCreateAccountModal(modal);
	});
});

// Function to open create account modal
function openCreateAccountModal(modal) {
	if (!modal) {
		console.error('Could not find modal element');
		return;
	}
	modal.classList.add('active');
	createAccountModalOverlay.classList.add('active');
}

// Function to close create account modal
function closeCreateAccountModal(modal) {
	if (!modal) {
		console.error('Could not find modal element');
		return;
	}
	modal.classList.remove('active');
	createAccountModalOverlay.classList.remove('active');
}

// https://www.youtube.com/watch?v=MBaw_6cPmAw
