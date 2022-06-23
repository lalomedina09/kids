import initCountable from '@/utils/Countable';
import initValidator from '@/utils/Validator';

$('select#author').select2();

initCountable('textarea[name=excerpt]');

initValidator('form#form-videos', {
    excerpt: {
        required: true,
        rangelength: [1, 156]
    }
});
