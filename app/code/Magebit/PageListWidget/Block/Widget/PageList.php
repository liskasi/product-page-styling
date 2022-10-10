<?php

namespace Magebit\PageListWidget\Block\Widget;

use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\View\Element\Template;

class PageList extends Template implements \Magento\Framework\Data\OptionSourceInterface
{
    protected $_template = "page-list.phtml";
    protected \Magento\Cms\Api\PageRepositoryInterface $pageRepository;
    protected \Magento\Framework\Api\SearchCriteriaBuilder $search;
    public array $pages = [];
    const ALL_PAGES = "all_pages";
    const SPECIFIC_PAGES = "specific_pages";
    const DISPLAY_MODE = "display_mode";
    const SELECTED_PAGES = "selected_pages";
    const TITLE = "title";
    /**
     * construct description
     * @param \Magento\Framework\View\Element\Template\Context $context
     * $data[]
     */
    public function __construct(
        \Magento\Cms\Api\PageRepositoryInterface $pageRepository,
        \Magento\Framework\Api\SearchCriteriaBuilder $searchCriteriaBuilder,
        \Magento\Framework\View\Element\Template\Context $context,
        array $data = []
    ) {
        $this->pageRepository = $pageRepository;
        $this->search = $searchCriteriaBuilder;
        parent::__construct($context, $data);
    }

    /**
     * @throws LocalizedException
     */
    public function toOptionArray(): array
    {
        $pagesArray = $this->getCmsPages($this->getSearchCriteriaIsActive());
        foreach ($pagesArray as $page) {
            $pages[] = [
                'value' => $page->getIdentifier(),
                'label' => $page->getTitle()
            ];
        }
        return $pages;
    }

    protected function getSearchCriteriaIsActive(): \Magento\Framework\Api\SearchCriteriaBuilder
    {
        return $this->search->addFilter('is_active', '1');
    }

    /**
     * @throws LocalizedException
     */
    public function getCmsPages($searchCriteria): array
    {
        return $this->pageRepository->getList($searchCriteria->create())->getItems();
    }

    public function getWidgetTitle()
    {
        return $this->getData(self::TITLE);
    }

    /**
     * @throws LocalizedException
     */
    public function getSelectedPages(): array
    {
        $criteria = $this->getSearchCriteriaIsActive();
        if ($this->getData(self::DISPLAY_MODE) == self::SPECIFIC_PAGES) {
            $selectedPages = explode(",", $this->getData(self::SELECTED_PAGES));
            $criteria->addFilter('identifier', $selectedPages, 'in');
        }
        return $this->getCmsPages($criteria);
    }
}
