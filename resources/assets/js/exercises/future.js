import initValidator from '@/utils/Validator';

initValidator('#form-exercise', {
    'f[0]': {
        required: true
    },
    'f[1]': {
        required: true,
        digits: true,
        range: [1, 100]
    },
    'f[2]': {
        required: true
    },
    'f[3]': {
        required: true
    },
    'f[4]': {
        required: true,
        digits: true,
        range: [1, 100]
    }
});
