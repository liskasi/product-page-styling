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

namespace Magebit\Faq\Api;

use Magebit\Faq\Api\Data\QuestionInterface;
use Magebit\Faq\Api\Data\QuestionSearchResultsInterface;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\InputException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Exception\StateException;
use Magento\Framework\Model\AbstractModel;

/**
 * Question CRUD interface
 */
interface QuestionRepositoryInterface
{
    /**
     * Create question
     *
     * @param QuestionInterface $question
     * @param bool $saveOptions
     * @return void
     * @throws InputException
     * @throws StateException
     * @throws CouldNotSaveException
     */
    public function save(QuestionInterface $question, bool $saveOptions = false);

    /**
     * Get info about question by product id
     *
     * @param int $id
     * @return QuestionInterface
     * @throws NoSuchEntityException
     */
    public function get(int $id);

    /**
     * Delete question
     *
     * @param AbstractModel $question
     * @return bool Will returned True if deleted
     * @throws StateException
     */
    public function delete(AbstractModel $question): bool;

    /**
     * Delete qyestion by id
     *
     * @param string $id
     * @return bool Will returned True if deleted
     * @throws NoSuchEntityException
     * @throws StateException
     */
    public function deleteById(string $id): bool;

    /**
     * Get question list
     *
     * @param SearchCriteriaInterface $searchSearchCriteria
     * @return QuestionSearchResultsInterface
     */
    public function getList(SearchCriteriaInterface $searchSearchCriteria);
}
