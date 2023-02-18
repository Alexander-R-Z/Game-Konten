const openModalButtons = document.querySelectorAll('[data-modal-target]');
const closeModalButtons = document.querySelectorAll('[data-close-button]');
const overlay = document.getElementById('overlay');

// open modal when click button
openModalButtons.forEach((button) => {
	button.addEventListener('click', () => {
		const modal = document.querySelector(button.dataset.modalTarget);
		openModal(modal);
		console.log('open modal when click button');
	});
});

// close modal when click outside modal
overlay.addEventListener('click', () => {
	const modals = document.querySelectorAll('.modal-account-login-data-form-edit.active');
	modals.forEach((modal) => {
		closeModal(modal);
		console.log('close modal when click outside modal');
	});
});

// close modal when click button
closeModalButtons.forEach((button) => {
	button.addEventListener('click', () => {
		const modal = button.closest('.modal-account-login-data-form-edit');
		closeModal(modal);
		console.log('close modal when click button');
	});
});

// open modal
function openModal(modal) {
	if (modal == null) return;
	modal.classList.add('active');
	overlay.classList.add('active');
	console.log('open modal');
}

// close modal
function closeModal(modal) {
	if (modal == null) return;
	modal.classList.remove('active');
	overlay.classList.remove('active');
	console.log('close modal');
}

// https://www.youtube.com/watch?v=MBaw_6cPmAw
