import { bindEventToNode, bindLiveEvent } from '@/utils/BindEvents';
import insertTemplate from '@/utils/EJS';
import initValidator from '@/utils/Validator';

import { loadTemplates } from '@/utils/EJS';
import templates from '@/templates';
loadTemplates(templates);

const init = (container_selector) => {
    const $tbody = document.querySelector(container_selector);
    const $addButton = document.querySelector('#budget-answers-add');

    const limit = 20;
    let count = $tbody.rows.length - 1;
    let last_id = count;

    const addAnswer = () => {
        if (count >= limit) return;

        const template_data = {
            answer: {
                index: last_id,
                label: '',
                type: 0,
                amount: ''
            }
        };
        insertTemplate('budget_answer', template_data, container_selector);
        count++;
        last_id++;
    };

    const removeAnswer = (target) => {
        if (count <= 1) return;

        target.parentNode.parentNode.remove();
        count--;
    };

    const toggleLock = (target) => {
        target.disabled = (count >= limit);
    };

    bindEventToNode('click', $addButton, (event, target) => {
        event.preventDefault();
        addAnswer();
        toggleLock(target);
    });

    bindLiveEvent('click', '.budget-answers-remove', (event, target) => {
        event.preventDefault();
        removeAnswer(target);
        toggleLock($addButton);
    });

    if (count === 0) {
        for (let i = 0; i < 3; i++) {
            addAnswer();
        }
    }
};

init('#budget-answers');

$.validator.addClassRules('exercise-answer', {
    required: true
});

$.validator.addClassRules('exercise-answer-text', {
    required: true,
    minlength: 1
});

$.validator.addClassRules('exercise-answer-type', {
    required: true
});

$.validator.addClassRules('exercise-answer-number', {
    required: true,
    digits: true,
    min: 0
});

initValidator('#form-exercise');
