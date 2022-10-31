/**
 * Override the default yii confirm dialog. This function is
 * called by yii when a confirmation is requested.
 * This overides to use the sweetalert2 javascript library.
 * @param message the message to display
 * @param okCallback triggered when confirmation is true
 * @param cancelCallback callback triggered when cancelled
 *
 *
 * make sure you add the override.js file to your main AppAsset.php file
 */

(function () {
    "use strict";
    yii.confirm = function (message, okCallback, cancelCallback) {
        Swal.fire({
            icon: 'warning',
            html: message,
            showCancelButton: true,
            reverseButtons: true,
            showConfirmButton: true,
            confirmButtonColor: '#dc3545',
        }).then(function (selection) {
            if (selection.isConfirmed) {
                !okCallback || okCallback();
            }else{
                !cancelCallback || cancelCallback();
            }
        });
    };
})();