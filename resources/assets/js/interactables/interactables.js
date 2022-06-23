import { bindEvent } from '@/utils/BindEvents';
import sendInteractableRequest from '@/utils/InteractableRequest';

bindEvent('click', '.like-interactable--trigger', (e) => {
    e.preventDefault();
    const $trigger = e.currentTarget;
    const $icon = $trigger.children[0];
    sendInteractableRequest($trigger, 'api/v1/likes', response => {
        const result = response.data.data.result;
        if (result) {
            $icon.classList.replace('fa-heart-o', 'fa-heart');
            $icon.classList.add('text-danger');
        } else {
            $icon.classList.replace('fa-heart', 'fa-heart-o');
            $icon.classList.remove('text-danger');
        }
    });
});

bindEvent('click', '.bookmark-interactable--trigger', (e) => {
    e.preventDefault();
    const $trigger = e.currentTarget;
    const $icon = $trigger.children[0];
    sendInteractableRequest($trigger, 'api/v1/bookmarks', response => {
        const result = response.data.data.result;
        if (result) {
            $icon.classList.replace('fa-bookmark-o', 'fa-bookmark');
            $icon.classList.add('text-danger');
        } else {
            $icon.classList.replace('fa-bookmark', 'fa-bookmark-o');
            $icon.classList.remove('text-danger');
        }
    });
});

bindEvent('click', '.bookmark-delete--trigger', (e) => {
    e.preventDefault();
    const $trigger = e.currentTarget;
    const $parent = $trigger.parentNode;
    sendInteractableRequest($trigger, 'api/v1/bookmarks', response => {
        const result = response.data.data.result;
        if (!result) {
            $parent.addEventListener('animationend', () => {
                $parent.remove();
            });
            $parent.classList.add('animated', 'fadeOut')
        }
    });
});

bindEvent('click', '.featured__submenu-socials--trigger', (e) => {
    e.preventDefault();
    $(e.currentTarget.nextElementSibling).toggleClass('active');
});

//save-article--trigger
//delete-article--trigger
