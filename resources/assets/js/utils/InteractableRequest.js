import { _HOST, _TOKEN } from '@/utils/Constants';

const sendInteractableRequest = async ($trigger, endpoint, callback) => {
    const $interactable = $trigger.parentNode;

    if (!$interactable.hasAttribute('data-interactable')) {
        $('#login-modal').modal('show');
        return;
    }

    const params = {
        code: $interactable.dataset.interactable
    };

    const config = {
        headers: {
            Authorization: `Bearer ${_TOKEN}`,
            'Content-Type': 'application/x-www-form-urlencoded'
        }
    };

    try {
        const response = await axios.post(`${_HOST}/${endpoint}`, qs.stringify(params), config);
        callback(response);
    } catch (error) {
        const _ = error.toString();
    }

}

export default sendInteractableRequest;
