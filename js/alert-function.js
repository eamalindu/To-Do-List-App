//This function will show a bootstrap Alert
//Function have two arguments -> msg and type
//Pass the message you want to display as the first argument
//Pass the background you want to display as the second argument
//Example -> showAlert('Account created !','bg-success');
//Alert will be automatically hidden after 1s
function showAlert(msg, type) {
    const div = document.createElement('div');
    div.classList.add('alert', 'alert-danger', type, 'text-white', 'custom-alert', 'alert-dismissible', 'fade', 'show');
    div.innerHTML = msg + '<button type="button" class="btn-close" style="filter:invert(100%)" data-bs-dismiss="alert" aria-label="Close"></button>';
    document.querySelector('body').appendChild(div);

    //hide alert after 1s
    setTimeout(function () {
        $('.alert').fadeOut('slow');
    }, 1500);
}