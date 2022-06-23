import { bindEvent } from '@/utils/BindEvents';
import initDatePicker from '@/utils/DatePicker';
import initTogglePassword from '@/utils/TogglePassword';
import initValidator from '@/utils/Validator';

const $form = document.getElementById('register-form');

initDatePicker('input[name="birthdate"]', 'YYYY-MM-DD');

bindEvent('click', '#next', () => $form.classList.add('active'));
bindEvent('click', '#back', () => $form.classList.remove('active'));

initTogglePassword('#toggle-register-password', [
    '#register-password',
    '#register-password-confirmation'
]);

const rules = {
    name: {
        required: true,
        rangelength: [1, 200]
    },
    last_name: {
        required: true,
        rangelength: [1, 200]
    },
    email: {
        required: true,
        email: true,
        rangelength: [1, 200]
    },
    password: {
        required: true,
        rangelength: [8, 100]
    },
    password_confirmation: {
        required: true,
        rangelength: [8, 100],
        equalTo: 'input#register-password'
    },
    'g-recaptcha-response': {
        required: true
    },
    state: {
        required: true
    },
    birthdate: {
        required: true,
        date: true
    },
    gender: {
        required: true
    }
};

const options = {
    invalid_handler: (e, validator) => {
        toastr.error(__('There are errors in the validation of the fields'));
        $form.classList.remove('active');
    }
};

initValidator('form#form-register', rules, {}, options);
