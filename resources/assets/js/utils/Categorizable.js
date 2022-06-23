import { _HOST, _TOKEN } from '@/utils/Constants';
import { bindEventToNode } from '@/utils/BindEvents';

const init = (categories_selector, subcategories_selector) => {
    const $categories = document.querySelector(categories_selector);
    const $subcategories = document.querySelector(subcategories_selector);
    const selected_subcategory = $subcategories.dataset.selected;

    const api_endpoint = `${_HOST}api/v1/categories`;
    const api_config = {
        headers: {
            Authorization: `Bearer ${_TOKEN}`
        }
    };

    const setSubcategories = (response) => {
        const subcategories = response.data.children;
        if (subcategories.length <= 0) {
            return
        }

        for (const subcategory of subcategories) {
            let $option = document.createElement('option');
            $option.value = subcategory.id;
            $option.innerHTML = subcategory.name;
            $subcategories.appendChild($option);
        }

        if (selected_subcategory) {
            $subcategories.value = selected_subcategory;
        }

        $subcategories.disabled = false;
    };

    const listener = async () => {
        $subcategories.disabled = true;
        while ($subcategories.firstChild) $subcategories.removeChild($subcategories.firstChild)
        const selected_category = $categories.selectedOptions[0].value;
        try {
            const response = await axios.get(`${api_endpoint}/${selected_category}`, api_config);
            setSubcategories(response.data);
        } catch (error) {
            const es = error.toString();
        }
    };

    // Bind events
    bindEventToNode('change', $categories, listener)

    // Init
    listener();
};

export default init;
