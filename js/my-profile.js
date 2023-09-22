window.addEventListener('load', () => {

    //get my-profile email text field
    const textEmailUser = document.querySelector('#textEmailUser');
    const textUpdatedFullName = document.querySelector('#textFullName');
    const btnUpdateProfile = document.querySelector('#btnUpdateProfile');
    btnUpdateProfile.disabled = true;

    textEmailUser.addEventListener('click', () => {
        showAlert('Email cannot be changed !', 'bg-danger');
    });

    textUpdatedFullName.addEventListener('keyup', () => {
        btnUpdateProfile.disabled = false;
    });

    const textNewPassword = document.querySelector('#textNewPassword');
    const textConfirmPassword = document.querySelector('#textConfirmPassword');
    const btnUpdatePassword = document.querySelector('#btnUpdatePassword');
    btnUpdatePassword.disabled = true;

    textConfirmPassword.addEventListener('keyup', () => {
        if (textConfirmPassword.value === textNewPassword.value) {
            if (textConfirmPassword.value.length>=8) {
                textConfirmPassword.classList.add('is-valid');
                textConfirmPassword.classList.remove('is-invalid');
                btnUpdatePassword.disabled = false;

            } else {
                btnUpdatePassword.disabled = true;
                textConfirmPassword.classList.remove('is-valid');
                textConfirmPassword.classList.add('is-invalid');

            }
        }
    });

    textNewPassword.addEventListener('keyup', () => {
        if (textNewPassword.value.length < 8) {
            textNewPassword.classList.add('is-invalid');
            btnUpdatePassword.disabled = true;
        } else {
            textNewPassword.classList.remove('is-invalid');
            textNewPassword.classList.add('is-valid');

        }
    });


});