<?php


namespace ThinkOne\LaravelSproutsocialsApi\RequestGroups;

/**
 * Class Metadata
 * @package ThinkOne\LaravelSproutsocialsApi\RequestGroups
 *
 */
class Metadata extends AbstractRequestGroup
{
    public function getClient($options = [])
    {
        return $this->api->get('metadata/client');
    }

    public function getCustomers($options = [])
    {
        return $this->api->get("{$this->customerId($options)}/metadata/customer");
    }

    public function getTags($options = [])
    {
        return $this->api->get("{$this->customerId($options)}/metadata/customer/tags");
    }

    public function getGroups($options = [])
    {
        return $this->api->get("{$this->customerId($options)}/metadata/customer/groups");
    }
}
