<?php
/**
 * @category       Creatuity
 * @package        RichPins
 * @copyright      Copyright (c) 2008-2017 Creatuity Corp. (http://www.creatuity.com)
 * @license        http://creatuity.com/license/
 */

namespace Creatuity\RichPins\Test\Unit\Block\Page\Html\Head;

use Creatuity\RichPins\Block\Page\Html\Head\Metatags;
use Creatuity\RichPins\Model\Config\Source\Method;
use Creatuity\RichPins\Test\Unit\Block\AbstractTest;

class MetatagsTest extends AbstractTest
{
    protected function _getClassName()
    {
        return Metatags::class;
    }

    public function testTemplateIfModuleEnabledAndMetatagsMethod()
    {
        $this->_setUp([
            'extension_enabled' => true,
            'method' => Method::OPEN_GRAPH_TAGS,
        ]);

        $this->assertNotNull($this->block->getTemplate());
    }

    public function testTemplateIfModuleEnabledAndNotMetatagsMethod()
    {
        $this->_setUp([
            'extension_enabled' => true,
            'method' => 'some_other_method',
        ]);

        $this->assertNull($this->block->getTemplate());
    }

    public function testTemplateIfModuleDisabledAndNotMetatagsMethod()
    {
        $this->_setUp([
            'extension_enabled' => false,
            'method' => 'some_other_method',
        ]);

        $this->assertNull($this->block->getTemplate());
    }

    public function testTemplateIfModuleDisabledAndMetatagsMethod()
    {
        $this->_setUp([
            'extension_enabled' => false,
            'method' => Method::OPEN_GRAPH_TAGS,
        ]);

        $this->assertNull($this->block->getTemplate());
    }

    public function testGetSiteName()
    {
        $siteName = 'Some Store Name';
        $this->_setUp([
            'site_name' => $siteName,
        ]);

        $this->assertEquals($this->block->getSiteName(), $siteName);
    }

    public function testGetShareSiteNameTrue()
    {
        $this->_setUp([
            'share_site_name' => true,
        ]);

        $this->assertTrue($this->block->getShareSiteName());
    }

    public function testGetShareSiteNameFalse()
    {
        $this->_setUp([
            'share_site_name' => false,
        ]);

        $this->assertFalse($this->block->getShareSiteName());
    }

    public function testGetShareStockAvailabilityTrue()
    {
        $this->_setUp([
            'share_stock_availability' => true,
        ]);

        $this->assertTrue($this->block->getShareStockAvailability());
    }

    public function testGetShareStockAvailabilityFalse()
    {
        $this->_setUp([
            'share_stock_availability' => false,
        ]);

        $this->assertFalse($this->block->getShareStockAvailability());
    }
}
