<?php
/**
 * @category       Creatuity
 * @package        RichPins
 * @copyright      Copyright (c) 2008-2017 Creatuity Corp. (http://www.creatuity.com)
 * @license        http://creatuity.com/license/
 */

namespace Creatuity\RichPins\Model\Config\Source;

use Magento\Framework\Option\ArrayInterface;

class Method implements ArrayInterface
{
    const OPEN_GRAPH_TAGS = 'tags';

    /**
     * @return array
     */
    public function toOptionArray()
    {
        return [['value' => self::OPEN_GRAPH_TAGS, 'label' => __('Open Graph Tags')]];
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return [self::OPEN_GRAPH_TAGS => __('Open Graph Tags')];
    }
}
