/**
 * Add Shipment Receive option on checkout shipping address
 *
 * @category: Magento
 * @package: Adecco\Checkout
 * @copyright: Copyright © 2024 Magento, Inc. All rights reserved.
 * @author: Shubham Lade <shubham.lade95@gmail.com>
 * @keywords: Module Adecco_Checkout
 */

var config = {
    config: {
        mixins: {
            'Magento_Checkout/js/action/set-shipping-information': {
                'Adecco_Checkout/js/action/set-shipping-information-mixin': true
            }
        }
    }
};