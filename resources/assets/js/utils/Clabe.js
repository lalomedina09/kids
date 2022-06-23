import { bindEventToNode } from '@/utils/BindEvents';

import clabe from 'clabe-validator';

const init = (clabe_selector, bank_selector=null, account_selector=null) => {
    const $clabe = document.querySelector(clabe_selector);
    if (!$clabe) return;

    const $bank = document.querySelector(bank_selector);
    const $account = document.querySelector(account_selector);

    const resolve = ($field) => {
        const value = $field.value;
        if (value.length != 18) {
            $bank.value = '';
            $account.value = '';
            return;
        }

        const validation = clabe.validate(value);
        if (!validation.ok) {
            return;
        }

        $bank.value = validation.tag;
        $account.value = validation.account;
    };

    bindEventToNode('keyup', $clabe, (event, $target) => {
        resolve($target);
    });

    bindEventToNode('change', $clabe, (event, $target) => {
        resolve($target);
    });

    resolve($clabe);
};

export default init;
