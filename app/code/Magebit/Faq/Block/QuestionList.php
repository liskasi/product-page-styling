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

namespace Magebit\Faq\Block;

use Magebit\Faq\Api\Data\QuestionInterfaceFactory;
use Magebit\Faq\Api\QuestionRepositoryInterfaceFactory;
use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\Api\SortOrderBuilder;
use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;

/**
 * QuestionList class
 */
class QuestionList extends Template
{
    /**
     * @var QuestionRepositoryInterfaceFactory
     */
    protected $questionRepository;

    /**
     * @var QuestionInterfaceFactory
     */
    protected $question;

    /**
     * @var SearchCriteriaBuilder
     */
    protected $search;

    /**
     * @var SortOrderBuilder
     */
    private $sortOrderBuilder;

    /**
     * @param QuestionRepositoryInterfaceFactory $questionRepository
     * @param SearchCriteriaBuilder $searchCriteriaBuilder
     * @param QuestionInterfaceFactory $question
     * @param Context $context
     * @param SortOrderBuilder $sortOrderBuilder
     * @param array $data
     */
    public function __construct(
        QuestionRepositoryInterfaceFactory $questionRepository,
        SearchCriteriaBuilder $searchCriteriaBuilder,
        QuestionInterfaceFactory $question,
        Context $context,
        SortOrderBuilder $sortOrderBuilder,
        array $data = []
    ) {
        $this->questionRepository = $questionRepository;
        $this->search = $searchCriteriaBuilder;
        $this->sortOrderBuilder = $sortOrderBuilder;
        $this->question = $question;
        parent::__construct($context, $data);
    }

    /**
     * Retrieve all enable questions
     *
     * @return array
     */
    public function getAllEnabledQuestions()
    {
        $criteria = $this->setSearchCriteriaAndSortOrder();
        return $this->getQuestions($criteria);
    }

    /**
     * Set filter and sort order
     *
     * @return SearchCriteriaBuilder
     */
    protected function setSearchCriteriaAndSortOrder()
    {
        $question = $this->question->create();
        $sortOrder = $this->sortOrderBuilder
            ->setField($question::POSITION)
            ->setDirection('ASC')
            ->create();

        return $this->search
            ->addFilter($question::STATUS, (string)$question::STATUS_ENABLED)
            ->addSortOrder($sortOrder);
    }

    /**
     * Retrieve questions with search
     *
     * @param SearchCriteriaBuilder $questionSearchResults
     * @return array
     */
    public function getQuestions(SearchCriteriaBuilder $questionSearchResults)
    {
        return $this->questionRepository->create()->getList($questionSearchResults->create())->getItems();
    }
}
