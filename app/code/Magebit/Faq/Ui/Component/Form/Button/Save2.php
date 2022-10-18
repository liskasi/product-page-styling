<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magebit\Faq\Ui\Component\Form\Button;

use Magento\Catalog\Block\Adminhtml\Product\Edit\Button\Generic;
use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;
use Magento\Ui\Component\Control\Container;

/**
 * Class Save2
 */
class Save2 extends Generic implements ButtonProviderInterface
{
    /**
     * {@inheritdoc}
     */
    public function getButtonData()
    {
        return [
            'label' => __('Save2'),
            'class' => 'save primary',
            'on_click' => sprintf("location.href = '%s';", $this->getUrl(" */question/save")),
        ];

//        return [
//            'label' => __('Save2'),
//            'class' => 'save primary',
//            'data_attribute' => [
//                'mage-init' => [
//                    'buttonAdapter' => [
//                        'actions' => [
//                            [
//                                'targetName' => '',
//                                'actionName' => 'magebit_faq/question/save',
//                                'params' => [
//                                    false
//                                ]
//                            ]
//                        ]
//                    ]
//                ]
//            ],
//            'class_name' => Container::SPLIT_BUTTON,
//            'options' => $this->getOptions(),
//        ];
    }

    /**
     * Retrieve options
     *
     * @return array
     */
    protected function getOptions()
    {
        $options[] = [
            'id_hard' => 'save_and_close',
            'label' => __('Save2 & Close'),
            'data_attribute' => [
                'mage-init' => [
                    'buttonAdapter' => [
                        'actions' => [
                            [
                                'targetName' => '',
                                'actionName' => 'save',
                                'params' => [
                                    true
                                ]
                            ]
                        ]
                    ]
                ]
            ],
        ];

        return $options;
    }
}
