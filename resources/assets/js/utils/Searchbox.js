import { _HOST, _TOKEN } from '@/utils/Constants';
import { bindEvent, bindLiveEvent } from '@/utils/BindEvents';

import insertTemplate from '@/utils/EJS';

import { loadTemplates } from '@/utils/EJS';
import templates from '@/templates';
loadTemplates(templates);

const init = (selector, responsePreprocessor) => {
    const $searchbox = document.querySelector(selector);
    if (!$searchbox) {
        console.warn(`Searchbox [${selector}] not found`);
        return;
    }

    const $input = document.querySelector(`${selector} .searchbox-input`);
    const $filter = document.querySelector(`${selector} .searchbox-filter`);
    const $selected = document.querySelector(`${selector} .searchbox-selected`);
    const $select = document.querySelector(`${selector} .searchbox-select`);

    const filter_option_selector = `${selector} .searchbox-filter-option`;
    const delete_item_button_selector = `${selector} .searchbox-selected .delete-item`;

    const popover_selector = `${selector}-popover`;
    const popover_results_selector = `${popover_selector} .searchbox-results`;
    const add_item_button_selector = `${popover_results_selector} .add-item`;

    const button_selector = `${selector} .searchbox-button`;
    const $button = document.querySelector(button_selector);
    const $popover = $(button_selector);

    const resource = $searchbox.dataset.resource;
    const limit = $searchbox.dataset.limit;

    const api_endpoint = `${_HOST}api/v1/${resource}`;
    const api_config = {
        headers: {
            Authorization: `Bearer ${_TOKEN}`
        }
    };

    responsePreprocessor = responsePreprocessor || function (r) { return r.data.data.data; };

    let filters = { key: 'name', q: '' };
    let selected_items = [];

    const checkLimit = () => (limit < 1) ? true : (selected_items.length < limit);

    const setSearchResults = (response, message) => {
        $popover.popover('show');

        const data = responsePreprocessor(response);
        const length = data.length;

        const $results = document.querySelector(popover_results_selector);
        while ($results.firstChild) $results.removeChild($results.firstChild)

        if (length > 0) {
            for (const datum of data) {
                insertTemplate('searchbox_card', datum, $results);
            }
            $input.value = '';
        } else {
            const $message = document.createElement('li');
            $message.classList = 'list-group-item';
            $message.innerHTML = message || __('Your search did not return any results');
            $results.appendChild($message);
        }
    };

    const toggleLock = () => {
        if (checkLimit()) {
            $button.removeAttribute('disabled');
            $input.removeAttribute('disabled');
        } else {
            $button.setAttribute('disabled', 'disabled');
            $input.setAttribute('disabled', 'disabled');
        }
    };

    const setFilter = ($option) => {
        filters.key = $option.dataset.filter;
        $filter.innerHTML = $option.innerHTML;
    };

    const setItemBadge = (id, name) => {
        const $item = document.createElement('span');
        $item.classList = 'badge badge-pill badge-primary';
        $item.dataset.id = id;
        $item.dataset.name = name;
        $item.innerHTML = name;

        const $delete_button = document.createElement('span');
        $delete_button.classList = "fa fa-close delete-item";

        $item.appendChild($delete_button);
        $selected.appendChild($item);
    };

    const setItemOption = (id) => {
        const $option = document.createElement('option');
        $option.value = id;
        $option.setAttribute('selected', true);
        $select.appendChild($option);
    };

    const selectItem = (id, name) => {
        if (selected_items.indexOf(id) === -1 && checkLimit()) {
            setItemBadge(id, name);
            setItemOption(id);
            selected_items.push(id);
            toggleLock();
        }
    };

    const startSearch = async (e) => {
        e.preventDefault();
        if (checkLimit()) {
            return;
        }

        const query_string = $input.value;
        if (!query_string) {
            setSearchResults({ data: { data: { data: [] } } }, __('Enter one or more letters to start the search'));
            return;
        }

        filters.q = query_string;

        const params = qs.stringify({ filters: filters });
        try {
            const response = await axios.get(`${api_endpoint}?${params}`, api_config);
            setSearchResults(response)
        } catch (error) {
            const _ = error.toString();
            $popover.popover('hide');
        }
    };

    // Create popover
    $popover.popover({
        placement: 'bottom',
        html: true,
        trigger: 'manual',
        delay: {
            show: 500
        },
        content: () => {
            let $content = document.createElement('div');
            $content.className = 'list-group list-group-flush searchbox-results';
            return $content;
        },
        template: `<div class="popover"><div class="arrow"></div><div  id="${popover_selector.substr(1)}" class="popover-body searchbox"></div></div>`
    });

    // Register events
    $button.addEventListener('click', (e) => {
        e.preventDefault();
        startSearch(e);
        return false;
    });

    $input.addEventListener('keypress', (e) => {
        if (e.which == 13) {
            startSearch(e);
        }
    });

    bindEvent('click', filter_option_selector, (e) => {
        e.preventDefault();
        setFilter(e.currentTarget);
    });

    bindLiveEvent('click', add_item_button_selector, (e, $target) => {
        e.preventDefault();

        const id = $target.dataset.id;
        const name = $target.dataset.name;
        selectItem(id, name);

        $popover.popover('hide');

        return false;
    });

    bindLiveEvent('click', delete_item_button_selector, (e, $target) => {
        const $parent = $target.parentNode;
        const id = $parent.dataset.id;

        const item = selected_items.indexOf(id);
        selected_items.splice(item, 1);

        const $option = $select.querySelector(`option[value="${id}"]`);
        $option.parentNode.removeChild($option);
        $parent.parentNode.removeChild($parent);

        toggleLock();
    });

    // Set selected options
    (() => {
        const options = $select.selectedOptions;
        if (options.length <= 0) {
            return;
        }

        for (const $option of options) {
            const id = +$option.value;
            const name = $option.innerText;
            setItemBadge(id, name);
            selected_items.push(id);
            toggleLock();
        }
    })();
};

export default init;
