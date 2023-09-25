<?php

namespace Kavax\RestLog\Plugin;

/**
 * Class RestApiLog
 * @package Kavax\RestLog\Plugin
 */
class RestApiLog
{
    /**
     * @var \Kavax\RestLog\Model\Logger\Logger
     */
    protected $logger;

    /**
     * Plugin constructor.
     * @param \Kavax\RestLog\Model\Logger\Logger $logger
     */
    public function __construct(
        \Kavax\RestLog\Model\Logger\Logger $logger
    ){
        $this->logger = $logger;
    }

    public function beforeDispatch(
        \Magento\Webapi\Controller\Rest $subject,
        \Magento\Framework\App\RequestInterface $request
    )
    {
        $this->logger->info('SOURCE: ' . $request->getClientIp());
        $this->logger->info('METHOD: ' . $request->getMethod());
        $this->logger->info('PATH: ' . $request->getPathInfo());
        $this->logger->info('CONTENT: ' . $request->getContent() . PHP_EOL);
    }
}