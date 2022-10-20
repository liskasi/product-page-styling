<?php
namespace Magebit\Faq\Block;

use Magebit\Faq\Model\QuestionRepository;
use Magento\Framework\Api\SearchCriteriaBuilder;

class QuestionList extends \Magento\Framework\View\Element\Template
{
    protected QuestionRepository $questionRepository;
    protected SearchCriteriaBuilder $search;

    /**
     * @param QuestionRepository $questionRepository
     * @param SearchCriteriaBuilder $searchCriteriaBuilder
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param array $data
     */
    public function __construct(
        QuestionRepository $questionRepository,
        SearchCriteriaBuilder $searchCriteriaBuilder,
        \Magento\Framework\View\Element\Template\Context $context,
        array $data = []
    ) {
        $this->questionRepository = $questionRepository;
        $this->search = $searchCriteriaBuilder;
        parent::__construct($context, $data);
    }

    public function getAllEnabledQuestions() {
        $criteria = $this->setSearchCriteriaIsEnabled();
        return $this->getQuestions($criteria);
    }

    protected function setSearchCriteriaIsEnabled()
    {
        return $this->search->addFilter('status', '1');
    }

    public function getQuestions(SearchCriteriaBuilder $questionSearchResults)
    {
        return $this->questionRepository->getList($questionSearchResults->create())->getItems();
    }

    private function log($arrayData, $message)
    {
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $logger = $objectManager->create('\Psr\Log\LoggerInterface');
        $logger->info("\n\n\n\n\n\n\n $message$", (array)$arrayData);
    }
}
