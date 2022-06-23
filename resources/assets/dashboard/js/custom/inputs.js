import initDatePicker from '@/utils/DatePicker';
import initEditor from '@/utils/Editor';
/*
 |--------------------------------------------------------------------------
 | Document Ready Function
 |--------------------------------------------------------------------------
 */
$(document).ready(function () {

    // WYSIWYG - TinyMCE
    initEditor('textarea.wysiwyg');

    /**
     * A datepicker for twitter bootstrap
     * @link https://github.com/eternicode/bootstrap-datepicker
     */
    initDatePicker('input[type="datetime"]', 'YYYY-MM-DD HH:mm:ss');
    initDatePicker('input[type="date"]', 'YYYY-MM-DD');

    /**
     * Initialize the upload file button when a '.custom-file-input' element is present.
     */
    if ($('.custom-file-input').length) {
        $('input:file.custom-file-input').change(function () {
            let $this = $(this);
            let filename = $this.val().split('\\').pop();

            if (filename.length) {
                $this.next('.custom-file-label').text(filename);
            } else {
                $this.next('.custom-file-label').text('');
            }
        });
    }
});
