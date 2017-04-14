<?php
/**
 * @category       Creatuity
 * @package        RichPins
 * @copyright      Copyright (c) 2008-2017 Creatuity Corp. (http://www.creatuity.com)
 * @license        http://creatuity.com/license/
 */

namespace Creatuity\RichPins\Block\Page\Html\Head;

use Creatuity\RichPins\Block\AbstractBlock;
use Creatuity\RichPins\Model\Config\Source\Method;

class Metatags extends AbstractBlock
{
    protected $tplPath = 'Creatuity_RichPins::page/html/head/metatags.phtml';

    /**
     * @return string
     */
    public function getSiteName()
    {
        if (empty($this->_data['site_name'])) {
            $this->_data['site_name'] = $this->configHelper->getSiteName();
        }

        return $this->_data['site_name'];
    }

    /**
     * @return bool
     */
    public function getShareSiteName()
    {
        return $this->configHelper->getShareSiteName();
    }

    /**
     * @return bool
     */
    public function getShareStockAvailability()
    {
        return $this->configHelper->getShareStockAvailability();
    }

    /**
     * @return bool
     */
    protected function isEnabled()
    {
        return parent::isEnabled() && $this->isMetatagsMethodSelected();
    }

    /**
     * @return bool
     */
    protected function isMetatagsMethodSelected()
    {
        return $this->configHelper->getSelectedMethod() == Method::OPEN_GRAPH_TAGS;
    }
}
