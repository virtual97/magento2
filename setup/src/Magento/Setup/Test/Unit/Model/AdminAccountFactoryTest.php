<?php
/**
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Magento\Setup\Test\Unit\Model;

use \Magento\Setup\Model\AdminAccountFactory;

class AdminAccountFactoryTest extends \PHPUnit_Framework_TestCase
{
    public function testCreate()
    {
        $serviceLocatorMock = $this->getMockForAbstractClass('Zend\ServiceManager\ServiceLocatorInterface', ['get']);
        $serviceLocatorMock
            ->expects($this->once())
            ->method('get')
            ->with('Magento\Framework\Math\Random')
            ->will($this->returnValue($this->getMock('Magento\Framework\Math\Random')));
        $adminAccountFactory = new AdminAccountFactory($serviceLocatorMock);
        $adminAccount = $adminAccountFactory->create(
            $this->getMock('Magento\Setup\Module\Setup', [], [], '', false),
            []
        );
        $this->assertInstanceOf('Magento\Setup\Model\AdminAccount', $adminAccount);
    }
}
