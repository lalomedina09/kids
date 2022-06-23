/*
    Example anchor markup
    <a href="{{ route('this.is.the.route', [$p1, $p2]) }}"
        class="classes"
        data-method="delete|patch|post|put"
        data-token="{{ csrf_token() }} "
        data-confirm="@lang('Message from locale')">

    <button class="classes"
        data-action="{{ route('this.is.the.route', [$p1, $p2]) }}"
        data-method="delete|patch|post|put"
        data-token="{{ csrf_token() }} "
        data-confirm="@lang('Message from locale')">
*/

const nodeToForm = ($node) => {
    const http_method = $node.dataset.method;
    if (!['patch', 'post', 'put', 'delete'].includes(http_method)) {
        return;
    }

    const confirm_message = $node.dataset.confirm;
    if (confirm_message && !confirm(confirm_message)) {
        return false;
    }

    let $form = document.createElement('form');
    $form.method = 'POST';
    $form.action = ($node.hasAttribute('href')) ? $node.getAttribute('href') : (
        ('action' in $node.dataset) ? $node.dataset.action : '/'
    );

    let $token = document.createElement('input');
    $token.type = 'hidden';
    $token.name = '_token';
    $token.value = $node.dataset.token;

    let $method = document.createElement('input');
    $method.type = 'hidden';
    $method.name = '_method';
    $method.value = $node.dataset.method;

    $form.appendChild($token);
    $form.appendChild($method);

    return $form;
};

const handle = (event) => {
    const $node = event.currentTarget;
    const $form = nodeToForm($node);
    document.body.appendChild($form);
    $form.submit();
};

const init = () => {
    document
        .querySelectorAll('a[data-method]')
        .forEach((anchor) => {
            anchor.addEventListener('click', (event) => {
                event.preventDefault();
                event.stopPropagation();
                handle(event);
                return false;
            });
        });
};

export default init;
export { nodeToForm };
