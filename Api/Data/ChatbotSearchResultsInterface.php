<?php
/**
 * Copyright © Landofcoder.com All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Lof\ChatBot\Api\Data;

interface ChatbotSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{

    /**
     * Get Chatbot list.
     * @return \Lof\ChatBot\Api\Data\ChatbotInterface[]
     */
    public function getItems();

    /**
     * Set entity_id list.
     * @param \Lof\ChatBot\Api\Data\ChatbotInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}

