import { bindEvent } from '@/utils/BindEvents';

const setActiveSection = (hash) => {
    const $tab = document.querySelector(`a[href="${hash}"]`);
    if (!$tab) return;

    const $tab_pane = document.querySelector(hash);
    if (!$tab_pane) return;

    for (const $sibling of $tab.parentNode.children) {
        $sibling.classList.remove('active');
    }
    $tab.classList.add('active');

    for (const $sibling of $tab_pane.parentNode.children) {
        $sibling.classList.remove('active');
    }
    $tab_pane.classList.add('active');

    window.scroll();
};

const extractHashes = () => {
    const hash = window.location.hash;
    if (!hash) return;

    if (hash.includes(',')) {
        const hashes = hash.substring(1).split(',').map((hash) => `#${hash}`);
        for (const hash of hashes) {
            setActiveSection(hash);
        }
    } else {
        setActiveSection(hash);
    }
};

const onhashchange = (event) => {
    extractHashes();
};

const updateUrlHash = (event, $target) => {
    const hash = $target.getAttribute('href');
    window.location.hash = hash;
};

const init = () => {
    bindEvent('click', 'a[data-toggle="tab"]', updateUrlHash)
    window.onhashchange = onhashchange;
    extractHashes();
};

export default init;
