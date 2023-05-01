//new orders
const accept_main = document.querySelectorAll('.accept_main');
const accept_popup = document.querySelector('.accept_popup');

//idont use querry
accept_main.forEach((btn) => {
    btn.addEventListener('click', (e) => {
        e.preventDefault();
        openPopup('accept_job');
        data = btn.closest('li').dataset;

        currentpopup = popups['accept_job'];
        currentpopup.querySelector('.popup-title').innerHTML = "Accept Job #" + data.jobid;
        currentpopup.querySelector('#title .description').innerHTML = data.title;
        currentpopup.querySelector('#client .description').innerHTML = data.client;
        currentpopup.querySelector('#date .description').innerHTML = data.date;
        currentpopup.querySelector('#time .description').innerHTML = data.time;
        currentpopup.querySelector('#address .description').innerHTML = data.address;
        currentpopup.querySelector('input#job_id').value = data.jobid;
    });
});


//event listner to accept job button in popup
accept_popup.addEventListener('click', (e) => {
    e.preventDefault();
    acceptJob();
});


//function to accept job to back end using xmlHttpRequest
function acceptJob() {
    const form = popups['accept_job'].querySelector('form');
    const formData = new FormData(form);
    formData.append('action', 'accept_job');
    console.log(formData.job_id);

    const xhr = new XMLHttpRequest();
    xhr.open('POST', ROOT+'/Technician/Orders/acceptOrder', true);
    xhr.onload = function() {
        if (xhr.status == 200) {
            res = xhr.responseText;
            res = JSON.parse(res);
            console.log(res);
            formSuccessfull('accept_job','Great!',res.success)
        }else{
            res = xhr.responseText;
            console.log(res.error)
        }
    }

    xhr.send(formData);
}



//orders in queue
const complete_main = document.querySelectorAll('.complete_main');
const complete_popup = document.querySelector('.complete_popup');

//idont use querry
complete_main.forEach((btn) => {
    btn.addEventListener('click', (e) => {
        e.preventDefault();
        openPopup('complete_order');
        data = btn.closest('li').dataset;

        currentpopup = popups['complete_order'];
        currentpopup.querySelector('.popup-title').innerHTML = "Complete Order #" + data.orderid;
        currentpopup.querySelector('input#order_id').value = data.orderid;

        const today = new Date();
        const todayISO = today.toISOString().substr(0, 10)

        currentpopup.querySelector('input#completed_date').value = todayISO;
    });
});


//event listner to accept job button in popup
complete_popup.addEventListener('click', (e) => {
    e.preventDefault();
    completeOrder();
});


//function to accept job to back end using xmlHttpRequest
function completeOrder() {
    const form = popups['complete_order'].querySelector('form');
    const formData = new FormData(form);
    $order_id=form.querySelector('input#order_id').value;
    $completed_date=form.querySelector('input#completed_date').value;

    formData.append('order_id', $order_id);
    formData.append('completed_date', $completed_date);
    formData.append('action', 'complete_order');

    const xhr = new XMLHttpRequest();
    xhr.open('POST', ROOT+'/Technician/Orders/completeOrder', true);
    xhr.onload = function() {
        if (xhr.status == 200) {
            res = xhr.responseText;
            console.log(res);
            res = JSON.parse(res);
            console.log(res);
            formSuccessfull('accept_job','Great!',res.success)
        }else{
            res = xhr.responseText;
            console.log(res.error)
        }
    }

    xhr.send(formData);
}
