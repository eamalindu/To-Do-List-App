window.addEventListener('load',()=>{
    const textFullName = document.querySelector('#textFullName');
    const textUsername = document.querySelector('#textUsername');
    const textPassword = document.querySelector('#textPassword');
    const textPasswordConfirm = document.querySelector('#textPasswordConfirm');

    const btnSignup = document.querySelector('#btnSignup');
    btnSignup.disabled = true;

    textFullName.addEventListener('keyup',()=>{
        const pattern = '^[A-Z][a-z]{2,19}[ ][A-Z][a-z]{2,29}$';
        const regexPattern = new RegExp(pattern);
        if(regexPattern.test(textFullName.value)){
            textFullName.classList.add('is-valid');
            textFullName.classList.remove('is-invalid');
        }
        else{
            textFullName.classList.remove('is-valid');
            textFullName.classList.add('is-invalid');
        }
    })

    textUsername.addEventListener('keyup',()=>{
        const pattern = '^[a-z|A-Z]{2,19}[@][a-z|A-Z]{2,8}[.][a-z|A-Z]{2,3}$';
        const regexPattern = new RegExp(pattern);

        if (regexPattern.test(textUsername.value)) {
            textUsername.classList.add('is-valid');
            textUsername.classList.remove('is-invalid');

        } else {
            textUsername.classList.remove('is-valid');
            textUsername.classList.add('is-invalid');
        }
    });

    textPasswordConfirm.addEventListener('keyup', () => {
        if (textPasswordConfirm.value === textPassword.value) {
            if (textPasswordConfirm.value.length>=8) {
                textPasswordConfirm.classList.add('is-valid');
                textPasswordConfirm.classList.remove('is-invalid');
                btnSignup.disabled = false;

            } else {
                btnSignup.disabled = true;
                textPasswordConfirm.classList.remove('is-valid');
                textPasswordConfirm.classList.add('is-invalid');

            }
        }
        else {
            btnSignup.disabled = true;
            textPasswordConfirm.classList.remove('is-valid');
            textPasswordConfirm.classList.add('is-invalid');
        }
    });

    textPassword.addEventListener('keyup', () => {
        if (textPassword.value.length < 8) {
            textPassword.classList.add('is-invalid');
            btnSignup.disabled = true;
        } else {
            textPassword.classList.remove('is-invalid');
            textPassword.classList.add('is-valid');

        }
    });

});