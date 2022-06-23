import initCountable from '@/utils/Countable';
import initValidator from '@/utils/Validator';

initCountable('textarea[name=excerpt]');

initValidator('form#form-courses', {
    excerpt: {
        required: true,
        rangelength: [1, 156]
    }
});
