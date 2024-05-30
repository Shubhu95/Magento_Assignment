define([
    'jquery',
    'ko',
    'uiComponent',
    'Magento_Checkout/js/model/quote'
], function ($, ko, Component, quote) { 'use strict';

    return Component.extend({
        defaults: {
            template: 'Adecco_Checkout/shipment-receive'
        },
        selectedOption: ko.observable('home'),
        initialize: function () {
            this._super();
        },
        onClickRadio: function(option) {

            this.selectedOption(option);
            if (quote) {
                quote.shippingAddress().extensionAttributes = {
                    shipment_receive: option
                };
            }
        }
    });
});