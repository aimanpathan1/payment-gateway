<?php

namespace WebPlanex\Fort\Block\Adminhtml\System\Config\FieldSet;

use Magento\Framework\Data\Form\Element\AbstractElement;

/**
 * Fieldset renderer which expanded by default
 */
class Expanded extends \Magento\Config\Block\System\Config\Form\Fieldset
{
    /**
     * Whether is collapsed by default
     *
     * @var bool
     */
    protected $isCollapsedDefault = true;
}
