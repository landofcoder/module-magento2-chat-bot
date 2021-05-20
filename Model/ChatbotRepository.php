<?php
/**
 * Copyright © Landofcoder.com All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Lof\ChatBot\Model;

use Lof\ChatBot\Api\ChatbotRepositoryInterface;
use Lof\ChatBot\Api\Data\ChatbotInterfaceFactory;
use Lof\ChatBot\Api\Data\ChatbotSearchResultsInterfaceFactory;
use Lof\ChatBot\Model\ResourceModel\Chatbot as ResourceChatbot;
use Lof\ChatBot\Model\ResourceModel\Chatbot\CollectionFactory as ChatbotCollectionFactory;
use Magento\Framework\Api\DataObjectHelper;
use Magento\Framework\Api\ExtensibleDataObjectConverter;
use Magento\Framework\Api\ExtensionAttribute\JoinProcessorInterface;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Reflection\DataObjectProcessor;
use Magento\Store\Model\StoreManagerInterface;

class ChatbotRepository implements ChatbotRepositoryInterface
{

    protected $dataChatbotFactory;

    protected $extensibleDataObjectConverter;
    protected $chatbotFactory;

    protected $searchResultsFactory;

    protected $resource;

    protected $chatbotCollectionFactory;

    private $storeManager;

    protected $dataObjectHelper;

    protected $dataObjectProcessor;

    protected $extensionAttributesJoinProcessor;

    private $collectionProcessor;


    /**
     * @param ResourceChatbot $resource
     * @param ChatbotFactory $chatbotFactory
     * @param ChatbotInterfaceFactory $dataChatbotFactory
     * @param ChatbotCollectionFactory $chatbotCollectionFactory
     * @param ChatbotSearchResultsInterfaceFactory $searchResultsFactory
     * @param DataObjectHelper $dataObjectHelper
     * @param DataObjectProcessor $dataObjectProcessor
     * @param StoreManagerInterface $storeManager
     * @param CollectionProcessorInterface $collectionProcessor
     * @param JoinProcessorInterface $extensionAttributesJoinProcessor
     * @param ExtensibleDataObjectConverter $extensibleDataObjectConverter
     */
    public function __construct(
        ResourceChatbot $resource,
        ChatbotFactory $chatbotFactory,
        ChatbotInterfaceFactory $dataChatbotFactory,
        ChatbotCollectionFactory $chatbotCollectionFactory,
        ChatbotSearchResultsInterfaceFactory $searchResultsFactory,
        DataObjectHelper $dataObjectHelper,
        DataObjectProcessor $dataObjectProcessor,
        StoreManagerInterface $storeManager,
        CollectionProcessorInterface $collectionProcessor,
        JoinProcessorInterface $extensionAttributesJoinProcessor,
        ExtensibleDataObjectConverter $extensibleDataObjectConverter
    ) {
        $this->resource = $resource;
        $this->chatbotFactory = $chatbotFactory;
        $this->chatbotCollectionFactory = $chatbotCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        $this->dataChatbotFactory = $dataChatbotFactory;
        $this->dataObjectProcessor = $dataObjectProcessor;
        $this->storeManager = $storeManager;
        $this->collectionProcessor = $collectionProcessor;
        $this->extensionAttributesJoinProcessor = $extensionAttributesJoinProcessor;
        $this->extensibleDataObjectConverter = $extensibleDataObjectConverter;
    }

    /**
     * {@inheritdoc}
     */
    public function save(
        \Lof\ChatBot\Api\Data\ChatbotInterface $chatbot
    ) {
        /* if (empty($chatbot->getStoreId())) {
            $storeId = $this->storeManager->getStore()->getId();
            $chatbot->setStoreId($storeId);
        } */
        
        $chatbotData = $this->extensibleDataObjectConverter->toNestedArray(
            $chatbot,
            [],
            \Lof\ChatBot\Api\Data\ChatbotInterface::class
        );
        
        $chatbotModel = $this->chatbotFactory->create()->setData($chatbotData);
        
        try {
            $this->resource->save($chatbotModel);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the chatbot: %1',
                $exception->getMessage()
            ));
        }
        return $chatbotModel->getDataModel();
    }

    /**
     * {@inheritdoc}
     */
    public function get($chatbotId)
    {
        $chatbot = $this->chatbotFactory->create();
        $this->resource->load($chatbot, $chatbotId);
        if (!$chatbot->getId()) {
            throw new NoSuchEntityException(__('Chatbot with id "%1" does not exist.', $chatbotId));
        }
        return $chatbot->getDataModel();
    }

    /**
     * {@inheritdoc}
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $criteria
    ) {
        $collection = $this->chatbotCollectionFactory->create();
        
        $this->extensionAttributesJoinProcessor->process(
            $collection,
            \Lof\ChatBot\Api\Data\ChatbotInterface::class
        );
        
        $this->collectionProcessor->process($criteria, $collection);
        
        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($criteria);
        
        $items = [];
        foreach ($collection as $model) {
            $items[] = $model->getDataModel();
        }
        
        $searchResults->setItems($items);
        $searchResults->setTotalCount($collection->getSize());
        return $searchResults;
    }

    /**
     * {@inheritdoc}
     */
    public function delete(
        \Lof\ChatBot\Api\Data\ChatbotInterface $chatbot
    ) {
        try {
            $chatbotModel = $this->chatbotFactory->create();
            $this->resource->load($chatbotModel, $chatbot->getChatbotId());
            $this->resource->delete($chatbotModel);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the Chatbot: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function deleteById($chatbotId)
    {
        return $this->delete($this->get($chatbotId));
    }
}

