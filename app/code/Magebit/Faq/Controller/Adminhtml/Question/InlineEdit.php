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

use Exception;
use Magebit\Faq\Model\Question;
use Magebit\Faq\Model\QuestionRepository;
use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Controller\Result\Json;
use Magento\Framework\Controller\Result\JsonFactory;

/**
 * Inline edit action
 */
class InlineEdit extends Action
{
    /**
     * @var JsonFactory
     */
    protected $jsonFactory;

    /**
     * @var QuestionRepository
     */
    protected $questionRepository;

    /**
     * @param Context $context
     * @param JsonFactory $jsonFactory
     * @param QuestionRepository $questionRepository
     */
    public function __construct(
        Context $context,
        JsonFactory $jsonFactory,
        QuestionRepository $questionRepository
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
        /** @var Json $resultJson */
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
                    try {
                        /** @var Question $question */
                        $question = $this->questionRepository->get($questionId);
                        $question->setData(array_merge($question->getData(), $questionItems[$questionId]));
                        $this->questionRepository->save($question);
                    } catch (Exception $e) {
                        $messages[] = [
                            $question,
                            __($e->getMessage())
                        ];
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
