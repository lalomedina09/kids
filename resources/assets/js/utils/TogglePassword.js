import { bindEvent } from '@/utils/BindEvents'

const init = (checkbox_selector, field_selectors) => {

    bindEvent('change', checkbox_selector, (e, t) => {
        for (const field_selector of field_selectors) {
            const $field = document.querySelector(field_selector);
            $field.type = (t.checked) ? 'text' : 'password';
        }
    });

};

export default init;
