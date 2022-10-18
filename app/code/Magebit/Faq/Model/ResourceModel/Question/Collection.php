<?php

namespace Magebit\Faq\Model\ResourceModel\Question;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Magento\Framework\View\Element\UiComponent\DataProvider\SearchResult;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(\Magebit\Faq\Model\Question::class, \Magebit\Faq\Model\ResourceModel\Question::class);
    }
}
