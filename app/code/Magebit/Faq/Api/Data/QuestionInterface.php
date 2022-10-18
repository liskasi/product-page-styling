<?php

namespace Magebit\Faq\Api\Data;

interface QuestionInterface
{
    /**#@+
     * Constants defined for keys of data array
     */
    const ID = 'id';

    const QUESTION = 'question';

    const ANSWER = 'answer';

    const STATUS = 'status';

    const POSITION = 'position';

    const UPDATED_AT = 'updated_at';

    const ATTRIBUTES = [
        self::ID,
        self::QUESTION,
        self::ANSWER,
        self::STATUS,
        self::POSITION,
        self::UPDATED_AT
    ];
    /**#@-*/

    /**
     * Question id
     *
     * @return int
     */
    public function getId();

    /**
     * Question
     *
     * @return string
     */
    public function getQuestion();

    /**
     * Set question
     *
     * @param string $question
     * @return $this
     */
    public function setQuestion($question);

    /**
     * Question answer
     *
     * @return string
     */
    public function getAnswer();

    /**
     * Set question answer
     *
     * @param string $answer
     * @return $this
     */
    public function setAnswer($answer);

    /**
     * Question status
     *
     * @return int
     */
    public function getStatus();

    /**
     * Set question status
     *
     * @param int $status
     * @return $this
     */
    public function setStatus($status);

    /**
     * Question position
     *
     * @return int|null
     */
    public function getPosition();

    /**
     * Set question position
     *
     * @param int $position
     * @return $this
     */
    public function setPosition($position);

    /**
     * Question updated date
     *
     * @return string|null
     */
    public function getUpdatedAt();

}
