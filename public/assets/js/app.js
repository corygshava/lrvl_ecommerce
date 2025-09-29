// initialisers
function init_submitters() {
    let subs = document.querySelectorAll('[data-submitme]');

    subs.forEach(el => {
        if(el.dataset.picked == undefined || el.dataset.picked !== 'submitters'){
            let sel = el.dataset.submitme;
            let notice = el.dataset.notice || 'running action';
            let maform = document.querySelector(sel);

            if(maform != undefined){
                el.dataset.picked = 'submitters';
                el.addEventListener('click', () => {
                    maform.submit();
                    alert_success(notice);
                });
            } else {
                alert_success(`form: ${sel}, doesnt exist`);
            }
        }
    })
}

function init_quantifiers() {
	// Find all quantifier containers
    let quans = document.querySelectorAll('[data-role="quantifier"]');

    if(quans.length == 0){
        alert_silent('no products found');
    }

	quans.forEach(container => {
		const input = container.querySelector('input[type="number"][name="quantity"]');
		const minusBtn = container.querySelector('.fa-minus').closest('button');
		const plusBtn = container.querySelector('.fa-plus').closest('button');

        // alert_success('found a quantifier');

		if (!input || !minusBtn || !plusBtn) return; // skip if broken

		const min = input.hasAttribute('min') ? parseInt(input.getAttribute('min'), 10) : 0;
		const max = input.hasAttribute('max') ? parseInt(input.getAttribute('max'), 10) : 1;

		// Ensure input starts within bounds
		if (input.value === "" || isNaN(input.value)) {
			input.value = min !== -Infinity ? min : 0;
		} else {
			input.value = Math.max(min, Math.min(max, parseInt(input.value, 10)));
		}

		// Minus button
		minusBtn.addEventListener('click', () => {
			let current = parseInt(input.value, 10) || 0;
			if (current > min) {
				input.value = current - 1;
			}
		});

		// Plus button
		plusBtn.addEventListener('click', () => {
			let current = parseInt(input.value, 10) || 0;
			if (current < max) {
				input.value = current + 1;
			}
		});

		// Validate manual input (if user types directly)
		input.addEventListener('input', () => {
			let current = parseInt(input.value, 10);
			if (isNaN(current)) {
				input.value = min !== -Infinity ? min : 0;
			} else {
				input.value = Math.max(min, Math.min(max, current));
			}
		});
	});
}

// events
window.addEventListener('load',() => {
    init_submitters();
    init_quantifiers();

    // alert_dark('loaded');
})