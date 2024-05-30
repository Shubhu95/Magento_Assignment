<?php
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

namespace Adecco\Checkout\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

/**
 * Class InstallSchema
 */
class InstallSchema implements InstallSchemaInterface
{
    /**
     * {@inheritdoc}
     */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;
        $installer->startSetup();

        $quoteAddressTable = 'quote';
        $orderTable = 'sales_order';

        $setup->getConnection()->addColumn(
            $installer->getTable($quoteAddressTable),
            'shipment_receive',
            [
                'type' => \Magento\Framework\DB\Ddl\Table ::TYPE_TEXT,
                'nullable' => true,
                'default' => NULL,
                'length' => 255,
                'comment' => 'Shipment Receive'
            ]
        );
        $setup->getConnection()->addColumn(
            $installer->getTable($orderTable),
            'shipment_receive',
            [
                'type' => \Magento\Framework\DB\Ddl\Table ::TYPE_TEXT,
                'nullable' => true,
                'default' => NULL,
                'length' => 255,
                'comment' => 'Shipment Receive'
            ]
        );
        $installer->endSetup();
    }
}
