import { bindEventToNode } from '@/utils/BindEvents';

const captureOutbound = (url, target) => {
    gtag('event', 'click', {
        event_category: 'outbound',
        event_label: url,
        transport_type: 'beacon',
        event_callback: () => (target) ? window.open(url, target) : window.location.href = url
    });
};

const analyticsIsLoaded = () => {
    return (window.ga && ga.loaded);
};

const init = () => {
    if (!analyticsIsLoaded()) {
        return;
    }

    const regex = /[a-zA-Z0-9]*?.?queridodinero.(test|com)/gi;
    const anchors = document.getElementsByTagName('a');
    for (const anchor of anchors) {
        const href = anchor.href;
        if (href.match(regex)) {
            continue;
        }

        bindEventToNode('click', anchor, (e, event_target) => {
            e.preventDefault();
            const url = event_target.href;
            const anchor_target = (typeof (event_target.getAttribute('target')) == 'string') ? event_target.getAttribute('target') : false;
            captureOutbound(url, anchor_target);
        });
    }
};

export default init;
