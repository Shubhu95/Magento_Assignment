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

namespace Adecco\Sales\Plugin\Sales\Model;

use Magento\Sales\Api\Data\OrderStatusHistoryInterface;
use Magento\Sales\Model\Order as CoreOrder;

/**
 * Class Order
 */
class Order
{
    /**
     * @var \Magento\Backend\Model\Auth\Session
     */
    protected $authSession;

    /**
     * @param \Magento\Backend\Model\Auth\Session $authSession
     */
    public function __construct(
        \Magento\Backend\Model\Auth\Session $authSession
    ) {
        $this->authSession = $authSession;
    }

    /**
     * Add a comment to order status history.
     *
     * add admin name in comment
     *
     * @param string $comment
     * @param bool|string $status
     * @param bool $isVisibleOnFront
     */
    public function beforeAddCommentToStatusHistory(CoreOrder $subject, $comment, $status, $isVisibleOnFront)
    {
        $username = $this->authSession->getUser()->getFirstName()." ".$this->authSession->getUser()->getLastName();
        $comment = $comment . ' (By '.$username .')';
        return [$comment, $status, $isVisibleOnFront];
    }
}