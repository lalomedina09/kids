import ScrollMagic from 'scrollmagic';

const controller = new ScrollMagic.Controller();

const newScrollScene = (trigger_element, custom={}) => {
    let base_options = {
        triggerElement: trigger_element,
        triggerHook: 0.9,
        duration: "80%",
        offset: 50
    };
    return new ScrollMagic.Scene({ ...base_options, ...custom });
};

const _scrollToggleClass = (trigger_element, animation_params) => {
    const scene = newScrollScene(trigger_element);

    scene
        .setClassToggle(trigger_element, animation_params.shift())
        .addTo(controller);
};

const _visible = ($node, animation_params) => {
    const visibility = $node.style.visibility;
    $node.style.visibility = 'hidden';

    const scene = newScrollScene($node);
    scene
        .addTo(controller)
        .on('enter', (e) => {
            $node.classList.add('animated', ...animation_params);
            $node.style.visibility = visibility;
        })
        .on('leave', (e) => {
            $node.classList.remove('animated', ...animation_params);
            $node.style.visibility = 'hidden';
        });
};

const _visibleOnce = ($node, animation_params) => {
    const visibility = $node.style.visibility;
    $node.style.visibility = 'hidden';

    const scene = newScrollScene($node, {
        reverse: false
    });
    scene
        .addTo(controller)
        .on('enter', (e) => {
            $node.classList.add('animated', ...animation_params);
            $node.style.visibility = visibility;
        });
};

const animate = {
    scrollToggleClass: _scrollToggleClass,
    visible: _visible,
    visibleOnce: _visibleOnce,
};

const bindAnimation = ($node, fn) => {
    if (!fn in animate) {
        console.warn(`Animate [${fn}] does not exist`);
        return;
    }

    const animation = $node.dataset.animation;
    if (!animation) {
        console.warn('Animation data not found');
        return;
    }

    animate[fn]($node, animation.split(' '));
};

const init = () => {
    const animables = document.querySelectorAll('[data-animate]');
    if (!animables.length) return;

    animables.forEach(($element) => {
        bindAnimation($element, $element.dataset.animate);
    });
};

export default init;
