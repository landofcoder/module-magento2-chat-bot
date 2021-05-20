<?php
/**
 * Copyright © Landofcoder.com All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Lof\ChatBot\Model\Data;

use Lof\ChatBot\Api\Data\ChatbotInterface;

class Chatbot extends \Magento\Framework\Api\AbstractExtensibleObject implements ChatbotInterface
{

    /**
     * Get entity_id
     * @return string|null
     */
    public function getEntityId()
    {
        return $this->_get(self::ENTITY_ID);
    }

    /**
     * Set entity_id
     * @param string $entityId
     * @return \Lof\ChatBot\Api\Data\ChatbotInterface
     */
    public function setEntityId($entityId)
    {
        return $this->setData(self::ENTITY_ID, $entityId);
    }

    /**
     * Retrieve existing extension attributes object or create a new one.
     * @return \Lof\ChatBot\Api\Data\ChatbotExtensionInterface|null
     */
    public function getExtensionAttributes()
    {
        return $this->_getExtensionAttributes();
    }

    /**
     * Set an extension attributes object.
     * @param \Lof\ChatBot\Api\Data\ChatbotExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(
        \Lof\ChatBot\Api\Data\ChatbotExtensionInterface $extensionAttributes
    ) {
        return $this->_setExtensionAttributes($extensionAttributes);
    }

    /**
     * Get user_says
     * @return string|null
     */
    public function getUserSays()
    {
        return $this->_get(self::USER_SAYS);
    }

    /**
     * Set user_says
     * @param string $userSays
     * @return \Lof\ChatBot\Api\Data\ChatbotInterface
     */
    public function setUserSays($userSays)
    {
        return $this->setData(self::USER_SAYS, $userSays);
    }

    /**
     * Get action_type
     * @return string|null
     */
    public function getActionType()
    {
        return $this->_get(self::ACTION_TYPE);
    }

    /**
     * Set action_type
     * @param string $actionType
     * @return \Lof\ChatBot\Api\Data\ChatbotInterface
     */
    public function setActionType($actionType)
    {
        return $this->setData(self::ACTION_TYPE, $actionType);
    }

    /**
     * Get response
     * @return string|null
     */
    public function getResponse()
    {
        return $this->_get(self::RESPONSE);
    }

    /**
     * Set response
     * @param string $response
     * @return \Lof\ChatBot\Api\Data\ChatbotInterface
     */
    public function setResponse($response)
    {
        return $this->setData(self::RESPONSE, $response);
    }

    /**
     * Get action_notify_to
     * @return string|null
     */
    public function getActionNotifyTo()
    {
        return $this->_get(self::ACTION_NOTIFY_TO);
    }

    /**
     * Set action_notify_to
     * @param string $actionNotifyTo
     * @return \Lof\ChatBot\Api\Data\ChatbotInterface
     */
    public function setActionNotifyTo($actionNotifyTo)
    {
        return $this->setData(self::ACTION_NOTIFY_TO, $actionNotifyTo);
    }

    /**
     * Get action_assign_to
     * @return string|null
     */
    public function getActionAssignTo()
    {
        return $this->_get(self::ACTION_ASSIGN_TO);
    }

    /**
     * Set action_assign_to
     * @param string $actionAssignTo
     * @return \Lof\ChatBot\Api\Data\ChatbotInterface
     */
    public function setActionAssignTo($actionAssignTo)
    {
        return $this->setData(self::ACTION_ASSIGN_TO, $actionAssignTo);
    }

    /**
     * Get store_id
     * @return string|null
     */
    public function getStoreId()
    {
        return $this->_get(self::STORE_ID);
    }

    /**
     * Set store_id
     * @param string $storeId
     * @return \Lof\ChatBot\Api\Data\ChatbotInterface
     */
    public function setStoreId($storeId)
    {
        return $this->setData(self::STORE_ID, $storeId);
    }

    /**
     * Get customer_group_id
     * @return string|null
     */
    public function getCustomerGroupId()
    {
        return $this->_get(self::CUSTOMER_GROUP_ID);
    }

    /**
     * Set customer_group_id
     * @param string $customerGroupId
     * @return \Lof\ChatBot\Api\Data\ChatbotInterface
     */
    public function setCustomerGroupId($customerGroupId)
    {
        return $this->setData(self::CUSTOMER_GROUP_ID, $customerGroupId);
    }

    /**
     * Get created_at
     * @return string|null
     */
    public function getCreatedAt()
    {
        return $this->_get(self::CREATED_AT);
    }

    /**
     * Set created_at
     * @param string $createdAt
     * @return \Lof\ChatBot\Api\Data\ChatbotInterface
     */
    public function setCreatedAt($createdAt)
    {
        return $this->setData(self::CREATED_AT, $createdAt);
    }

    /**
     * Get updated_at
     * @return string|null
     */
    public function getUpdatedAt()
    {
        return $this->_get(self::UPDATED_AT);
    }

    /**
     * Set updated_at
     * @param string $updatedAt
     * @return \Lof\ChatBot\Api\Data\ChatbotInterface
     */
    public function setUpdatedAt($updatedAt)
    {
        return $this->setData(self::UPDATED_AT, $updatedAt);
    }
}

