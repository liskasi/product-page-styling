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

namespace Magebit\Faq\Api\Data;

/**
 * Question entity model
 */
interface QuestionInterface
{
    /**#@+
     * Database table fields
     */
    public const ID = 'id';

    public const QUESTION = 'question';

    public const ANSWER = 'answer';

    public const STATUS = 'status';

    public const POSITION = 'position';

    public const UPDATED_AT = 'updated_at';
    /**#@-*/

    /**#@+
     * Question status
     */
    public const STATUS_ENABLED = 1;

    public const STATUS_DISABLED = 0;
    /**#@-*/

    /**
     * Question id
     *
     * @return int
     */
    public function getId();

    /**
     * Get question
     *
     * @return string|null
     */
    public function getQuestion(): ?string;

    /**
     * Set question
     *
     * @param string $question
     * @return QuestionInterface
     */
    public function setQuestion(string $question): QuestionInterface;

    /**
     * Get question answer
     *
     * @return string|null
     */
    public function getAnswer(): ?string;

    /**
     * Set question answer
     *
     * @param string $answer
     * @return QuestionInterface
     */
    public function setAnswer(string $answer): QuestionInterface;

    /**
     * Get question status
     *
     * @return int|null
     */
    public function getStatus(): ?int;

    /**
     * Set question status
     *
     * @param int $status
     * @return QuestionInterface
     */
    public function setStatus(int $status): QuestionInterface;

    /**
     * Get question position
     *
     * @return int|null
     */
    public function getPosition(): ?int;

    /**
     * Set question position
     *
     * @param int $position
     * @return QuestionInterface
     */
    public function setPosition(int $position): QuestionInterface;

    /**
     * Get question updated date
     *
     * @return string|null
     */
    public function getUpdatedAt(): ?string;

    /**
     * @return array
     */
    public function getAvailableStatuses(): array;
}
