import initBindVariables, { getVariable, setVariable, getVariables } from '@/utils/BindVariables';
import { nodeToForm } from '@/utils/ButtonForm';

const arraySum = (arr) => arr.reduce((accumulator, value) => accumulator + value);

initBindVariables();

document.addEventListener('total_previous_expenses', (e) => {
    const result = arraySum([
        getVariable('capacitation_expenses'),
        getVariable('books_expenses'),
        getVariable('market_research_expenses'),
        getVariable('travels_expenses'),
        getVariable('prototype_expenses'),
        getVariable('other_previous_expenses')
    ]);
    setVariable(result, e.type);
    document.dispatchEvent(new Event('total_initial_expenses'));
});


document.addEventListener('total_administrative_expenses', (e) => {
    const result = arraySum([
        getVariable('legal_expenses'),
        getVariable('trademark_expenses'),
        getVariable('initial_rent_expenses'),
        getVariable('aconditioning_administraive_expenses'),
        getVariable('administrative_equipment_expenses'),
        getVariable('systems_expenses'),
        getVariable('web_expenses'),
        getVariable('transportation_expenses'),
        getVariable('stationery_expenses'),
        getVariable('advertising_expenses'),
        getVariable('taxes_expenses'),
        getVariable('other_administrative_expenses')
    ]);
    setVariable(result, e.type);
    document.dispatchEvent(new Event('total_initial_expenses'));
});

document.addEventListener('total_startup_expenses', (e) => {
    const result = arraySum([
        getVariable('aconditioning_operating_expenses'),
        getVariable('production_equipment_expenses'),
        getVariable('other_production_expenses'),
        getVariable('furniture_expenses'),
        getVariable('initial_stock_expenses'),
        getVariable('installation_expenses'),
        getVariable('other_startup_expenses')
    ]);
    setVariable(result, e.type);
    document.dispatchEvent(new Event('total_initial_expenses'));
});

document.addEventListener('total_initial_expenses', (e) => {
    const result = arraySum([
        getVariable('total_previous_expenses'),
        getVariable('total_administrative_expenses'),
        getVariable('total_startup_expenses')
    ]);
    setVariable(result, e.type);
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
