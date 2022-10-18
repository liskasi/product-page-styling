<?php

namespace Magebit\Faq\Model;

use Magebit\Faq\Api\QuestionRepositoryInterface;

class QuestionRepository implements QuestionRepositoryInterface
{
    /**
     * @inheritDoc
     */
    public function save(\Magebit\Faq\Api\Data\QuestionInterface $question, $saveOptions = false)
    {
        // TODO: Implement save() method.
    }

    /**
     * @inheritDoc
     */
    public function get($sku, $editMode = false, $storeId = null, $forceReload = false)
    {
        // TODO: Implement get() method.
    }

    /**
     * @inheritDoc
     */
    public function delete(\Magebit\Faq\Api\Data\QuestionInterface $question)
    {
        // TODO: Implement delete() method.
    }

    /**
     * @inheritDoc
     */
    public function deleteById($sku)
    {
        // TODO: Implement deleteById() method.
    }

    /**
     * @inheritDoc
     */
    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria)
    {
        // TODO: Implement getList() method.
    }
}
