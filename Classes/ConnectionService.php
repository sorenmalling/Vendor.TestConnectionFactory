<?php

namespace Vendor\TestConnectionFactory;

use Neos\Flow\Annotations as Flow;
use Doctrine\DBAL\Connection;

class ConnectionService
{
    /**
     * @Flow\Inject
     * @var Connection
     */
    protected $flowConnection;

    /**
     * @Flow\Inject
     * @var Connection
     */
    protected $customConnection;

    /**
     * @return Connection
     */
    public function getFlowConnection()
    {
        return $this->flowConnection;
    }

    /**
     * @return Connection
     */
    public function getCustomConnection()
    {
        return $this->customConnection;
    }
}