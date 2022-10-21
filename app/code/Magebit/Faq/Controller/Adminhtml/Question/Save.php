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

use Magento\Backend\App\Action;

/**
 * Save action
 */
class Save extends Action
{
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


        if ($id) {
            $object = $this->_objectManager->create(\Magebit\Faq\Model\QuestionRepository::class)->get($id);
        } else {
            $object = $this->_objectManager->create(\Magebit\Faq\Model\Question::class);
        }
        $object->setQuestion($question);
        $object->setAnswer($answer);
        $object->setStatus($status);
        $object->save();

        if ($redirectBack === 'close') {
            return $resultRedirect->setPath('magebit_faq/question/index');
        }
        return $resultRedirect->setPath('*/*/edit', ['id' => $object->getId()]);
    }
}
