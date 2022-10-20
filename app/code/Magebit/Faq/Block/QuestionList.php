<?php
namespace Magebit\Faq\Block;

use Magebit\Faq\Api\Data\QuestionSearchResultsInterface;
use Magebit\Faq\Api\QuestionRepositoryInterface;

class QuestionList extends \Magento\Framework\View\Element\Template
{
    protected QuestionRepositoryInterface $questionRepository;
    protected QuestionSearchResultsInterface $questionSearchResults;

    public function __construct(
        QuestionRepositoryInterface $questionRepository,
        QuestionSearchResultsInterface $questionSearchResults,
        \Magento\Framework\View\Element\Template\Context $context,
        array $data = []
    ) {
        $this->questionRepository = $questionRepository;
        $this->questionSearchResults = $questionSearchResults;
        parent::__construct($context, $data);
    }

    public function getAllEnabledQuestions(QuestionSearchResultsInterface $questionSearchResults)
    {
        return $this->questionRepository->getList($questionSearchResults->create())->getItems();
    }
}
