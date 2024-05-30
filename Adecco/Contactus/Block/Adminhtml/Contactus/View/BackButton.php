<?php
/**
 * Show contactus request in admin grid
 *
 * @category: Magento
 * @package: Adecco\Contactus
 * @copyright: Copyright © 2024 Magento, Inc. All rights reserved.
 * @author: Shubham Lade <shubham.lade95@gmail.com>
 * @keywords: Module Adecco_Contactus
 */
declare(strict_types=1);

namespace Adecco\Contactus\Block\Adminhtml\Contactus\View;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

/**
 * Class BackButton
 * @package Adecco\Contactus\Block\Adminhtml\Contactus\View
 */
class BackButton extends GenericButton implements ButtonProviderInterface
{
    /**
     * @return array
    */
    public function getButtonData()
    {
        return [
            'label' => __('Back'),
            'on_click' => sprintf("location.href = '%s';", $this->getBackUrl()),
            'class' => 'back',
            'sort_order' => 10
        ];
    }

    /**
     * Get URL for back (reset) button
     *
     * @return string
    */
    public function getBackUrl()
    {
        return $this->getUrl('*/*/');
    }
}