<?php
/**
 * @category       Creatuity
 * @package        RichPins
 * @copyright      Copyright (c) 2008-2017 Creatuity Corp. (http://www.creatuity.com)
 * @license        http://creatuity.com/license/
 */

namespace Creatuity\RichPins\Test\Unit\Block;

use Creatuity\RichPins\Block\Pinterest\AbstractBlock;
use Creatuity\RichPins\Helper\Config;
use Magento\Framework\TestFramework\Unit\Helper\ObjectManager;

abstract class AbstractTest extends \PHPUnit_Framework_TestCase
{
    /** @var Config | \PHPUnit_Framework_MockObject_MockObject */
    protected $configHelper;

    /** @var AbstractBlock */
    protected $block;

    protected function setUp()
    {
        $objectManagerHelper = new ObjectManager($this);
        $arguments = $objectManagerHelper->getConstructArguments($this->_getClassName());
        $this->block = $objectManagerHelper->getObject($this->_getClassName(), $arguments);
        $this->configHelper = $arguments['configHelper'];
    }

    abstract protected function _getClassName();

    protected function _setUp(array $settings)
    {
        if (isset($settings['extension_enabled'])) {
            $this->_setUpModuleEnabled($settings['extension_enabled']);
        }

        if (isset($settings['method'])) {
            $this->_setUpMethod($settings['method']);
        }

        if (isset($settings['button_exists'])) {
            $this->_setUpButtonExists($settings['button_exists']);
        }

        if (isset($settings['site_name'])) {
            $this->_setUpSiteName($settings['site_name']);
        }

        if (isset($settings['share_site_name'])) {
            $this->_setUpShareSiteName($settings['share_site_name']);
        }

        if (isset($settings['share_stock_availability'])) {
            $this->_setUpShareStockAvailability($settings['share_stock_availability']);
        }
    }

    /**
     * @param bool $value
     */
    protected function _setUpModuleEnabled($value)
    {
        $this->configHelper->expects($this->any())
            ->method('isExtensionEnabled')
            ->willReturn($value);
    }

    /**
     * @param string $method
     */
    protected function _setUpMethod($method)
    {        
        $this->configHelper->expects($this->any())
            ->method('getSelectedMethod')
            ->willReturn($method);
    }

    /**
     * @param bool $value
     */
    protected function _setUpShareSiteName($value)
    {
        $this->configHelper->expects($this->any())
            ->method('getShareSiteName')
            ->willReturn($value);
    }

    /**
     * @param bool $value
     */
    protected function _setUpShareStockAvailability($value)
    {
        $this->configHelper->expects($this->any())
            ->method('getShareStockAvailability')
            ->willReturn($value);
    }

    /**
     * @param string $siteName
     */
    protected function _setUpSiteName($siteName)
    {
        $this->configHelper->expects($this->any())
            ->method('getSiteName')
            ->willReturn($siteName);
    }

    /**
     * @param bool $value
     */
    protected function _setUpButtonExists($value)
    {
        $this->configHelper->expects($this->any())
            ->method('buttonExists')
            ->willReturn($value);
    }
}
