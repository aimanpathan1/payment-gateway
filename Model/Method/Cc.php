<?php

namespace WebPlanex\Fort\Model\Method;
//use WebPlanex\Fort\Helper\Data;
use \Magento\Core\Model\ObjectManager;

class Cc extends \WebPlanex\Fort\Model\Payment
{
    const CODE = 'webplanex_fort_cc';

    protected $_code = self::CODE;

    public function __construct(
        \Magento\Framework\Model\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\Api\ExtensionAttributesFactory $extensionFactory,
        \Magento\Framework\Api\AttributeValueFactory $customAttributeFactory,
        \WebPlanex\Fort\Helper\Data $paymentData,
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig,
        \Magento\Payment\Model\Method\Logger $logger,
        \Magento\Framework\Model\ResourceModel\AbstractResource $resource = null,
        \Magento\Framework\Data\Collection\AbstractDb $resourceCollection = null,
        array $data = []
    ) {
        parent::__construct(
            $context,
            $registry,
            $extensionFactory,
            $customAttributeFactory,
            $paymentData,
            $scopeConfig,
            $logger,
            $resource,
            $resourceCollection,
            $data
        );
        
        $this->_code = self::CODE;
    }
    
    /**
     * @return bool
     */
    public function isMerchantPage()
    {
        if ($this->getConfigData('integration_type') == \WebPlanex\Fort\Model\Config\Source\Integrationtypeoptions::MERCHANT_PAGE) {
            return true;
        }
        return false;
    }
    
    /**
     * Get instructions text from config
     *
     * @return string
     */
    public function getInstructions()
    {
        if($this->isMerchantPage()) {
           //return __('Payfrot merchant page instructions'); 
            return '';
        }
        return parent::getInstructions();
    }
}