<?php

namespace Magebit\Faq\Model;

use Magebit\Faq\Api\Data\QuestionInterface;

class Question extends \Magento\Framework\Model\AbstractModel implements
    QuestionInterface
//implements \Magento\Framework\DataObject\IdentityInterface
{
//    const CACHE_TAG = 'magebit_faq_question';
//
//    protected $_cacheTag = 'magebit_faq_question';
//
//    protected $_eventPrefix = 'magebit_faq_question';


    public const STATUS_ENABLED = 1;
    public const STATUS_DISABLED = 0;

    protected function _construct()
    {
        $this->_init('Magebit\Faq\Model\ResourceModel\Question');
    }

    public function getId()
    {
        return $this->getData("id");
    }

    public function getQuestion()
    {
        return $this->getData("question");
    }

//    /**
//     * @return string[]
//     */
//    public function getIdentities()
//    {
//        return [self::CACHE_TAG . '_' . $this->getId()];
//    }
    /**
     * @param $question
     * @return mixed
     */
    public function setQuestion($question)
    {
        return $this->setData("question", $question);
    }

    /**
     * @return mixed
     */
    public function getAnswer()
    {
        return $this->getData("answer");
    }

    /**
     * @param $answer
     * @return mixed
     */
    public function setAnswer($answer)
    {
        return $this->setData("answer", $answer);
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->getData("status");
    }

    /**
     * @param $status
     * @return mixed
     */
    public function setStatus($status)
    {
        return $this->setData("status", $status);
    }

    /**
     * @return mixed
     */
    public function getPosition()
    {
        return $this->getData("position");
    }

    /**
     * @param $position
     * @return mixed
     */
    public function setPosition($position)
    {
        return $this->setData("position", $position);
    }

    /**
     * @return mixed
     */
    public function getUpdatedAt()
    {
        // TODO: Implement getUpdatedAt() method.
    }

    /**
     * Prepare block's statuses.
     *
     * @return array
     */
    public function getAvailableStatuses()
    {
        return [self::STATUS_ENABLED => __('Enabled'), self::STATUS_DISABLED => __('Disabled')];
    }
}
