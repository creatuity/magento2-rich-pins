<?php
/**
 * @category       Creatuity
 * @package        RichPins
 * @copyright      Copyright (c) 2008-2017 Creatuity Corp. (http://www.creatuity.com)
 * @license        http://creatuity.com/license/
 */

namespace Creatuity\RichPins\Test\Unit\Model\Config\Source;

class MethodTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \Creatuity\RichPins\Model\Config\Source\Method
     */
    protected $model;
    
    protected function setUp()
    {
        $objectManagerHelper = new \Magento\Framework\TestFramework\Unit\Helper\ObjectManager($this);
        $arguments = $objectManagerHelper->getConstructArguments('Creatuity\RichPins\Model\Config\Source\Method');
        $this->model = $objectManagerHelper->getObject('Creatuity\RichPins\Model\Config\Source\Method', $arguments);
    }
    
    public function testToOptionArray()
    {
        $optionArray = $this->model->toOptionArray();
        
        $this->assertTrue(is_array($optionArray));
        if (!empty($optionArray)) {
            $arrayElement = current($optionArray);
            $this->assertTrue(is_array($arrayElement));
            $this->assertArrayHasKey('value', $arrayElement);
            $this->assertArrayHasKey('label', $arrayElement);
        }
    }
    
    public function testToArray()
    {
        $array = $this->model->toArray();
        
        $this->assertTrue(is_array($array));
        if (!empty($array)) {
            $arrayElement = current($array);
            $this->assertFalse(is_array($arrayElement));
        }
    }
}