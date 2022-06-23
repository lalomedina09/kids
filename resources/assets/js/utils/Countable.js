import Countable from 'countable';

const init = selector => {
    const $input = document.querySelector(selector);
    if (!$input) {
        return;
    }

    const limit = $input.dataset.limit;
    let label = $input.dataset.label;
    if (!limit || !label) {
        return;
    }

    let $counter = document.createElement('span');
    $counter.classList = 'badge badge-secondary mr-1';
    $counter.innerText = limit;

    let $label = document.createElement('span');
    $label.classList = 'small';
    $label.innerText = __(label);

    let $container = document.createElement('div');
    $container.classList = 'float-right';

    $container.appendChild($counter);
    $container.appendChild($label);

    $input.parentNode.appendChild($container, $input);

    label = label !== 'words' ? 'all' : label;
    Countable.on($input, (counter) => {
        let count = limit - counter[label];
        if (count >= 0) {
            $counter.innerText = count;
            return;
        }

        $counter.innerText = '0';
        let text = $input.value;
        if (label === 'all') {
            text = text.substring(0, limit);
        } else {
            while (count < 0) {
                text = text.substring(0, text.lastIndexOf(' '));
                count++;
            }
        }
        $input.value = text;
    });
};

export default init;
