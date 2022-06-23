const bind = ($el, trueClass, falseClass) => {
    const target_selector = $el.attr('href');
    const $target = $(target_selector);
    const children = $el.children('span');

    $target.on('show.bs.collapse', (e) => {
        e.stopPropagation();
        children.toggleClass(falseClass).toggleClass(trueClass);
    });

    $target.on('hide.bs.collapse', (e) => {
        e.stopPropagation();
        children.toggleClass(trueClass).toggleClass(falseClass);
    });
};

const init = (selector, trueClass, falseClass) => {
    const elements = $(selector);

    elements.each((key, element) => {
        const $el = $(element);
        bind($el, trueClass, falseClass);
    });
};

export default init;
