const bindEventToNode = (event_name, node, callback) => {
    node.addEventListener(event_name, (event) => {
        callback(event, event.currentTarget);
    });
};

const bindEvent = (event_name, element_selector, callback) => {
    document
        .querySelectorAll(element_selector)
        .forEach((node) => bindEventToNode(event_name, node, callback));
};

const bindLiveEvent = (event_name, element_selector, callback) => {
    document
        .querySelector('body')
        .addEventListener(event_name, event => {
            let target = event.target;
            while (target != null) {
                if (target.matches(element_selector)) {
                    callback(event, target);
                }
                target = target.parentElement;
            }
        }, true);
};

export { bindEvent, bindLiveEvent, bindEventToNode };
