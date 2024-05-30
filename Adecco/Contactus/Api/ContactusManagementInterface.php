<?php
/**
 * Rest API for submit contact us form
 *
 * @category: Magento
 * @package: Adecco\Contactus
 * @copyright: Copyright © 2024 Magento, Inc. All rights reserved.
 * @author: Shubham Lade <shubham.lade95@gmail.com>
 * @keywords: Module Adecco_Contactus
 */
declare(strict_types=1);

namespace Adecco\Contactus\Api;

/**
 * Interface ContactusManagementInterface
 */
interface ContactusManagementInterface
{
    /**
     * Contact us form.
     *
     * @param mixed $contactForm
     *
     * @return \Adecco\Contactus\Api\Data\ContactusInterface
     */
    public function submitForm($contactForm);
}