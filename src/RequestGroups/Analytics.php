<?php

namespace ThinkOne\LaravelSproutsocialsApi\RequestGroups;

class Analytics extends AbstractRequestGroup
{
    public function getProfiles($options = [])
    {
        return $this->api->post("{$this->customerId($options)}/analytics/profiles", $options['data'] ?? []);
    }

    public function getPosts($options = [])
    {
        return $this->api->post("{$this->customerId($options)}/analytics/posts", $options['data'] ?? []);
    }
}
