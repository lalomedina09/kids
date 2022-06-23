import initBindVariables, { getVariable, setVariable, getVariables } from '@/utils/BindVariables';
import { nodeToForm } from '@/utils/ButtonForm';

const arraySum = (arr) => arr.reduce((accumulator, value) => accumulator + value);

initBindVariables();

document.addEventListener('assets.short.subtotal', (e) => {
    const result = arraySum([
        getVariable('assets.short.accounts'),
        getVariable('assets.short.cash'),
        getVariable('assets.short.inventory'),
        getVariable('assets.short.other')
    ]);
    setVariable(result, e.type);
    document.dispatchEvent(new Event('assets.total'));
    document.dispatchEvent(new Event('diff'));
});

document.addEventListener('assets.long.subtotal', (e) => {
    const result = arraySum([
        getVariable('assets.long.depreciation'),
        getVariable('assets.long.equipment'),
        getVariable('assets.long.other')
    ]);
    setVariable(result, e.type);
    document.dispatchEvent(new Event('assets.total'));
});

document.addEventListener('assets.total', (e) => {
    const result = arraySum([
        getVariable('assets.short.subtotal'),
        getVariable('assets.long.subtotal'),
    ]);
    setVariable(result, e.type);
    document.dispatchEvent(new Event('indebtedness'));
    document.dispatchEvent(new Event('balance'));
});


document.addEventListener('liabilities.short.subtotal', (e) => {
    const result = arraySum([
        getVariable('liabilities.short.credit'),
        getVariable('liabilities.short.other'),
        getVariable('liabilities.short.prepayment'),
        getVariable('liabilities.short.providers')
    ]);
    setVariable(result, e.type);
    document.dispatchEvent(new Event('liabilities.total'));
    document.dispatchEvent(new Event('diff'));
});

document.addEventListener('liabilities.long.subtotal', (e) => {
    const result = arraySum([
        getVariable('liabilities.long.credit'),
        getVariable('liabilities.long.other')
    ]);
    setVariable(result, e.type);
    document.dispatchEvent(new Event('liabilities.total'));
});

document.addEventListener('liabilities.total', (e) => {
    const result = arraySum([
        getVariable('liabilities.short.subtotal'),
        getVariable('liabilities.long.subtotal')
    ]);
    setVariable(result, e.type);
    document.dispatchEvent(new Event('indebtedness'));
    document.dispatchEvent(new Event('balance'));
});

document.addEventListener('capital.total', (e) => {
    const result = arraySum([
        getVariable('capital.social'),
        getVariable('capital.stockpile'),
        getVariable('capital.utilities')
    ]);
    setVariable(result, e.type);
    document.dispatchEvent(new Event('balance'));
});

const postprocess = () => {
    const balance = (getVariable('assets.total') == (getVariable('liabilities.total') + getVariable('capital.total')));
    setVariable(balance, 'balance');
    const indebtedness = (getVariable('liabilities.short.credit') + getVariable('liabilities.long.credit')) / getVariable('assets.total');
    setVariable(indebtedness, 'indebtedness');
    const diff = getVariable('assets.short.subtotal') / getVariable('liabilities.short.subtotal');
    setVariable(diff, 'diff');
};

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
        postprocess();
        handle(event);
        return false;
    });
