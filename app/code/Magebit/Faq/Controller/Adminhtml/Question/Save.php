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
        $data = $this->getRequest()->getParam("magebit_faq_fieldset");
        $question = $data["question"];
        $answer = $data["answer"];
        $status = $data["status"];

        $object = $this->_objectManager->create(\Magebit\Faq\Model\Question::class);
        $object->setQuestion($question);
        $object->setAnswer($answer);
        $object->setStatus($status);
        $object->save();

        return $this->resultRedirectFactory->create()->setPath('magebit_faq/question/index');
    }
}
