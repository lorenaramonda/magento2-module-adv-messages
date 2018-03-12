define([
    "jquery",
    "mage/cookies",
    "domReady!"

], function($) {
    "use strict";

    $.widget('loreena.advmessages', {

        /**
         * @private
         */

        _init: function() {

            var $widget   = this,
                headerFoldable  = this.options.headerFoldable,
                headerCookie    = 'advmessages-header';

            if ( this._isCookieSet(headerCookie) !== true)  {
                $widget.element.removeAttr('style');
            }

            if (headerFoldable) {
                $widget.element.find('button[data-type="close"]').click( function() {
                    $widget._closeBanner($widget.element, headerCookie)
                });
            }

        },

        /**
         * Close banner and set cookie
         *
         * @param cookie
         * @private
         */

        _closeBanner: function (el, cookie) {

            el.find('button[data-type="close"]').parents('.adv-message-header').slideUp();
            if ( this._isCookieSet(cookie) !== true)  {
                this._setCookie(cookie);
            }

        },

        /**
         * Set cookie
         *
         * @param cookie
         * @private
         */

        _setCookie: function (cookie) {
            $.mage.cookies.set(cookie, 'closed',
                {lifetime: 342342342342});
        },

        /**
         * Check if cookie is set
         *
         * @param cookie
         * @returns {boolean}
         * @private
         */

        _isCookieSet: function (cookie) {
            if ($.mage.cookies.get(cookie) === 'closed') {
                return true;
            }
        }

    });

    return $.loreena.advmessages;
});
