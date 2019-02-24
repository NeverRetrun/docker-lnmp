<?php
/**
 * Created by PhpStorm.
 * User: ruiyang
 * Date: 11/01/19
 * Time: 下午 02:45
 */

namespace App\Controller\Test;

use PHPUnit\Framework\TestCase;
use App\Controller\Factory\StdoutLoggerFactory;
use App\Controller\Factory\FileLoggerFactory;
use App\Controller\Factory\StdoutLogger;
use App\Controller\Factory\FileLogger;

class FactoryTest extends TestCase
{
    public function testCreateStdoutLogger()
    {
        $loggerFactory = new StdoutLoggerFactory();
        $logger = $loggerFactory->createFactory();
        $this->assertInstanceOf(StdoutLogger::class, $logger);
    }

    public function testCreateFileLogger()
    {
        $loggerFactory = new FileLoggerFactory(BASEDIR);
        $logger = $loggerFactory->createFactory();
        $this->assertInstanceOf(FileLogger::class, $logger);
    }
}