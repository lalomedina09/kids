<script id="fbq-track-ViewContent">
    fbq('track', 'ViewContent', {
        content_ids: ['51'],
        content_category: 'Cursos de Educación Financiera',
        content_name: 'Paquete de 3 cursos top Educacion Financiera',
        content_type: 'course'
    });
    document.getElementById('fbq-track-ViewContent').remove();
</script>

<script id="fbq-track-InitiateCheckout">
    (function () {
        if (!window.fbq) return;
        var btns = document.getElementsByClassName('btn-checkout');
        if (btns.length <= 0) return;
        for (var b = 0; b < btns.length; b++) {
            var $btn = btns[b];
            $btn.addEventListener('click', function (e) {
                fbq('track', 'InitiateCheckout', {
                    content_ids: ['51'],
                    content_category: 'Cursos de Educación Financiera',
                    content_name: 'Paquete de 3 cursos top Educacion Financiera',
                    content_type: 'course',
                    currency: 'MXN',
                    num_items: 1
                });
            });
        }
    }());
    document.getElementById('fbq-track-InitiateCheckout').remove();
</script>
