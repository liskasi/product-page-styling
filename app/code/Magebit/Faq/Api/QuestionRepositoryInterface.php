<?php

namespace Magebit\Faq\Api;

interface QuestionRepositoryInterface
{
    /**
     * Create product
     *
     * @param \Magebit\Faq\Api\Data\QuestionInterface $question
     * @param bool $saveOptions
     * @return \Magebit\Faq\Api\Data\QuestionInterface
     * @throws \Magento\Framework\Exception\InputException
     * @throws \Magento\Framework\Exception\StateException
     * @throws \Magento\Framework\Exception\CouldNotSaveException
     */
    public function save(\Magebit\Faq\Api\Data\QuestionInterface  $question, $saveOptions = false);

    /**
     * Get info about product by product SKU
     *
     * @param string $sku
     * @param bool $editMode
     * @param int|null $storeId
     * @param bool $forceReload
     * @return \Magebit\Faq\Api\Data\QuestionInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function get($sku, $editMode = false, $storeId = null, $forceReload = false);

    /**
     * Delete product
     *
     * @param \Magebit\Faq\Api\Data\QuestionInterface $question
     * @return bool Will returned True if deleted
     * @throws \Magento\Framework\Exception\StateException
     */
    public function delete(\Magebit\Faq\Api\Data\QuestionInterface  $question);

    /**
     * @param string $sku
     * @return bool Will returned True if deleted
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\StateException
     */
    public function deleteById($sku);

    /**
     * Get product list
     *
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Magebit\Faq\Api\Data\QuestionSearchResultsInterface
     */
    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria);

}