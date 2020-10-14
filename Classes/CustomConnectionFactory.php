<?php

namespace Vendor\TestConnectionFactory;

use Doctrine\DBAL\Configuration;
use Doctrine\DBAL\Connection;
use Doctrine\DBAL\DBALException;
use Doctrine\DBAL\DriverManager;
use Doctrine\DBAL\Types\Type;
use Doctrine\ORM\EntityManagerInterface;
use Neos\Flow\Annotations as Flow;
use Neos\Utility\Arrays;

/**
 * Factory for Doctrine connections
 *
 * @Flow\Scope("singleton")
 */
class CustomConnectionFactory
{

    /**
     * @var @Flow\InjectConfiguration(package="Neos.Flow", path="persistence.backendOptions")
     */
    protected $defaultFlowDatabaseConfiguration;

    /**
     * @return Connection
     * @throws DBALException
     */
    public function create(): Connection
    {
        $config = new Configuration();
        $connectionParams['dbname'] = 'different_from_flow_settings';
        $connectionParams = Arrays::arrayMergeRecursiveOverrule($this->defaultFlowDatabaseConfiguration, $connectionParams);

        $connection = DriverManager::getConnection($connectionParams, $config);


        return $connection;
    }
}