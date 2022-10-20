<?php

namespace Magebit\Faq\Model;

use Magebit\Faq\Api\QuestionRepositoryInterface;
use Magebit\Faq\Model\ResourceModel\Question as ResourceQuestion;
use Magebit\Faq\Model\ResourceModel\Question\CollectionFactory;
use Magento\Framework\Api\Search\SearchResultInterfaceFactory;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;

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

    /**
     * @var CollectionProcessorInterface
     */
    private $collectionProcessor;

    /**
     * @var SearchResultInterfaceFactory
     */
    protected $searchResultsFactory;

    public function __construct(
        ResourceQuestion $resource,
        CollectionFactory $collectionFactory,
        CollectionProcessorInterface $collectionProcessor,
        SearchResultInterfaceFactory $searchResultInterfaceFactory
    ) {
        $this->resource = $resource;
        $this->collectionFactory = $collectionFactory;
        $this->collectionProcessor = $collectionProcessor;
        $this->searchResultsFactory = $searchResultInterfaceFactory;
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
    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $criteria)
    {
        $collection = $this->collectionFactory->create();

        $this->collectionProcessor->process($criteria, $collection);
        $this->log($criteria, "asdasd");
        $searchResults = $this->searchResultsFactory->create();
        $this->log($searchResults, "searchResults");
        $searchResults->setSearchCriteria($criteria);
        $searchResults->setItems($collection->getItems());
        $searchResults->setTotalCount($collection->getSize());
        $this->log($searchResults, "searchResultsEmdd");
        return $searchResults;
    }
}
