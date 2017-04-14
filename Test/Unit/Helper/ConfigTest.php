<?php
/**
 * @category       Creatuity
 * @package        RichPins
 * @copyright      Copyright (c) 2008-2017 Creatuity Corp. (http://www.creatuity.com)
 * @license        http://creatuity.com/license/
 */

namespace Creatuity\RichPins\Test\Unit\Helper;

class ConfigTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \Creatuity\RichPins\Helper\Config | \PHPUnit_Framework_MockObject_MockObject
     */
    protected $scopeConfig;
    
    /**
     * @var \Creatuity\RichPins\Helper\Config
     */
    protected $helper;
    
    protected function setUp()
    {
        $objectManagerHelper = new \Magento\Framework\TestFramework\Unit\Helper\ObjectManager($this);
        $arguments = $objectManagerHelper->getConstructArguments('Creatuity\RichPins\Helper\Config');
        $this->helper = $objectManagerHelper->getObject('Creatuity\RichPins\Helper\Config', $arguments);
        $context = $arguments['context'];
        $this->scopeConfig = $context->getScopeConfig();
    }
    
    /**
     * 
     * @param bool $value
     * @return \PHPUnit_Framework_MockObject_Builder_InvocationMocker
     */
    protected function _setUpConfigValue($value)
    {
        $this->scopeConfig->expects($this->any())
            ->method('getValue')
            ->will($this->returnValue($value));
    }
    
    public function testExtensionEnabled()
    {
        $this->_setUpConfigValue(true);
        
        $extensionEnabled = $this->helper->isExtensionEnabled();
        
        $this->assertTrue($extensionEnabled);
    }
    
    public function testExtensionNotEnabled()
    {
        $this->_setUpConfigValue(false);
        
        $extensionEnabled = $this->helper->isExtensionEnabled();
        
        $this->assertFalse($extensionEnabled);
    }
    
    public function testSiteName()
    {
        $this->_setUpConfigValue('Test Site Name');
        
        $siteName = $this->helper->getSiteName();
        
        $this->assertEquals('Test Site Name', $siteName);
    }
    
    public function testEmptySiteName()
    {
        $this->_setUpConfigValue(null);
        
        $siteName = $this->helper->getSiteName();
        
        $this->assertNull($siteName);
    }
    
    public function testButtonExists()
    {
        $this->_setUpConfigValue(true);
        
        $buttonExists = $this->helper->buttonExists();
        
        $this->assertTrue($buttonExists);
    }
    
    public function testButtonDoesNotExist()
    {
        $this->_setUpConfigValue(false);
        
        $buttonExists = $this->helper->buttonExists();
        
        $this->assertFalse($buttonExists);
    }
    
    public function testSelectedMethod()
    {
        $this->_setUpConfigValue('some_method');
        
        $selectedMethod = $this->helper->getSelectedMethod();
        
        $this->assertEquals('some_method', $selectedMethod);
    }
    
    public function testShareSiteName()
    {
        $this->_setUpConfigValue(true);
        
        $shareSiteName = $this->helper->getShareSiteName();
        
        $this->assertTrue($shareSiteName);
    }
    
    public function testNotShareSiteName()
    {
        $this->_setUpConfigValue(false);
        
        $shareSiteName = $this->helper->getShareSiteName();
        
        $this->assertFalse($shareSiteName);
    }
    
    public function testShareStockAvailability()
    {
        $this->_setUpConfigValue(true);
        
        $shareStockAvailability = $this->helper->getShareStockAvailability();
        
        $this->assertTrue($shareStockAvailability);
    }
    
    public function testNotShareStockAvailability()
    {
        $this->_setUpConfigValue(false);
        
        $shareStockAvailability = $this->helper->getShareStockAvailability();
        
        $this->assertFalse($shareStockAvailability);
    }
}