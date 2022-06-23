import swal from 'sweetalert';
import { bindEventToNode } from '@/utils/BindEvents';

const nodes = {};
let variables = {};

const setFormat = (value, format='') => {
    switch (format) {
        case '$':
            return new Intl.NumberFormat('en-US', { style: 'currency', currency: 'USD' }).format(value);
        case '%':
            const v = (value * 100);
            const f = new Intl.NumberFormat('en-US', { style: 'decimal', maximumFractionDigits: '2' }).format(v);
            return f + '%';
        case '0':
            return new Intl.NumberFormat('en-US', { style: 'decimal', maximumFractionDigits: '2' }).format(value);
        default:
            return value;
    }
};

const hasVariable = (variable_name) => {
    return variable_name in variables;
};

const getVariable = (variable_name) => {
    return (hasVariable(variable_name)) ? variables[variable_name] : undefined;
};

const setVariable = (value, variable_name) => {
    const new_value = +value || 0;
    variables[variable_name] = new_value;
    if (variable_name in nodes) {
        const $node = nodes[variable_name];
        $node.dataset.value = new_value;
        const format_value = setFormat(new_value, $node.dataset.format);
        $node.innerHTML = format_value;
    }
};

const getVariables = () => {
    return variables;
};

const promptValue = ($target) => {
    const variable_name = $target.dataset.variable;
    const current_value = $target.dataset.value;
    const new_value = prompt(Lang.get('Update the value'), current_value) || current_value;

    if (Number.isNaN(+new_value)) {
        return false;
    }
    setVariable(new_value, variable_name);
    return true;
};

const mapVariable = ($node) => {
    const name = $node.dataset.variable;
    const value = $node.dataset.value;
    variables[name] = +value;
    nodes[name] = $node;
};

const bindMutable = ($node) => {
    bindEventToNode('click', $node, (event, $target) => {
        event.preventDefault();
        event.stopPropagation();
        if (promptValue($target) && $node.dataset.mutable != '') {
            document.dispatchEvent(new Event($node.dataset.mutable));
        }
    });
};

const init = () => {
    document.querySelectorAll('[data-variable]')
        .forEach(($node) => {
            mapVariable($node);
        });

    document.querySelectorAll('[data-mutable]')
        .forEach(($node) => {
            bindMutable($node);
        });
};

export default init;
export { hasVariable, getVariable, setVariable, getVariables };
