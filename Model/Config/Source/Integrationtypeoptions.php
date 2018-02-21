<?php

namespace WebPlanex\Fort\Model\Config\Source;

class Integrationtypeoptions implements \Magento\Framework\Option\ArrayInterface
{
    const REDIRECTION  = "redirection";
    const MERCHANT_PAGE = "merchantPage";
    /**
     * {@inheritdoc}
     */
    public function toOptionArray()
    {
        return [
            [
                'value' => self::REDIRECTION,
                'label' => __('Redirection'),
            ],
            [
                'value' => self::MERCHANT_PAGE,
                'label' => __('Merchant Page')
            ]
        ];
    }
}
