<?php
namespace Magento\Integration\Block\Adminhtml\Integration\Edit;

/**
 * Interceptor class for @see \Magento\Integration\Block\Adminhtml\Integration\Edit
 */
class Interceptor extends \Magento\Integration\Block\Adminhtml\Integration\Edit implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Backend\Block\Widget\Context $context, \Magento\Framework\Registry $registry, \Magento\Integration\Helper\Data $integrationHelper, array $data = array())
    {
        $this->___init();
        parent::__construct($context, $registry, $integrationHelper, $data);
    }

    /**
     * {@inheritdoc}
     */
    public function canRender(\Magento\Backend\Block\Widget\Button\Item $item)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'canRender');
        if (!$pluginInfo) {
            return parent::canRender($item);
        } else {
            return $this->___callPlugins('canRender', func_get_args(), $pluginInfo);
        }
    }
}
