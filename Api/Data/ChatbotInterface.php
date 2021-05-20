<?php
/**
 * Copyright © Landofcoder.com All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Lof\ChatBot\Api\Data;

interface ChatbotInterface extends \Magento\Framework\Api\ExtensibleDataInterface
{

    const CUSTOMER_GROUP_ID = 'customer_group_id';
    const ENTITY_ID = 'entity_id';
    const STORE_ID = 'store_id';
    const CREATED_AT = 'created_at';
    const RESPONSE = 'response';
    const USER_SAYS = 'user_says';
    const ACTION_TYPE = 'action_type';
    const ACTION_NOTIFY_TO = 'action_notify_to';
    const UPDATED_AT = 'updated_at';
    const ACTION_ASSIGN_TO = 'action_assign_to';

    /**
     * Get entity_id
     * @return string|null
     */
    public function getEntityId();

    /**
     * Set entity_id
     * @param string $entityId
     * @return \Lof\ChatBot\Api\Data\ChatbotInterface
     */
    public function setEntityId($entityId);

    /**
     * Retrieve existing extension attributes object or create a new one.
     * @return \Lof\ChatBot\Api\Data\ChatbotExtensionInterface|null
     */
    public function getExtensionAttributes();

    /**
     * Set an extension attributes object.
     * @param \Lof\ChatBot\Api\Data\ChatbotExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(
        \Lof\ChatBot\Api\Data\ChatbotExtensionInterface $extensionAttributes
    );

    /**
     * Get user_says
     * @return string|null
     */
    public function getUserSays();

    /**
     * Set user_says
     * @param string $userSays
     * @return \Lof\ChatBot\Api\Data\ChatbotInterface
     */
    public function setUserSays($userSays);

    /**
     * Get action_type
     * @return string|null
     */
    public function getActionType();

    /**
     * Set action_type
     * @param string $actionType
     * @return \Lof\ChatBot\Api\Data\ChatbotInterface
     */
    public function setActionType($actionType);

    /**
     * Get response
     * @return string|null
     */
    public function getResponse();

    /**
     * Set response
     * @param string $response
     * @return \Lof\ChatBot\Api\Data\ChatbotInterface
     */
    public function setResponse($response);

    /**
     * Get action_notify_to
     * @return string|null
     */
    public function getActionNotifyTo();

    /**
     * Set action_notify_to
     * @param string $actionNotifyTo
     * @return \Lof\ChatBot\Api\Data\ChatbotInterface
     */
    public function setActionNotifyTo($actionNotifyTo);

    /**
     * Get action_assign_to
     * @return string|null
     */
    public function getActionAssignTo();

    /**
     * Set action_assign_to
     * @param string $actionAssignTo
     * @return \Lof\ChatBot\Api\Data\ChatbotInterface
     */
    public function setActionAssignTo($actionAssignTo);

    /**
     * Get store_id
     * @return string|null
     */
    public function getStoreId();

    /**
     * Set store_id
     * @param string $storeId
     * @return \Lof\ChatBot\Api\Data\ChatbotInterface
     */
    public function setStoreId($storeId);

    /**
     * Get customer_group_id
     * @return string|null
     */
    public function getCustomerGroupId();

    /**
     * Set customer_group_id
     * @param string $customerGroupId
     * @return \Lof\ChatBot\Api\Data\ChatbotInterface
     */
    public function setCustomerGroupId($customerGroupId);

    /**
     * Get created_at
     * @return string|null
     */
    public function getCreatedAt();

    /**
     * Set created_at
     * @param string $createdAt
     * @return \Lof\ChatBot\Api\Data\ChatbotInterface
     */
    public function setCreatedAt($createdAt);

    /**
     * Get updated_at
     * @return string|null
     */
    public function getUpdatedAt();

    /**
     * Set updated_at
     * @param string $updatedAt
     * @return \Lof\ChatBot\Api\Data\ChatbotInterface
     */
    public function setUpdatedAt($updatedAt);
}

