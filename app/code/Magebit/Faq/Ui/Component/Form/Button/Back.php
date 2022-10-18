<?php

namespace Magebit\Faq\Ui\Component\Form\Button;

use Magento\Catalog\Block\Adminhtml\Product\Edit\Button\Generic;
use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

class Back extends Generic implements ButtonProviderInterface
{

    /**
     * @inheritDoc
     */
    public function getButtonData()
    {
        return [
            'label' => __('Back'),
            'on_click' => sprintf("location.href = '%s';", $this->getUrl("*/index/index")),
            'class' => 'back',
            'sort_order' => 10,
        ];
    }
}
