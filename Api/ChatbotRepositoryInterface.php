<?php
/**
 * Copyright © Landofcoder.com All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Lof\ChatBot\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface ChatbotRepositoryInterface
{

    /**
     * Save Chatbot
     * @param \Lof\ChatBot\Api\Data\ChatbotInterface $chatbot
     * @return \Lof\ChatBot\Api\Data\ChatbotInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(
        \Lof\ChatBot\Api\Data\ChatbotInterface $chatbot
    );

    /**
     * Retrieve Chatbot
     * @param string $chatbotId
     * @return \Lof\ChatBot\Api\Data\ChatbotInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function get($chatbotId);

    /**
     * Retrieve Chatbot matching the specified criteria.
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Lof\ChatBot\Api\Data\ChatbotSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
    );

    /**
     * Delete Chatbot
     * @param \Lof\ChatBot\Api\Data\ChatbotInterface $chatbot
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(
        \Lof\ChatBot\Api\Data\ChatbotInterface $chatbot
    );

    /**
     * Delete Chatbot by ID
     * @param string $chatbotId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($chatbotId);
}

