<?php
/**
 * This file is part of the Magebit Faq package.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Magebit Faq
 * to newer versions in the future.
 *
 * @copyright Copyright (c) 2019 Magebit, Ltd. (https://vendor.com/)
 * @license   GNU General Public License ("GPL") v3.0
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Magebit\Faq\Model\Question\Source;

use Magebit\Faq\Api\Data\QuestionInterfaceFactory;
use Magento\Framework\Data\OptionSourceInterface;

/**
 * Class Question Status
 */
class Status implements OptionSourceInterface
{
    /**
     * @var QuestionInterfaceFactory
     */
    protected $question;

    /**
     * @param QuestionInterfaceFactory $question
     */
    public function __construct(QuestionInterfaceFactory $question)
    {
        $this->question = $question;
    }

    /**
     * Get options
     *
     * @return array
     */
    public function toOptionArray()
    {
        $availableOptions = $this->getAvailableStatuses();
        $options = [];
        foreach ($availableOptions as $key => $value) {
            $options[] = [
                'label' => $value,
                'value' => $key,
            ];
        }
        return $options;
    }

    /**
     * @return array
     */
    public function getAvailableStatuses()
    {
        $question = $this->question->create();
        return [$question::STATUS_ENABLED => __('Enabled'), $question::STATUS_DISABLED => __('Disabled')];
    }
}
