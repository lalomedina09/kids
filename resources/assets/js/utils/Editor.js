import { _CSRF } from '@/utils/Constants';

const init = (selector) => {
    tinymce.init({
        selector: selector,
        plugins: [
            'advlist autolink autosave charmap code directionality fullscreen',
            'hr image insertdatetime link lists media nonbreaking paste preview print',
            'save searchreplace table visualblocks visualchars wordcount'
        ],
        toolbar1: 'undo redo | print preview code | link image media table | styleselect | removeformat',
        toolbar2: 'bold italic underline strikethrough superscript subscript blockquote | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | forecolor backcolor',
        table_toolbar: 'tableprops tabledelete | tableinsertrowbefore tableinsertrowafter tabledeleterow | tableinsertcolbefore tableinsertcolafter tabledeletecol',
        relative_urls: false,
        image_advtab: true,
        images_upload_url: '/dashboard/uploads/images?_token=' + _CSRF,
        automatic_uploads: false,
        images_upload_credentials: true,
        extended_valid_elements: "a[class|name|href|target|title|onclick|rel],script[type|src],iframe[src|style|width|height|scrolling|marginwidth|marginheight|frameborder],img[class|src|border=0|alt|title|hspace|vspace|width|height|align|onmouseover|onmouseout|name|style]",
        allow_conditional_comments: false,
        browser_spellcheck: true,
        language: 'es_MX',
        paste_data_images: false,
        content_css: '/css/editor.css',
        color_map: [
            '#FF6161', 'Light Red',
            '#4FD7DB', 'Blue',
            '#262525', 'Dark',
            '#9B9B9B', 'Gray',
            '#D8D8D8', 'Light',
            '#FFFFFF', 'White'
        ],
        setup: (editor) => {
            editor.on('change', () => {
                editor.save();
            });
        }
    });
};

export default init;
