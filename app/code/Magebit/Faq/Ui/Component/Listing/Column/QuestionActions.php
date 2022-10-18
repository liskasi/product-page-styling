<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Magebit\Faq\Ui\Component\Listing\Column;

use Magento\Ui\Component\Listing\Columns\Column;

/**
 * Class QuestionActions
 */
class QuestionActions extends Column
{
    /**
     * Prepare Data Source
     *
     * @param array $dataSource
     * @return array
     */
    public function prepareDataSource(array $dataSource)
    {
        if (isset($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as & $item) {
                // here we can also use the data from $item to configure some parameters of an action URL
                $item[$this->getData('name')] = [
                    'enable' => [
                        'href' => '/enable',
                        'label' => __('Enable')
                    ],
                    'disable' => [
                        'href' => '/disable',
                        'label' => __('Disable')
                    ],
                    'delete' => [
                        'href' => '/delete',
                        'label' => __('Delete')
                    ],
                    'edit' => [
                        'href' => '/edit',
                        'label' => __('Edit')
                    ],
                ];
            }
        }
        return $dataSource;
    }
}
