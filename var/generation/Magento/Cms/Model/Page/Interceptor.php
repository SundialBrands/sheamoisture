<?php
namespace Magento\Cms\Model\Page;

/**
 * Interceptor class for @see \Magento\Cms\Model\Page
 */
class Interceptor extends \Magento\Cms\Model\Page implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Framework\Model\Context $context, \Magento\Framework\Registry $registry, \Magento\Framework\Model\ResourceModel\AbstractResource $resource = null, \Magento\Framework\Data\Collection\AbstractDb $resourceCollection = null, array $data = array())
    {
        $this->___init();
        parent::__construct($context, $registry, $resource, $resourceCollection, $data);
    }

    /**
     * {@inheritdoc}
     */
    public function getAvailableStatuses()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getAvailableStatuses');
        if (!$pluginInfo) {
            return parent::getAvailableStatuses();
        } else {
            return $this->___callPlugins('getAvailableStatuses', func_get_args(), $pluginInfo);
        }
    }
}
