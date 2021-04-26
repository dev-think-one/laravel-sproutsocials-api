<?php

namespace ThinkOne\LaravelSproutsocialsApi\RequestGroups;

use ThinkOne\LaravelSproutsocialsApi\SproutsocialsApi;

abstract class AbstractRequestGroup
{
    protected SproutsocialsApi $api;

    /**
     * AbstractRequestGroup constructor.
     * @param SproutsocialsApi $api
     */
    public function __construct(SproutsocialsApi $api)
    {
        $this->api = $api;
    }

    /**
     * Get client instance
     * @return SproutsocialsApi
     */
    public function apiClient(): SproutsocialsApi
    {
        return $this->api;
    }

    /**
     * Get customer ID form options
     * @param array $options
     *
     * @return int|mixed|string
     * @throws \ThinkOne\LaravelSproutsocialsApi\NotSetCustomerException
     */
    public function customerId($options = [])
    {
        if (is_numeric($options) && $options) {
            return $options;
        }

        if (is_array($options)) {
            return $options['customer_id'] ?? $this->api->defaultCustomerId();
        }

        return $this->api->defaultCustomerId();
    }
}
