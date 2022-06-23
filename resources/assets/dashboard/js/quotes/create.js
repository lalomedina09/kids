import initCountable from '@/utils/Countable';
import initValidator from '@/utils/Validator';

initCountable('textarea[name=body]');

initValidator('form#form-quotes', {
    excerpt: {
        required: true,
        rangelength: [1, 1000]
    }
});
