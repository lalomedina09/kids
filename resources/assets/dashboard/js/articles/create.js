import initCountable from '@/utils/Countable';
import initValidator from '@/utils/Validator';

initCountable('textarea[name=excerpt]');

$('select#author').select2();

initValidator('form#form-articles', {
    excerpt: {
        required: true,
        rangelength: [1, 156]
    }
});
