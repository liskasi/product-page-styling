<?php

namespace Magebit\Faq\Controller\Adminhtml\Question;

class InlineEdit extends \Magento\Backend\App\Action
{
    protected $jsonFactory;
    protected $questionRepository;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\Controller\Result\JsonFactory $jsonFactory,
        \Magebit\Faq\Model\QuestionRepository $questionRepository
    ) {
        parent::__construct($context);
        $this->jsonFactory = $jsonFactory;
        $this->questionRepository = $questionRepository;
    }

    /**
     * @inheritDoc
     */
    public function execute()
    {
        /** @var \Magento\Framework\Controller\Result\Json $resultJson */
        $resultJson = $this->jsonFactory->create();
        $error = false;
        $messages = [];

        if ($this->getRequest()->getParam('isAjax')) {
            $questionItems = $this->getRequest()->getParam('items', []);
            if (!count($questionItems)) {
                $messages[] = __('Please correct the data sent.');
                $error = true;
            } else {
                foreach (array_keys($questionItems) as $questionId) {
                    /** @var \Magebit\Faq\Model\Question $question */
                    $question = $this->questionRepository->get($questionId);
                    try {
                        $question->setData(array_merge($question->getData(), $questionItems[$questionId]));
                        $this->questionRepository->save($question);
                    } catch (\Exception $e) {
                        $messages[] = $this->getErrorWithBlockId(
                            $question,
                            __($e->getMessage())
                        );
                        $error = true;
                    }
                }
            }
        }

        return $resultJson->setData(
            [
                'messages' => $messages,
                'error' => $error
            ]
        );
    }
}
