<?php

namespace Magebit\Faq\Model\Question;

use Magento\Ui\DataProvider\AbstractDataProvider;

class DataProvider extends AbstractDataProvider
{
    protected $question;
    public function __construct($name, $primaryFieldName, $requestFieldName, \Magebit\Faq\Model\Question $question, array $meta = [], array $data = [])
    {
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
        $this->question = $question;
    }

    public function getData()
    {
        $result = [];
        foreach ($this->collection->getItems() as $item) {
            $result[$item->getId()]['general'] = $item->getData();
        }
        return $result;
    }
}
