<?php

namespace Magebit\Faq\Model\ResourceModel;

use Magento\Framework\EntityManager\EntityManager;
use Magento\Framework\EntityManager\MetadataPool;
use Magento\Framework\Model\AbstractModel;
use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
use Magento\Framework\Model\ResourceModel\Db\Context;
use Magento\Framework\Stdlib\DateTime;
use Magento\Store\Model\StoreManagerInterface;

class Question extends AbstractDb
{
    /**
     * @return void
     */
    protected function _construct()
    {
        $this->_init('faq', 'id');
    }

    /**
     * @var EntityManager
     */
    protected $entityManager;
    /**
     * @param Context $context
//     * @param StoreManagerInterface $storeManager
//     * @param DateTime $dateTime
     * @param EntityManager $entityManager
//     * @param MetadataPool $metadataPool
     * @param string $connectionName
     */
    public function __construct(
        Context $context,
//        StoreManagerInterface $storeManager,
//        DateTime $dateTime,
        EntityManager $entityManager,
//        MetadataPool $metadataPool,
        $connectionName = null
    ) {
        parent::__construct($context, $connectionName);
//        $this->_storeManager = $storeManager;
//        $this->dateTime = $dateTime;
        $this->entityManager = $entityManager;
//        $this->metadataPool = $metadataPool;
    }
}
