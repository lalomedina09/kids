import initBindVariables, { getVariable, setVariable, getVariables } from '@/utils/BindVariables';
import { nodeToForm } from '@/utils/ButtonForm';

const arraySum = (arr) => arr.reduce((accumulator, value) => accumulator + value);

initBindVariables();

document.addEventListener('fixed_expenses_total', (e) => {
    const result = arraySum([
        getVariable('home_mortgage_rent_expenses'),
        getVariable('services_expenses'),
        getVariable('other_services_expenses'),
        getVariable('supermarket_expenses'),
        getVariable('transport_expenses'),
        getVariable('dependents_expenses'),
        getVariable('health_sport_expenses'),
        getVariable('education_learning_expenses'),
        getVariable('personal_expenses'),
        getVariable('other_expenses')
    ]);
    setVariable(result, e.type);
    document.dispatchEvent(new Event('salary_total'));
});


document.addEventListener('luxuries_expenses_total', (e) => {
    const result = arraySum([
        getVariable('fun_expenses'),
        getVariable('travels_expenses'),
        getVariable('clothing_expenses'),
        getVariable('gadgets_expenses')
    ]);
    setVariable(result, e.type);
    document.dispatchEvent(new Event('salary_total'));
});

document.addEventListener('savings_total', (e) => {
    const result = arraySum([
        getVariable('goals_savings')
    ]);
    setVariable(result, e.type);
    document.dispatchEvent(new Event('salary_total'));
});

document.addEventListener('salary_total', (e) => {
    const result = arraySum([
        getVariable('fixed_expenses_total'),
        getVariable('luxuries_expenses_total'),
        getVariable('savings_total')
    ]);
    setVariable(result, e.type);

    const expenses_proportion = getVariable('fixed_expenses_total') / getVariable('salary_total');
    setVariable(expenses_proportion, 'expenses_proportion');
    const luxuries_proportion = getVariable('luxuries_expenses_total') / getVariable('salary_total');
    setVariable(luxuries_proportion, 'luxuries_proportion');
    const savings_proportion = getVariable('savings_total') / getVariable('salary_total');
    setVariable(savings_proportion, 'savings_proportion');
});

const handle = (event) => {
    const $node = event.currentTarget;
    const $form = nodeToForm($node);

    const variables = getVariables();
    for (const key in variables) {
        let $input = document.createElement('input');
        $input.type = 'hidden';
        $input.name = `answers[${key}]`;
        $input.value = variables[key];
        $form.appendChild($input);
    }

    document.body.appendChild($form);
    $form.submit();
};

document
    .getElementById('exercise-action')
    .addEventListener('click', (event) => {
        event.preventDefault();
        event.stopPropagation();
        handle(event);
        return false;
    });
