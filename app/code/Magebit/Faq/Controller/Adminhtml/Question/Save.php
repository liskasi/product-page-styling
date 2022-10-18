<?php

namespace Magebit\Faq\Controller\Adminhtml\Question;

use Magento\Backend\App\Action;

class Save extends Action
{
//    protected $questionRepository;
//    protected $question;
//
//    public function __construct(
//        \Magento\Backend\App\Action\Context $context,
//        \Magebit\Faq\Model\QuestionRepository $questionRepository,
//        \Magebit\Faq\Model\Question $question
//    ) {
//        parent::__construct($context);
//        $this->questionRepository = $questionRepository;
//        $this->question = $question;
//    }

    /**
     * @inheritDoc
     */
    public function execute()
    {
//        $this->question->setQuestion()
//        $data = $this->getRequest()->getPostValue();
        $data = $this->getRequest()->getParam("magebit_faq_fieldset");
        $question = $data["question"];
        $answer = $data["answer"];
        $status = $data["checkbox_toggle"];
        $this->log($this->getRequest()->getParams(), "qwertre");
        return $this->resultRedirectFactory->create()->setPath('magebit_faq/index/index');
    }

    private function log($arrayData, $message)
    {
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $logger = $objectManager->create('\Psr\Log\LoggerInterface');
        $logger->info("\n\n\n\n\n\n\n $message$", (array)$arrayData);
    }
}
