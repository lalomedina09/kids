import initValidator from '@/utils/Validator';

initValidator('form#form-email', {
    email: {
        required: true,
        email: true,
        rangelength: [1, 255]
    },
    'g-recaptcha-response': {
        required: true
    }
});
