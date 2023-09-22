window.addEventListener('load', () => {

    //get checkbox for show password
    const checkPassword = document.querySelector('#checkPassword');
    //get input for password
    const textPassword = document.querySelector('#textPassword');

    checkPassword.addEventListener('change', () => {
        if (textPassword.type == 'password') {
            textPassword.type = 'text';
        } else {
            textPassword.type = 'password';
        }
    });
});
