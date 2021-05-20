<?php
/**
 * Copyright © Landofcoder.com All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Lof\ChatBot\Model;

use Lof\ChatBot\Api\Data\ChatbotInterface;
use Lof\ChatBot\Api\Data\ChatbotInterfaceFactory;
use Magento\Framework\Api\DataObjectHelper;

class Chatbot extends \Magento\Framework\Model\AbstractModel
{

    protected $dataObjectHelper;

    protected $_eventPrefix = 'lof_chatbot_chatbot';
    protected $chatbotDataFactory;


    /**
     * @param \Magento\Framework\Model\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param ChatbotInterfaceFactory $chatbotDataFactory
     * @param DataObjectHelper $dataObjectHelper
     * @param \Lof\ChatBot\Model\ResourceModel\Chatbot $resource
     * @param \Lof\ChatBot\Model\ResourceModel\Chatbot\Collection $resourceCollection
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\Model\Context $context,
        \Magento\Framework\Registry $registry,
        ChatbotInterfaceFactory $chatbotDataFactory,
        DataObjectHelper $dataObjectHelper,
        \Lof\ChatBot\Model\ResourceModel\Chatbot $resource,
        \Lof\ChatBot\Model\ResourceModel\Chatbot\Collection $resourceCollection,
        array $data = []
    ) {
        $this->chatbotDataFactory = $chatbotDataFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        parent::__construct($context, $registry, $resource, $resourceCollection, $data);
    }

    /**
     * Retrieve chatbot model with chatbot data
     * @return ChatbotInterface
     */
    public function getDataModel()
    {
        $chatbotData = $this->getData();
        
        $chatbotDataObject = $this->chatbotDataFactory->create();
        $this->dataObjectHelper->populateWithArray(
            $chatbotDataObject,
            $chatbotData,
            ChatbotInterface::class
        );
        
        return $chatbotDataObject;
    }
}

