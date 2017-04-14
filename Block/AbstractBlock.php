<?php
/**
 * @category       Creatuity
 * @package        RichPins
 * @copyright      Copyright (c) 2008-2017 Creatuity Corp. (http://www.creatuity.com)
 * @license        http://creatuity.com/license/
 */

namespace Creatuity\RichPins\Block;

use Creatuity\RichPins\Helper\Config;
use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Catalog\Block\Product\Context;
use Magento\Catalog\Block\Product\View;
use Magento\Catalog\Helper\Product;
use Magento\Catalog\Model\ProductTypes\ConfigInterface;
use Magento\Customer\Model\Session;
use Magento\Framework\Json\EncoderInterface as JsonEncoder;
use Magento\Framework\Locale\FormatInterface;
use Magento\Framework\Pricing\PriceCurrencyInterface;
use Magento\Framework\Stdlib\StringUtils;
use Magento\Framework\Url\EncoderInterface as UrlEncoder;

abstract class AbstractBlock extends View
{
    /**
     * @var Config
     */
    protected $configHelper;

    /**
     * @var string
     */
    protected $tplPath;

    public function __construct(
        Context  $context,
        UrlEncoder $urlEncoder,
        JsonEncoder $jsonEncoder,
        StringUtils $string,
        Product $productHelper,
        ConfigInterface $productTypeConfig,
        FormatInterface $localeFormat,
        Session $customerSession,
        ProductRepositoryInterface $productRepository,
        PriceCurrencyInterface $priceCurrency,
        Config $configHelper
    )
    {
        $this->configHelper = $configHelper;

        return parent::__construct(
            $context,
            $urlEncoder,
            $jsonEncoder,
            $string,
            $productHelper,
            $productTypeConfig,
            $localeFormat,
            $customerSession,
            $productRepository,
            $priceCurrency
        );
    }

    /**
     * @return string
     */
    public function getTemplate()
    {
        if ($this->isEnabled()) {
            return $this->tplPath;
        }

        return parent::getTemplate();
    }

    /**
     * @return bool
     */
    protected function isEnabled()
    {
        return $this->configHelper->isExtensionEnabled();
    }
}
