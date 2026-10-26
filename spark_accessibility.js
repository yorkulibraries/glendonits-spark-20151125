/* The centrally injected cookie notice must not cover keyboard focus. */
(function () {
    'use strict';
    var banner;
    var bannerObserver;
    var resizeObserver;
    var bannerTop = window.innerHeight;

    function updateBannerSpace() {
        var current = document.querySelector('.cky-consent-container.cky-classic-bottom');
        if (current !== banner) {
            if (bannerObserver) bannerObserver.disconnect();
            if (resizeObserver) resizeObserver.disconnect();
            banner = current;
            if (banner) {
                bannerObserver = new MutationObserver(updateBannerSpace);
                bannerObserver.observe(banner, { attributes: true, attributeFilter: ['class', 'style', 'hidden'] });
                if (window.ResizeObserver) {
                    resizeObserver = new ResizeObserver(updateBannerSpace);
                    resizeObserver.observe(banner);
                }
            }
        }
        var height = 0;
        bannerTop = window.innerHeight;
        if (banner) {
            var style = window.getComputedStyle(banner);
            var rect = banner.getBoundingClientRect();
            if (style.position === 'fixed' && style.display !== 'none' && style.visibility !== 'hidden' && rect.height > 0) {
                bannerTop = rect.top;
                height = Math.max(0, window.innerHeight - rect.top);
            }
        }
        document.documentElement.style.setProperty('--spark-consent-space', height + 'px');
    }

    updateBannerSpace();
    // The central script can inject the notice after the theme has loaded.
    new MutationObserver(updateBannerSpace).observe(document.body, { childList: true, subtree: true });
    window.addEventListener('resize', updateBannerSpace);
    document.addEventListener('focusin', function (event) {
        var target = event.target;
        window.requestAnimationFrame(function () {
            updateBannerSpace();
            if (banner && !banner.contains(target) && target.getBoundingClientRect().bottom + 8 > bannerTop) {
                target.scrollIntoView({ block: 'center', inline: 'nearest' });
            }
        });
    });
}());
