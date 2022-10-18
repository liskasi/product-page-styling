<?php

namespace Magebit\Faq\Controller\Adminhtml\Question;

use Magento\Backend\App\Action;
use Magento\Framework\Controller\ResultFactory;

class NewAction extends Action
{
    public function execute()
    {
        $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);
        $resultPage->setActiveMenu('Magento_Backend::content');
        $resultPage->getConfig()->getTitle()->prepend(__("FAQ Question"));
        return $resultPage;
    }
}
