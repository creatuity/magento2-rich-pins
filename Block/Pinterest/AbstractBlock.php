<?php
/**
 * @category       Creatuity
 * @package        RichPins
 * @copyright      Copyright (c) 2008-2017 Creatuity Corp. (http://www.creatuity.com)
 * @license        http://creatuity.com/license/
 */

namespace Creatuity\RichPins\Block\Pinterest;

use Creatuity\RichPins\Block\AbstractBlock as ParentAbstractBlock;

abstract class AbstractBlock extends ParentAbstractBlock
{
    protected function isEnabled()
    {
        return parent::isEnabled() && !$this->configHelper->buttonExists();
    }
}