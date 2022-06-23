const init = (selector, format) => {
    const inputs = document.querySelectorAll(selector);
    if (inputs.length <= 0) {
        return;
    }

    const options = {
        format: format,
        icons: {
            time: "fa fa-clock-o",
            date: "fa fa-calendar",
            up: "fa fa-chevron-up",
            down: "fa fa-chevron-down"
        }
    };

    inputs.forEach(($element) => {
        const $input = $($element);
        const date = moment($input.val(), options.format);
        options.date = date.isValid() ? date.toDate() : null;
        $input.datetimepicker(options);
    });
};

export default init;
