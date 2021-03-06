<?php

/*
 * This file is part of the badge-poser package.
 *
 * (c) PUGX <http://pugx.github.io/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace PUGX\Badge\Image\Tests\Factory;

use PUGX\Badge\Image\Factory\PoserImageFactory;

/**
 * Class PoserImageFactoryTest
 *
 * @author Claudio D'Alicandro <claudio.dalicandro@gmail.com>
 */
class PoserImageFactoryTest extends \PHPUnit_Framework_TestCase
{
    /** @var PoserImageFactory $imageFactory */
    private $imageFactory;

    public function setUp()
    {
        $shieldGenerator = $this->getMockBuilder('\PUGX\Poser\Poser')
            ->disableOriginalConstructor()
            ->getMock();
        $shieldGenerator->expects($this->once())
            ->method('generate')
            ->will($this->returnValue('<svg \>'));

        $this->imageFactory = new PoserImageFactory($shieldGenerator);
    }

    public function testShouldCreateDownloadsImage()
    {
        $image = $this->imageFactory->createDownloadsImage('test', 'test', 'red');

        $this->assertInstanceOf('PUGX\Badge\Image\Image', $image);
    }
}
