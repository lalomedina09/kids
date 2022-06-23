import initValidator from '@/utils/Validator';

const rules = {
    payment: {
        required: true
    },
    politics: {
        required: true
    }
};

initValidator('form#form-course', rules);
