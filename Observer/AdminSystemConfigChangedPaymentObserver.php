<?php
namespace WebPlanex\Fort\Observer;

use Magento\Framework\Event\ObserverInterface;

/**
 * Catalog inventory module observer
 */
class AdminSystemConfigChangedPaymentObserver implements ObserverInterface 
{
    /**
     * @var \Magento\Config\Model\ResourceModel\Config
     */
    protected $_resourceConfig;
    
    /**
     * @var \Magento\Config\Model\Config
     */
    protected $_appConfig;

    /**
     * @param \Magento\CatalogInventory\Model\ResourceModel\Stock $resourceStock
     */
    public function __construct(
            \Magento\Config\Model\Config $appConfig,
            \Magento\Config\Model\ResourceModel\Config $resourceConfig
            )
    {
        $this->_appConfig = $appConfig;
        $this->_resourceConfig = $resourceConfig;
    }

    /**
     * Update items stock status and low stock date.
     *
     * @param EventObserver $observer
     * @return void
     */
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $commonConfigKeys = array(
            'language',
            'merchant_identifier',
            'access_code',
            'sha_type',
            'sha_in_pass_phrase',
            'sha_out_pass_phrase',
            'command',
            'debug',
            'sandbox_mode',
            'allowspecific',
            'specificcountry',
            'min_order_total',
            'max_order_total',
            'order_status',
            'order_status_on_fail',
        );
        $scope = $this->_appConfig->getScope();
        $scopeId = $this->_appConfig->getScopeId();
        foreach($commonConfigKeys as $configKey) {
            $configVal = $this->_appConfig->getConfigDataValue('payment/webplanex_fort/'. $configKey);
            $this->savaCommonConfig($configKey, $configVal, $scope, $scopeId);
        }
    }
    
    protected function savaCommonConfig($configKey, $configValue, $scope, $scopeId) {
        $this->_resourceConfig->saveConfig('payment/webplanex_fort_cc/'.$configKey, $configValue, $scope, $scopeId);
        $this->_resourceConfig->saveConfig('payment/webplanex_fort_naps/'.$configKey, $configValue, $scope, $scopeId);
        $this->_resourceConfig->saveConfig('payment/webplanex_fort_sadad/'.$configKey, $configValue, $scope, $scopeId);
    }
}
