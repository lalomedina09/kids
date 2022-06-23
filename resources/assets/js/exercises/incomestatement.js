import initBindVariables, { getVariable, setVariable, getVariables } from '@/utils/BindVariables';
import { nodeToForm } from '@/utils/ButtonForm';

const arraySum = (arr) => arr.reduce((accumulator, value) => accumulator + value);

initBindVariables();

document.addEventListener('gross_profit', (e) => {
    const gross_profit = getVariable('sales_income') - getVariable('sales_costs');
    setVariable(gross_profit, e.type);
    document.dispatchEvent(new Event('gross_margin'));
    document.dispatchEvent(new Event('proportion_expenses_sales'));
});

document.addEventListener('gross_margin', (e) => {
    const gross_margin = getVariable('gross_profit') / getVariable('sales_income');
    setVariable(gross_margin, e.type);
});


document.addEventListener('operating_profit', (e) => {
    const operating_expenses = arraySum([
        getVariable('administrative_expenses'),
        getVariable('salary'),
        getVariable('wages'),
        getVariable('sales_commissions'),
        getVariable('advertising_marketing'),
        getVariable('transport_fuel'),
        getVariable('web_services'),
        getVariable('stationery'),
        getVariable('period_depreciation'),
        getVariable('other')
    ]);
    const operating_profit = getVariable('gross_profit') - operating_expenses;
    setVariable(operating_profit, e.type);
    document.dispatchEvent(new Event('operating_margin'));
    document.dispatchEvent(new Event('proportion_expenses_sales'));
    document.dispatchEvent(new Event('fixed_expenses'));
});

document.addEventListener('operating_margin', (e) => {
    const operating_margin = getVariable('operating_profit') / getVariable('sales_income');
    setVariable(operating_margin, e.type);
});


document.addEventListener('pretax_profit', (e) => {
    const pretax_profit = getVariable('operating_profit') - getVariable('credit_interests');
    setVariable(pretax_profit, e.type);
    document.dispatchEvent(new Event('pretax_margin'));
});

document.addEventListener('pretax_margin', (e) => {
    const pretax_margin = getVariable('pretax_profit') / getVariable('sales_income');
    setVariable(pretax_margin, e.type);
});

document.addEventListener('net_profit', (e) => {
    const net_profit = getVariable('pretax_profit') - getVariable('taxes');
    setVariable(net_profit, e.type);
    setVariable(net_profit, 'retained_earnings');
    document.dispatchEvent(new Event('net_margin'));
});

document.addEventListener('net_margin', (e) => {
    const net_margin = getVariable('net_profit') / getVariable('sales_income');
    setVariable(net_margin, e.type);
});

document.addEventListener('proportion_expenses_sales', (e) => {
    const variable_expenses = arraySum([
        getVariable('sales_costs'),
        getVariable('sales_commissions'),
        getVariable('advertising_marketing')
    ]);
    const proportion_expenses_sales = variable_expenses / getVariable('sales_income');
    setVariable(proportion_expenses_sales, e.type);
    document.dispatchEvent(new Event('balance_point'));
});

document.addEventListener('fixed_expenses', (e) => {
    const fixed_expenses = arraySum([
        getVariable('administrative_expenses'),
        getVariable('wages'),
        getVariable('transport_fuel'),
        getVariable('web_services'),
        getVariable('stationery'),
        getVariable('period_depreciation'),
        getVariable('other')
    ]);
    setVariable(fixed_expenses, e.type);
    document.dispatchEvent(new Event('balance_point'));
});

document.addEventListener('balance_point', (e) => {
    const balance_point = getVariable('fixed_expenses') / (1.0 - getVariable('proportion_expenses_sales'));
    setVariable(balance_point, e.type);
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
