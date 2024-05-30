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

namespace Adecco\Contactus\Model;

/**
 * Class Contactus
 * @package Adecco\Contactus\Model
 */

class Contactus extends \Magento\Framework\Model\AbstractModel
{
    /**
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Adecco\Contactus\Model\ResourceModel\Contactus');
    }
}