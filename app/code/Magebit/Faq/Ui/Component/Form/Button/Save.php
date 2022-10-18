<?php

namespace Magebit\Faq\Ui\Component\Form\Button;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

class Save implements ButtonProviderInterface
{

    /**
     * @inheritDoc
     */
    public function getButtonData()
    {
        return [
            'label' => __('Save'),
            'class' => 'save primary',
        ];
    }
}
