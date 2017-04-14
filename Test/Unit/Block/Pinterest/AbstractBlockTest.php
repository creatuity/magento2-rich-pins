<?php
/**
 * @category       Creatuity
 * @package        RichPins
 * @copyright      Copyright (c) 2008-2017 Creatuity Corp. (http://www.creatuity.com)
 * @license        http://creatuity.com/license/
 */

namespace Creatuity\RichPins\Test\Unit\Block\Pinterest;

use Creatuity\RichPins\Test\Unit\Block\AbstractTest;

abstract class AbstractBlockTest extends AbstractTest
{
    public function testTemplateIfModuleEnabledAndButtonNotExist()
    {
        $this->_setUp([
            'extension_enabled' => true,
            'button_exists' => false,
        ]);

        $this->assertNotNull($this->block->getTemplate());
    }

    public function testTemplateIfModuleEnabledAndButtonExists()
    {
        $this->_setUp([
            'extension_enabled' => true,
            'button_exists' => true,
        ]);

        $this->assertNull($this->block->getTemplate());
    }

    public function testTemplateIfModuleDisabledAndButtonExists()
    {
        $this->_setUp([
            'extension_enabled' => false,
            'button_exists' => true,
        ]);

        $this->assertNull($this->block->getTemplate());
    }

    public function testTemplateIfModuleDisabledAndButtonNotExist()
    {
        $this->_setUp([
            'extension_enabled' => false,
            'button_exists' => false,
        ]);

        $this->assertNull($this->block->getTemplate());
    }
}
