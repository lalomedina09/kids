let ejs_templates = {};

const loadTemplates = (new_templates) => {
    const extended_templates = { ...ejs_templates, ...new_templates };
    ejs_templates = extended_templates;
};

const htmlStringToNode = htmlString => {
    let template = document.createElement('template');
    template.innerHTML = htmlString;
    return template.content;
};

const insertTemplate = (template, data, container) => {
    if (!(template in ejs_templates)) {
        throw `[EJS] Template '${template}' does not exists.`;
    }

    const template_string = ejs_templates[template];
    const compiled_template_str = ejs.render(template_string, data);
    const compiled_template_node = htmlStringToNode(compiled_template_str);

    const $container = (container instanceof Node) ? container : document.querySelector(container);
    $container.appendChild(compiled_template_node);
};

export { loadTemplates };

export default insertTemplate;
