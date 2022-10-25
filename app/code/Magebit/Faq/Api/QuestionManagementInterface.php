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

namespace Magebit\Faq\Api;

use Magebit\Faq\Api\Data\QuestionInterface;

/**
 * Interface for managing question status
 */
interface QuestionManagementInterface
{
    /**
     * @param QuestionInterface $question
     * @return void
     */
    public function enableQuestion(QuestionInterface $question): void;

    /**
     * @param QuestionInterface $question
     * @return void
     */
    public function disableQuestion(QuestionInterface $question): void;

    /**
     * @param QuestionInterface $question
     * @param int $status
     * @return void
     */
    public function setQuestionStatus(QuestionInterface $question, int $status): void;
}
