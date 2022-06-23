import initValidator from '@/utils/Validator';

initValidator('form#form-newsletter', {
    first_name: {
        required: true,
        rangelength: [1, 200]
    },
    last_name: {
        required: true,
        rangelength: [1, 200]
    },
    state: {
        required: true
    },
    email: {
        required: true,
        email: true,
        rangelength: [1, 200]
    },
    'g-recaptcha-response': {
        required: true
    }
});
