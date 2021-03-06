/*!
 * Piwik - free/libre analytics platform
 *
 * @link http://piwik.org
 * @license http://www.gnu.org/licenses/gpl-3.0.html GPL v3 or later
 */
function initTopControls() {
    function getOverlap(element1, element2)
    {
        if (!element1 || !element1.getBoundingClientRect || !element2 || !element2.getBoundingClientRect) {
            return 0;
        }

        var rect1 = element1.getBoundingClientRect();
        var rect2 = element2.getBoundingClientRect();

        var doOverlap = !(rect1.right < rect2.left || rect1.left > rect2.right);

        if (doOverlap) {
            return rect1.left - rect2.right;
        }

        return 0;
    }

    var $topControlsContainer = $('.top_controls'),
        left = 0;

    var allRendered = true;

    if ($topControlsContainer.length) {
        $('.piwikTopControl').each(function () {
            var $control = $(this);
            if ($control.css('display') == 'none') {
                return;
            }

            $control.css('left', left);
            var width = $control.outerWidth(true);

            var isControlFullyRendered = width >= 30;
            if (!isControlFullyRendered) {
                allRendered = false;
            }

            left += width;
        });

        if (allRendered) {
            // we make top controls visible only after all selectors are rendered
            $('.top_controls').css('visibility', 'visible');
            $('.top_controls').css('opacity', '1');
        }

        var header = $('#header_message.isPiwikDemo');
        if (header.length) {
            // make sure isPiwikDemo message is always fully visible, move it to the right if needed
            var lastSelector = $('.top_controls .piwikTopControl:last');

            var overlap = getOverlap(header[0], lastSelector[0]);
            if (header[0] !== lastSelector[0] && overlap !== 0) {
                header.css('right', (Math.abs(overlap) + 18) * -1);
            }
        }

    }
}