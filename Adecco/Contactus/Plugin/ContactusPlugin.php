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

namespace Adecco\Contactus\Plugin;

/**
 * Class ContactusPlugin
 * @package Adecco\Contactus\Plugin
 */
class ContactusPlugin
{    
    /**
     * @var \Adecco\Contactus\Model\Contactus
     */
    protected $contactus;
 
    /**
     * Plugin constructor.
     *
     * @param \Adecco\Contactus\Model\Contactus $contactus
     */
    public function __construct(
        \Adecco\Contactus\Model\Contactus $contactus
    ) {
        $this->contactus = $contactus;        
    }

    /**
     * @param \Magento\Contact\Controller\Index\Post $subject
     * @param \Closure $proceed
     * @return mixed
     * @throws \Exception
     */
    public function aroundExecute(\Magento\Contact\Controller\Index\Post $subject, \Closure $proceed)
    {   
        $request = $subject->getRequest()->getPostValue();
        if ($this->validatedParams($request)) {
            $this->contactus->setData($request); 
            $this->contactus->save();
        }
        $returnValue = $proceed();
        return $returnValue;
    }

    /**
     * @return array
     * @throws \Exception
     */
    private function validatedParams($request)
    {
        if (trim($request['name']) === '') {
            throw new LocalizedException(__('Enter the Name and try again.'));
        }
        if (trim($request['comment']) === '') {
            throw new LocalizedException(__('Enter the comment and try again.'));
        }
        if (false === \strpos($request['email'], '@')) {
            throw new LocalizedException(__('The email address is invalid. Verify the email address and try again.'));
        }
        if (trim($request['hideit']) !== '') {
            throw new \Exception();
        }
        return $request;
    }
}