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

namespace Magebit\Faq\Model;

use Exception;
use Magebit\Faq\Api\Data;
use Magebit\Faq\Api\Data\QuestionInterface;
use Magebit\Faq\Api\QuestionManagementInterface;
use Magento\Framework\Exception\CouldNotSaveException;

/**
 * Question Management
 */
class QuestionManagement implements QuestionManagementInterface
{

    /**
     * @inheritDoc
     * @throws CouldNotSaveException
     */
    public function enableQuestion(Data\QuestionInterface $question): void
    {
        $this->setQuestionStatus($question, 1);
    }

    /**
     * @inheritDoc
     * @throws Exception
     */
    public function disableQuestion(Data\QuestionInterface $question): void
    {
        $this->setQuestionStatus($question, 0);
    }

    /**
     * @inheritDoc
     */
    public function setQuestionStatus(QuestionInterface $question, int $status): void
    {
        $question->setStatus($status);
        try {
            $question->save();
        } catch (Exception $e) {
            throw new CouldNotSaveException(
                __('Could not save the page: %1', $e->getMessage()),
                $e
            );
        }
    }
}
