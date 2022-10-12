<?php

/**
 * This file is part of the Magebit PageListWidget package.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Magebit PageListWidget
 * to newer versions in the future.
 *
 * @copyright Copyright (c) 2019 Magebit, Ltd. (https://vendor.com/)
 * @license   GNU General Public License ("GPL") v3.0
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Magebit\PageListWidget\Block\Widget;

use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\View\Element\Template;

/**
 * Block responsible for displaying the list of CMS Pages
 */
class PageList extends Template implements \Magento\Framework\Data\OptionSourceInterface
{
    protected $_template = "page-list.phtml";
    protected \Magento\Cms\Api\PageRepositoryInterface $pageRepository;
    protected \Magento\Framework\Api\SearchCriteriaBuilder $search;
    public array $pages = [];

    /**
     * Widget options
     */
    const SPECIFIC_PAGES = "specific_pages";
    const DISPLAY_MODE = "display_mode";
    const SELECTED_PAGES = "selected_pages";
    const TITLE = "title";

    /**
     * @param \Magento\Cms\Api\PageRepositoryInterface $pageRepository
     * @param \Magento\Framework\Api\SearchCriteriaBuilder $searchCriteriaBuilder
     * @param Template\Context $context
     * @param array $data
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
     * Return array of options as value-label pairs
     * @return array
     * @throws LocalizedException
     */
    public function toOptionArray()
    {
        $pagesArray = $this->getCmsPages($this->setSearchCriteriaIsActive());
        foreach ($pagesArray as $page) {
            $pages[] = [
                'value' => $page->getIdentifier(),
                'label' => $page->getTitle()
            ];
        }
        return $pages;
    }

    /**
     * Add filter is_active to a search criteria
     * @return \Magento\Framework\Api\SearchCriteriaBuilder
     */
    protected function setSearchCriteriaIsActive()
    {
        return $this->search->addFilter('is_active', '1');
    }

    /**
     * Return an array of CMS Pages filtered by a search criteria
     * @param \Magento\Framework\Api\SearchCriteriaBuilder $searchCriteria
     * @return array
     * @throws LocalizedException
     */
    public function getCmsPages(\Magento\Framework\Api\SearchCriteriaBuilder $searchCriteria): array
    {
        return $this->pageRepository->getList($searchCriteria->create())->getItems();
    }

    /**
     * Return a widget title
     * @return array|mixed|null
     */
    public function getWidgetTitle()
    {
        return $this->getData(self::TITLE);
    }

    /**
     * Return a selected CMS pages
     * @return array
     * @throws LocalizedException
     */
    public function getSelectedPages()
    {
        $criteria = $this->setSearchCriteriaIsActive();
        if ($this->getData(self::DISPLAY_MODE) == self::SPECIFIC_PAGES) {
            $selectedPages = explode(",", $this->getData(self::SELECTED_PAGES));
            $criteria->addFilter('identifier', $selectedPages, 'in');
        }
        return $this->getCmsPages($criteria);
    }
}
