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

    protected function _construct()
    {
        $this->_init('Magebit\Faq\Model\ResourceModel\Question');
    }

    public function getQuestion()
    {
        return 1;
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
        // TODO: Implement setQuestion() method.
    }

    /**
     * @return mixed
     */
    public function getAnswer()
    {
        // TODO: Implement getAnswer() method.
    }

    /**
     * @param $answer
     * @return mixed
     */
    public function setAnswer($answer)
    {
        // TODO: Implement setAnswer() method.
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        // TODO: Implement getStatus() method.
    }

    /**
     * @param $status
     * @return mixed
     */
    public function setStatus($status)
    {
        // TODO: Implement setStatus() method.
    }

    /**
     * @return mixed
     */
    public function getPosition()
    {
        // TODO: Implement getPosition() method.
    }

    /**
     * @param $position
     * @return mixed
     */
    public function setPosition($position)
    {
        // TODO: Implement setPosition() method.
    }

    /**
     * @return mixed
     */
    public function getUpdatedAt()
    {
        // TODO: Implement getUpdatedAt() method.
    }
}
