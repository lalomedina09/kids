import { bindEventToNode } from '@/utils/BindEvents';
import { _HOST } from '@/utils/Constants';

const init = (zipcode_selector, settlements_selector = null, municipality_selector = null, state_selector = null) => {
    const api_endpoint = `${_HOST}api/v1/zipcodes`;

    const $zipcode = document.querySelector(zipcode_selector);
    if (!$zipcode) return;

    const $settlements = document.querySelector(settlements_selector);
    if (!$settlements) return;

    const $municipality = document.querySelector(municipality_selector);
    if (!$municipality) return;

    const $state = document.querySelector(state_selector);
    if (!$state) return;

    const selected_settlement = $settlements.dataset.selected;

    const clean = () => {
        while ($settlements.firstChild) $settlements.removeChild($settlements.firstChild)
        $municipality.value = '';
        $state.value = '';
    };

    const setSettlements = (settlements) => {
        if (settlements.length <= 0) {
            return;
        }

        for (const settlement_id in settlements) {
            let $option = document.createElement('option');
            $option.value = settlement_id;
            $option.innerHTML = settlements[settlement_id];
            $settlements.appendChild($option);
        }

        if (selected_settlement) {
            $settlements.value = selected_settlement;
        }
    };

    const setResponse = (data) => {
        $municipality.value = data.municipality;
        $state.value = data.state;
        setSettlements(data.settlements);
    };

    const request = async (zipcode) => {
        try {
            const response = await axios.get(`${api_endpoint}/${zipcode}`);
            setResponse(response.data.data.result);
        } catch (error) {
            const _ = error.toString();
        }
    };

    const resolve = ($field) => {
        const zipcode = $field.value;
        if (zipcode.length === 5) {
            request(zipcode);
        } else {
            clean();
        }
    };

    bindEventToNode('keyup', $zipcode, (event, $target) => {
        resolve($target);
    });

    bindEventToNode('change', $zipcode, (event, $target) => {
        resolve($target);
    });

    resolve($zipcode);
};

export default init;
