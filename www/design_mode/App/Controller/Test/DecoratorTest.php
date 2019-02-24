<?php
/**
 * Created by PhpStorm.
 * User: ruiyang
 * Date: 15/01/19
 * Time: 下午 01:53
 */

namespace App\Controller\Test;

use App\Controller\Decorator\JsonRenderer;
use App\Controller\Decorator\Webservice;
use App\Controller\Decorator\XmlRenderer;
use PHPUnit\Framework\TestCase;

class DecoratorTest extends TestCase
{
    private $service;

    public function setUp()
    {
        $this->service = new Webservice('test');
    }

    public function testJsonDecorator()
    {
        $service = new JsonRenderer($this->service);

        $this->assertEquals('"test"', $service->renderData());
    }

    public function testXmlDecorator()
    {
        $service = new XmlRenderer($this->service);

        $this->assertEquals('<?xml version="1.0"?><content>test</content>', $service->renderData());
    }
}