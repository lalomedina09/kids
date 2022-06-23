import { bindEventToNode } from '@/utils/BindEvents';

const fullmodals = [];

const hideAll = () => {
    fullmodals.forEach(($fullmodal) => {
        if ($fullmodal.classList.contains('active')) {
            $fullmodal.classList.remove('active', 'animated', 'fadeInRight');
        }
    });
    if (document.documentElement.classList.contains('overflow-hidden')) {
        document.documentElement.classList.remove('overflow-hidden');
    }
    if (document.body.classList.contains('overflow-hidden')) {
        document.body.classList.remove('overflow-hidden');
    }
};

const bindFullModal = ($element) => {
    const full_modal_selector = $element.dataset.fullmodal;
    const $fullmodal = document.querySelector(full_modal_selector);
    if (!$fullmodal) return;

    fullmodals.push($fullmodal);

    const show = () => {
        if (!$fullmodal.classList.contains('active')) {
            $fullmodal.classList.add('active', 'animated', 'fadeInRight');
        }
        if (!document.documentElement.classList.contains('overflow-hidden')) {
            document.documentElement.classList.add('overflow-hidden');
        }
        if (!document.body.classList.contains('overflow-hidden')) {
            document.body.classList.add('overflow-hidden');
        }
    };

    const hide = () => {
        if ($fullmodal.classList.contains('active')) {
            $fullmodal.classList.remove('active', 'animated', 'fadeInRight');
        }
        if (document.documentElement.classList.contains('overflow-hidden')) {
            document.documentElement.classList.remove('overflow-hidden');
        }
        if (document.body.classList.contains('overflow-hidden')) {
            document.body.classList.remove('overflow-hidden');
        }
    }

    bindEventToNode('click', $element, (e) => {
        show();
    });

    const $close = document.querySelector(`${full_modal_selector} .close`);
    if (!$close) return;
    bindEventToNode('click', $close, (e) => {
        hide();
    });
};

const init = () => {
    const fullmodals = document.querySelectorAll('[data-fullmodal]');
    if (!fullmodals.length) return;

    fullmodals.forEach(($element) => {
        bindFullModal($element);
    });

    document.addEventListener('keyup', (event) => {
        if (event.keyCode != 27) return;
        hideAll();
    });
};

export default init;
