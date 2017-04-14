<?php
/**
 * @category       Creatuity
 * @package        RichPins
 * @copyright      Copyright (c) 2008-2017 Creatuity Corp. (http://www.creatuity.com)
 * @license        http://creatuity.com/license/
 */

namespace Creatuity\RichPins\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Store\Model\ScopeInterface;

class Config extends AbstractHelper
{
    const XPATH_SITE_NAME = 'general/store_information/name';
    const XPATH_ENABLED = 'richpins/general/enabled';
    const XPATH_BUTTON_EXISTS = 'richpins/general/button_exists';
    const XPATH_METHOD = 'richpins/general/method';
    const XPATH_SHARE_SITE_NAME = 'richpins/general/share_site_name';
    const XPATH_SHARE_STOCK_AVAILABILITY = 'richpins/general/share_stock_availability';

    /**
     * @return bool
     */
    public function isExtensionEnabled()
    {
        return $this->scopeConfig->getValue(self::XPATH_ENABLED, ScopeInterface::SCOPE_STORE);
    }

    /**
     * @return string
     */
    public function getSiteName()
    {
        return $this->scopeConfig->getValue(self::XPATH_SITE_NAME, ScopeInterface::SCOPE_STORE);
    }

    /**
     * @return bool
     */
    public function buttonExists()
    {
        return $this->scopeConfig->getValue(self::XPATH_BUTTON_EXISTS, ScopeInterface::SCOPE_STORE);
    }

    /**
     * @return string
     */
    public function getSelectedMethod()
    {
        return $this->scopeConfig->getValue(self::XPATH_METHOD, ScopeInterface::SCOPE_STORE);
    }

    /**
     * @return bool
     */
    public function getShareSiteName()
    {
        return $this->scopeConfig->getValue(self::XPATH_SHARE_SITE_NAME, ScopeInterface::SCOPE_STORE);
    }

    /**
     * @return bool
     */
    public function getShareStockAvailability()
    {
        return $this->scopeConfig->getValue(self::XPATH_SHARE_STOCK_AVAILABILITY, ScopeInterface::SCOPE_STORE);
    }
}
