let bluetoothUI = document.querySelector('#bluetoothUI');

navigator.bluetooth.getAvailability().then(
	isAvailable => {
		bluetoothUI.hidden = !isAvailable;
	});

navigator.bluetooth.addEventListener('availabilitychanged', 
	e => {
		bluetoothUI.hidden = !e.value;
	})