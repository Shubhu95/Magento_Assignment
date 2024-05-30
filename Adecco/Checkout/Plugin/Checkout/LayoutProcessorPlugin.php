<?PHP
/**
 * Add Shipment Receive option on checkout shipping address
 *
 * @category: Magento
 * @package: Adecco\Checkout
 * @copyright: Copyright © 2024 Magento, Inc. All rights reserved.
 * @author: Shubham Lade <shubham.lade95@gmail.com>
 * @keywords: Module Adecco_Checkout
 */
declare(strict_types=1);

namespace Adecco\Checkout\Plugin\Checkout;

use Magento\Checkout\Block\Checkout\LayoutProcessorInterface;

class LayoutProcessorPlugin
{
    public function afterProcess(LayoutProcessorInterface $subject, $jsLayout)
    {
        // Add custom field to shipping address form
        $jsLayout['components']['checkout']['children']['steps']['children']['shipping-step']['children']
        ['shippingAddress']['children']['shipping-address-fieldset']['children']['shipment_receive'] = [
            'component' => 'Adecco_Checkout/js/view/shipment-receive',
            'provider' => 'checkoutProvider',
            'config' => [
                'customScope' => 'shippingAddress',
            ],
            'dataScope' => 'shippingAddress.shipment_receive',
            'label' => __('Shipment Receive'),
            'options' => [
                [
                    'value' => 'home',
                    'label' => __('Home')
                ],
                [
                    'value' => 'work',
                    'label' => __('Work')
                ],
                [
                    'value' => 'other',
                    'label' => __('Other')
                ]
            ],
            'visible' => true,
            'validation' => [],
            'sortOrder' => 250,
            'id' => 'shipment-receive'
        ];

        return $jsLayout;
    }
}