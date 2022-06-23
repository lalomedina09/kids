import initValidator from '@/utils/Validator';
import initTogglePassword from '@/utils/TogglePassword';

initTogglePassword('#toggle-login-password', [
    '#login-password'
]);

initValidator('form#form-login', {
    email: {
        required: true,
        email: true,
        rangelength: [1, 255]
    },
    password: {
        required: true,
        rangelength: [8, 255]
    }
});
