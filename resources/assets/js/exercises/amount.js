import initValidator from '@/utils/Validator';

$.validator.addClassRules('exercise-answer-number', {
    required: true,
    digits: true,
    min: 0
});

initValidator('#form-exercise');
