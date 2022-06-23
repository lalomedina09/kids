import initValidator from '@/utils/Validator';

initValidator('#form-landing', {
    name: {
        required: true
    },
    lastname: {
        required: true
    },
    phone: {
        required: true,
        digits: true,
        rangelength: [10, 10]
    },
    email: {
        required: true,
        email: true,
        rangelength: [1, 255]
    },
    range: {
        required: true
    },
    'g-recaptcha-response': {
        required: true
    }
});
