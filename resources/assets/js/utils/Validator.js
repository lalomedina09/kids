import clabe from 'clabe-validator';

$.validator.addMethod(
    'whitespaces',
    (value, element) => {
        return value.indexOf(' ') < 0 && value != '';
    },
    __('Blank spaces are not allowed')
);

$.validator.addMethod(
    'alpha_dash',
    (value, element) => {
        const regex = new RegExp('^[a-zA-Z0-9_-]+$');
        return value.match(regex);
    },
    __('Only letters, numbers, hyphen and underscore are allowed')
);

$.validator.addMethod(
    'clabe',
    (value, element) => {
        const validation = clabe.validate(value);
        return validation.ok;
    },
    __('CLABE is invalid')
);

$.validator.addMethod(
    'selected',
    (value, element) => {
        return !!value;
    },
    __('Select a valid option')
);

$.validator.setDefaults({
    ignore: false,
    errorElement: 'span',
    errorClass: 'is-invalid small text-danger',
    validClass: 'is-valid'
});

const error_placement = {
    default: (error, element) => {
        let $parent = $(element).parent();
        while (!$parent.hasClass('form-group')) {
            $parent = $parent.parent();
            if ($parent.get(0) == null) {
                $parent = $(element).parent();
                break;
            }
        }
        $parent.append(error);
    },
    group: (error, element) => {
        let $parent = $(element).parent();
        if ($parent.hasClass('input-group')) {
            $parent.parent().append(error);
        } else if ($parent.is('label')) {
            $parent
                .parent()
                .parent()
                .append(error);
        } else {
            $parent.append(error);
        }
    },
    twoLevel: (error, element) => {
        $(element)
            .parent()
            .parent()
            .append(error);
    },
    file: (error, element) => {
        let $parent = $(element).parent();
        if ($(element).attr('type') == 'file') {
            $parent
                .parent()
                .parent()
                .parent()
                .append(error);
        } else {
            if ($parent.hasClass('input-group')) {
                $parent.parent().append(error);
            } else {
                $parent.append(error);
            }
        }
    }
};

const highlight = {
    default: (element, errorClass, validClass) => {
        $(element)
            .removeClass(validClass)
            .addClass(errorClass);
    },
    twoLevel: (element, errorClass, validClass) => {
        let $parent = $(element).parent();
        if ($parent.hasClass('input-group')) {
            $parent
                .parent()
                .children()
                .removeClass(validClass)
                .removeClass(errorClass);
        }
        $parent
            .children()
            .removeClass(validClass)
            .addClass(errorClass);
    },
    none: (element, errorClass, validClass) => { }
};

const unhighlight = {
    default: (element, errorClass, validClass) => {
        $(element)
            .removeClass(errorClass)
            .addClass(validClass);
        $(element)
            .parent()
            .children('span.' + errorClass)
            .remove();
    },
    twoLevel: (element, errorClass, validClass) => {
        let $parent = $(element).parent();
        if ($parent.hasClass('input-group')) {
            $parent
                .children()
                .removeClass(errorClass)
                .removeClass(validClass);
        }
        $parent
            .children()
            .removeClass(errorClass)
            .addClass(validClass);
        $parent
            .parent()
            .children('span.' + errorClass)
            .remove();
    },
    none: (element, errorClass, validClass) => { }
};

const invalid_handler = (e, validator) => {
    toastr.error(__('There are errors in the validation of the fields'));
};

const submit_handler = ($form) => {
    $('button[type="submit"]').attr('disabled', true);
    $form.submit();
};

const init = (form_selector, rules, messages = {}, options = {}) => {
    const forms = $(form_selector);
    const forms_count = forms.length;
    if (forms_count <= 0) {
        console.warn(`Form [${form_selector}] does not exist`);
        return;
    }

    const config = {
        rules: rules,
        messages: messages,
        errorPlacement: options.error_placement || error_placement.default,
        highlight: options.highlight || highlight.default,
        unhighlight: options.unhighlight || unhighlight.default,
        invalidHandler: options.invalid_handler || invalid_handler,
        submitHandler: options.submit_handler || submit_handler,
        ignore: options.ignore || ':hidden'
    };

    try {
        let results = [];
        forms.each((index, form) => {
            const result = $(form).validate(config);
            results.push(result);
        });
        return forms_count > 1 ? results : results.shift();
    } catch (e) {
        console.error(e);
        return e;
    }
};

export default init;
