<?php
/**
 *
 * Copyright © 2016 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\Reward\Test\Unit\Model\Action;

class OrderExtraTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \PHPUnit_Framework_MockObject_MockObject
     */
    protected $rewardDataMock;

    /**
     * @var \Magento\Reward\Model\Action\OrderExtra
     */
    protected $model;

    protected function setUp()
    {
        $this->rewardDataMock = $this->getMock('\Magento\Reward\Helper\Data', [], [], '', false);

        $objectManagerHelper = new \Magento\Framework\TestFramework\Unit\Helper\ObjectManager($this);
        $this->model = $objectManagerHelper->getObject(
            '\Magento\Reward\Model\Action\OrderExtra',
            ['rewardData' => $this->rewardDataMock]
        );
    }

    /**
     * @param array $args
     * @param string $expectedResult
     *
     * @dataProvider getHistoryMessageDataProvider
     */
    public function testGetHistoryMessage(array $args, $expectedResult)
    {
        $this->assertEquals($expectedResult, $this->model->getHistoryMessage($args));
    }

    /**
     * @return array
     */
    public function getHistoryMessageDataProvider()
    {
        return [
            [
                'args' => [],
                'expectedResult' => 'Earned points for order #',
            ],
            [
                'args' => ['increment_id' => 1],
                'expectedResult' => 'Earned points for order #1'
            ]
        ];
    }
}
