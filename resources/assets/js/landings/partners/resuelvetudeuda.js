import initValidator from '@/utils/Validator';

initValidator('#form-landing', {
    names: {
        required: true
    },
    'first_surname': {
        required: true
    },
    mobile: {
        required: true,
        digits: true,
        rangelength: [10, 10]
    },
    email: {
        required: true,
        email: true,
        rangelength: [1, 255]
    },
    'debt_amount': {
        required: true,
        min: 35000
    },
    'g-recaptcha-response': {
        required: true
    }
});
