<?php

namespace Magebit\Faq\Model;

use Magebit\Faq\Api\QuestionRepositoryInterface;
use Magebit\Faq\Model\ResourceModel\Question as ResourceQuestion;
use Magebit\Faq\Model\ResourceModel\Question\CollectionFactory;

class QuestionRepository implements QuestionRepositoryInterface
{
    /**
     * @var ResourceQuestion
     */
    protected $resource;
    /**
     * @var CollectionFactory
     */
    protected $collectionFactory;

    public function __construct(
        ResourceQuestion $resource,
        CollectionFactory $collectionFactory
    ) {
        $this->resource = $resource;
        $this->collectionFactory = $collectionFactory;
    }
    /**
     * @inheritDoc
     */
    public function save(\Magebit\Faq\Api\Data\QuestionInterface $question, $saveOptions = false)
    {
        $this->resource->save($question);
    }

    /**
     * @inheritDoc
     */
    public function get($id, $editMode = false, $storeId = null, $forceReload = false)
    {
        $question = $this->collectionFactory->create();
        return $question->getItemById($id);
    }

    private function log($arrayData, $message)
    {
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $logger = $objectManager->create('\Psr\Log\LoggerInterface');
        $logger->info("\n\n\n\n\n\n\n $message$", (array)$arrayData);
    }

    /**
     * @inheritDoc
     */
    public function delete(\Magento\Framework\Model\AbstractModel $question)
    {
        $this->resource->delete($question);
        return true;
    }

    /**
     * @inheritDoc
     */
    public function deleteById($id)
    {
        //
    }

    /**
     * @inheritDoc
     */
    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria)
    {
        // TODO: Implement getList() method.
    }
}
