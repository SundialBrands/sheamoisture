<?php
/**
 *
 * Copyright © 2016 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\AdvancedCheckout\Controller\Adminhtml\Index;

use Magento\Framework\Exception\LocalizedException;

class ConfigureQuoteItems extends \Magento\AdvancedCheckout\Controller\Adminhtml\Index
{
    /**
     * Configure quote items
     *
     * @return \Magento\Framework\View\Result\Layout
     * @throws LocalizedException
     */
    public function execute()
    {
        $this->_initData();

        // Prepare data
        $configureResult = new \Magento\Framework\DataObject();
        try {
            $quoteItemId = (int)$this->getRequest()->getParam('id');

            if (!$quoteItemId) {
                throw new LocalizedException(__('Quote item id is not received.'));
            }

            $quoteItem = $this->_objectManager->create('Magento\Quote\Model\Quote\Item')->load($quoteItemId);
            if (!$quoteItem->getId()) {
                throw new LocalizedException(__('Quote item is not loaded.'));
            }

            $configureResult->setOk(true);
            $optionCollection = $this->_objectManager->create('Magento\Quote\Model\Quote\Item\Option')
                ->getCollection()
                ->addItemFilter([$quoteItemId]);
            $quoteItem->setOptions($optionCollection->getOptionsByItem($quoteItem));

            $configureResult->setBuyRequest($quoteItem->getBuyRequest());
            $configureResult->setCurrentStoreId($quoteItem->getStoreId());
            $configureResult->setProductId($quoteItem->getProductId());
            $sessionQuote = $this->_objectManager->get('Magento\Backend\Model\Session\Quote');
            $configureResult->setCurrentCustomerId($sessionQuote->getCustomerId());
        } catch (\Exception $e) {
            $configureResult->setError(true);
            $configureResult->setMessage($e->getMessage());
        }

        // Render page
        /* @var $helper \Magento\Catalog\Helper\Product\Composite */
        $helper = $this->_objectManager->get('Magento\Catalog\Helper\Product\Composite');
        return $helper->renderConfigureResult($configureResult);
    }
}
