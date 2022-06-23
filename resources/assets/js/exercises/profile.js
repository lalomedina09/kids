import initValidator from '@/utils/Validator';

const rules = {
    'p[0]': {
        required: true
    },
    'p[1]': {
        required: true
    },
    'p[2]': {
        required: true
    },
    'p[3]': {
        required: true
    },
    'p[4]': {
        required: true
    },
    'p[5]': {
        required: true
    }
};

const options = {
    'errorPlacement': 'twoLevel',
    'highlight': 'none',
    'unhighlight': 'none'
};

initValidator('#form-exercise', rules, {}, options);
