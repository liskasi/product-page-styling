<?php

namespace Magebit\Faq\Controller\Adminhtml\Question;

use Magento\Backend\App\Action;

class Save extends Action
{
    /**
     * @inheritDoc
     */
    public function execute()
    {
        $redirectBack = $this->getRequest()->getParam('back', false);
        $resultRedirect = $this->resultRedirectFactory->create();

        $this->log($this->getRequest()->getParams(), "hillowagainw");

        $id = $this->getRequest()->getParam('id', false);

        $question = $this->getRequest()->getParam("question");
        $answer = $this->getRequest()->getParam("answer");
        $status = $this->getRequest()->getParam("status");


        if ($id) {
            $object = $this->_objectManager->create(\Magebit\Faq\Model\QuestionRepository::class)->get($id);
        } else {
            $object = $this->_objectManager->create(\Magebit\Faq\Model\Question::class);
        }
        $object->setQuestion($question);
        $object->setAnswer($answer);
        $object->setStatus($status);
        $object->save();

        if ($redirectBack === "close") {
            return $resultRedirect->setPath('magebit_faq/question/index');
        }
        return $resultRedirect->setPath('*/*/edit', ['id' => $object->getId()]);
    }


    private function log($arrayData, $message)
    {
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $logger = $objectManager->create('\Psr\Log\LoggerInterface');
        $logger->info("\n\n\n\n\n\n\n $message$", (array)$arrayData);
    }
}
