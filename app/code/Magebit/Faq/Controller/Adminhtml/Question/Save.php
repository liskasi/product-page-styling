<?php
/**
 * This file is part of the Magebit Faq package.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Magebit Faq
 * to newer versions in the future.
 *
 * @copyright Copyright (c) 2019 Magebit, Ltd. (https://vendor.com/)
 * @license   GNU General Public License ("GPL") v3.0
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Magebit\Faq\Controller\Adminhtml\Question;

use Magebit\Faq\Api\Data\QuestionInterfaceFactory;
use Magebit\Faq\Model\QuestionRepository;
use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;

/**
 * Save action
 */
class Save extends Action
{
    /**
     * @var QuestionRepository
     */
    protected $questionRepository;

    /**
     * @var QuestionInterfaceFactory
     */
    protected $question;

    /**
     * @param Context $context
     * @param QuestionInterfaceFactory $question
     * @param QuestionRepository $questionRepository
     */
    public function __construct(
        Context $context,
        QuestionInterfaceFactory $question,
        QuestionRepository $questionRepository,
    ) {
        parent::__construct($context);
        $this->questionRepository = $questionRepository;
        $this->question = $question;
    }
    /**
     * @inheritDoc
     */
    public function execute()
    {
        $redirectBack = $this->getRequest()->getParam('back', false);
        $resultRedirect = $this->resultRedirectFactory->create();

        $id = $this->getRequest()->getParam('id', false);

        $question = $this->getRequest()->getParam('question');
        $answer = $this->getRequest()->getParam('answer');
        $status = $this->getRequest()->getParam('status');

        $questionObject = $id ? $this->questionRepository->get($id) : $this->question->create();

        $questionObject->setQuestion($question);
        $questionObject->setAnswer($answer);
        $questionObject->setStatus($status);
        $this->questionRepository->save($questionObject);

        if ($redirectBack === 'close') {
            return $resultRedirect->setPath('magebit_faq/question/index');
        }
        return $resultRedirect->setPath('*/*/edit', ['id' => $questionObject->getId()]);
    }
}
