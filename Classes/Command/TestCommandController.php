<?php

namespace Vendor\TestConnectionFactory\Command;

use Neos\Flow\Annotations as Flow;
use Neos\Flow\Cli\CommandController;
use Vendor\TestConnectionFactory\ConnectionService;

class TestCommandController extends CommandController
{

    /**
     * @Flow\Inject
     * @var ConnectionService
     */
    protected $connectionService;

    public function testCommand()
    {
        \Neos\Flow\var_dump($this->connectionService->getFlowConnection()->getParams(), 'Flow Connection');
        \Neos\Flow\var_dump($this->connectionService->getCustomConnection()->getParams(), 'Custom Connection Factory');
    }
}