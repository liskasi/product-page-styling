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

use Magebit\Faq\Model\QuestionRepository;
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
     * @var QuestionRepository
     */
    protected $questionRepository;

    /**
     * @var SearchCriteriaBuilder
     */
    protected $search;

    /**
     * @var SortOrderBuilder
     */
    private $sortOrderBuilder;

    /**
     * @param QuestionRepository $questionRepository
     * @param SearchCriteriaBuilder $searchCriteriaBuilder
     * @param Context $context
     * @param SortOrderBuilder $sortOrderBuilder
     * @param array $data
     */
    public function __construct(
        QuestionRepository $questionRepository,
        SearchCriteriaBuilder $searchCriteriaBuilder,
        Context $context,
        SortOrderBuilder $sortOrderBuilder,
        array $data = []
    ) {
        $this->questionRepository = $questionRepository;
        $this->search = $searchCriteriaBuilder;
        $this->sortOrderBuilder = $sortOrderBuilder;
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
        $sortOrder = $this->sortOrderBuilder
            ->setField('position')
            ->setDirection('ASC')
            ->create();

        return $this->search
            ->addFilter('status', '1')
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
        return $this->questionRepository->getList($questionSearchResults->create())->getItems();
    }
}
