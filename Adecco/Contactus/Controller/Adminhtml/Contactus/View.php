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

namespace Adecco\Contactus\Controller\Adminhtml\Contactus;

use Magento\Backend\App\Action;

/**
 * Class View
 * @package Adecco\Contactus\Controller\Adminhtml\Contactus
 */
class View extends \Magento\Backend\App\Action
{
    const ADMIN_RESOURCE = 'Adecco_Contactus::save';

    /**
     * Core registry
     *
     * @var \Magento\Framework\Registry
     */
    protected $_coreRegistry;

    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $resultPageFactory;

    /**
     * @var \Adecco\Contactus\Model\Contactus
     */
    protected $model;

    /**
     * @param Action\Context $context
     * @param \Magento\Framework\View\Result\PageFactory $resultPageFactory
     * @param \Adecco\Contactus\Model\Contactus $model
     * @param \Magento\Framework\Registry $registry
     */
    public function __construct(
        Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Adecco\Contactus\Model\Contactus $model,
        \Magento\Framework\Registry $registry
    ) {
        $this->resultPageFactory = $resultPageFactory;
        $this->_coreRegistry = $registry;
        $this->model = $model;
        parent::__construct($context);
    }

    /**
     * Init actions
     *
     * @return \Magento\Backend\Model\View\Result\Page
     */
    protected function _initAction()
    {
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('Adecco_Contactus::base')
            ->addBreadcrumb(__('Contactus'), __('Contactus'))
            ->addBreadcrumb(__('Manage Contactus'), __('Manage Contactus'));
        return $resultPage;
    }

    /**
     * @return \Magento\Backend\Model\View\Result\Page
     */
    public function execute()
    {

        $id = $this->getRequest()->getParam('id');

        if ($id) {
            $this->model->load($id);
            if (!$this->model->getId()) {
                $this->messageManager
                ->addError(__('This record no longer exists.'));
                $resultRedirect = $this->resultRedirectFactory->create();
                return $resultRedirect->setPath('*/*/');
            }
        }
        $resultPage = $this->_initAction();

        $resultPage->addBreadcrumb(
            __('View Contactus Request'),
            __('View Contactus Request')
        );
        $resultPage->getConfig()->getTitle()->prepend(__('Contactus'));
        $resultPage->getConfig()->getTitle()
            ->prepend(__('View Contactus Request'));
        return $resultPage;
    }
}