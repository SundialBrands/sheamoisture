<?php
namespace Magento\GiftRegistry\Controller\Adminhtml\Giftregistry\Customer\Update;

/**
 * Interceptor class for @see
 * \Magento\GiftRegistry\Controller\Adminhtml\Giftregistry\Customer\Update
 */
class Interceptor extends \Magento\GiftRegistry\Controller\Adminhtml\Giftregistry\Customer\Update implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Backend\App\Action\Context $context, \Magento\Framework\Registry $coreRegistry, \Magento\Store\Model\StoreManagerInterface $storeManager)
    {
        $this->___init();
        parent::__construct($context, $coreRegistry, $storeManager);
    }

    /**
     * {@inheritdoc}
     */
    public function dispatch(\Magento\Framework\App\RequestInterface $request)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'dispatch');
        if (!$pluginInfo) {
            return parent::dispatch($request);
        } else {
            return $this->___callPlugins('dispatch', func_get_args(), $pluginInfo);
        }
    }
}
