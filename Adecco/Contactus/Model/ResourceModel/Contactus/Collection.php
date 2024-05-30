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

namespace Adecco\Contactus\Model\ResourceModel\Contactus;

use Adecco\Contactus\Model\ResourceModel\AbstractCollection;

/**
 * Class Collection
 * @package Adecco\Contactus\Model\ResourceModel\Contactus
 */
class Collection extends AbstractCollection
{
    protected $_idFieldName = 'id';
    protected $_previewFlag;
    protected function _construct()
    {
        $this->_init(
            'Adecco\Contactus\Model\Contactus',
            'Adecco\Contactus\Model\ResourceModel\Contactus'
        );
        $this->_map['fields']['id'] = 'main_table.id';
    }
}