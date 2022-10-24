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

use Magebit\Faq\Api\QuestionRepositoryInterfaceFactory;
use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Backend\Model\View\Result\Redirect;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Exception\StateException;

/**
 * Delete question action
 */
class Delete extends Action
{
    /**
     * @var QuestionRepositoryInterfaceFactory
     */
    protected $questionRepository;

    /**
     * @param Context $context
     * @param QuestionRepositoryInterfaceFactory $questionRepository
     */
    public function __construct(
        Context $context,
        QuestionRepositoryInterfaceFactory $questionRepository
    ) {
        parent::__construct($context);
        $this->questionRepository = $questionRepository;
    }

    /**
     * @inheritDoc
     * @throws StateException|NoSuchEntityException
     */
    public function execute()
    {
        $id = $this->getRequest()->getParam('id');

        /** @var Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();

        if ($id) {
            $question = $this->questionRepository->create()->get($id);
            $this->questionRepository->create()->delete($question);
        }
        return $resultRedirect->setPath('*/*/index');
    }
}
