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

// events
window.addEventListener('load',() => {
    init_submitters();

    // alert_dark('loaded');
})