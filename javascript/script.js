/**
 * The JavaScript code you place here will be processed by esbuild, and the
 * output file will be created at `../theme/js/script.min.js` and enqueued in
 * `../theme/functions.php`.
 *
 * For esbuild documentation, please see:
 * https://esbuild.github.io/
 */

window.openMobileMenu = function () {
    document.getElementById('mobile-menu').style.display = 'block';
}

window.closeMobileMenu = function () {
    document.getElementById('mobile-menu').style.display = 'none';
}
