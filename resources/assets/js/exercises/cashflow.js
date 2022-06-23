import initBindVariables, { getVariable, setVariable, getVariables } from '@/utils/BindVariables';
import { nodeToForm } from '@/utils/ButtonForm';

const arraySum = (arr) => arr.reduce((accumulator, value) => accumulator + value);

initBindVariables();

document.addEventListener('operational_cash_flow', (e) => {
    const income = arraySum([
        getVariable('current_month_sales_income'),
        getVariable('past_months_sales_income'),
    ]);
    const outcome = arraySum([
        getVariable('inventory_outcome'),
        getVariable('other_purchases_outcome'),
        getVariable('administrative_operational_outcome'),
        getVariable('taxes_outcome'),
    ]);
    const result = income - outcome;
    setVariable(result, e.type);
    document.dispatchEvent(new Event('total_cash_flow'));
});

document.addEventListener('reinvestment_cash_flow', (e) => {
    const result = getVariable('assets_sales_income') - getVariable('long_term_assets_purchases_outcome');
    setVariable(result, e.type);
    document.dispatchEvent(new Event('total_cash_flow'));
});

document.addEventListener('funding_cash_flow', (e) => {
    const income = arraySum([
        getVariable('injected_capital_income'),
        getVariable('bank_loans_income'),
    ]);
    const outcome = arraySum([
        getVariable('dividends_payments_outcome'),
        getVariable('loans_repayment_outcome'),
    ]);
    const result = income - outcome;
    setVariable(result, e.type);
    document.dispatchEvent(new Event('total_cash_flow'));
});

document.addEventListener('total_cash_flow', (e) => {
    const result = arraySum([
        getVariable('operational_cash_flow'),
        getVariable('reinvestment_cash_flow'),
        getVariable('funding_cash_flow')
    ]);
    setVariable(result, e.type);
    setVariable(result, 'period_cash_movements');
    document.dispatchEvent(new Event('period_final_cash'));
});

document.addEventListener('period_final_cash', (e) => {
    const result = arraySum([
        getVariable('beginning_period_cash'),
        getVariable('period_cash_movements'),
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
