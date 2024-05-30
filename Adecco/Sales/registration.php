<?php
/**
 * Override order comment history to track comment history update by admin user
 *
 * @category: Magento
 * @package: Adecco\Sales
 * @copyright: Copyright © 2024 Magento, Inc. All rights reserved.
 * @author: Shubham Lade <shubham.lade95@gmail.com>
 * @keywords: Module Adecco_Sales
 */
declare(strict_types=1);

use Magento\Framework\Component\ComponentRegistrar;
 
ComponentRegistrar::register(ComponentRegistrar::MODULE, 'Adecco_Sales', __DIR__);