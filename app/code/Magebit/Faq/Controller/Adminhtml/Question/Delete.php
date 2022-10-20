<?php

namespace Magebit\Faq\Controller\Adminhtml\Question;

use Magebit\Faq\Model\QuestionRepository;
use Magento\Backend\App\Action\Context;

class Delete extends \Magento\Backend\App\Action
{

    public function __construct(Context $context)
    {
        parent::__construct($context);
//        $this->questionRepository = $questionRepository;
    }

    /**
     * @inheritDoc
     */
    public function execute()
    {
        $id = $this->getRequest()->getParam('id');

        $questionRepository = $this->_objectManager->create(\Magebit\Faq\Model\QuestionRepository::class);
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();

        if ($id) {
            $question = $questionRepository->get($id);
            $questionRepository->delete($question);
        }
        return $resultRedirect->setPath('*/*/index');
    }

    private function log($arrayData, $message)
    {
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $logger = $objectManager->create('\Psr\Log\LoggerInterface');
        $logger->info("\n\n\n\n\n\n\n $message$", (array)$arrayData);
    }
}
