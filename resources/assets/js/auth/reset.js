import initValidator from '@/utils/Validator';
import initTogglePassword from '@/utils/TogglePassword';

initTogglePassword('#toggle-reset-password', [
    '#reset-password',
    '#reset-password-confirmation'
]);

initValidator('form#form-reset', {
    email: {
        required: true,
        email: true,
        rangelength: [1, 255]
    },
    password: {
        required: true,
        rangelength: [8, 100]
    },
    password_confirmation: {
        required: true,
        rangelength: [8, 100],
        equalTo: 'input#reset-password'
    }
});
