<?php

namespace Adeelq\CoreModule\Helper;

use Adeelq\CoreModule\Logger\Logger;
use Throwable;

class Base
{
    /**
     * @var Logger
     */
    private Logger $logger;

    /**
     * @param Logger $logger
     */
    public function __construct(Logger $logger)
    {
        $this->logger = $logger;
    }

    /**
     * @param string $message
     *
     * @return void
     */
    public function logInfoMsg(string $message): void
    {
        $this->logger->info($message);
    }

    /**
     * @param string $message
     * @param array $response
     *
     * @return void
     */
    public function logDebugMsg(string $message, array $response = []): void
    {
        $info = [
            'Message' => $message,
            'Information' => $response
        ];
        $this->logger->debug($this->getStringForLog($info));
    }

    /**
     * @param string $classMethodName
     * @param Throwable $e
     *
     * @return void
     */
    public function logError(string $classMethodName, Throwable $e): void
    {
        $info = [
            'Method' => $classMethodName,
            'Message' => $e->getMessage(),
            'Trace' => str_replace(PHP_EOL, PHP_EOL . '        ', PHP_EOL . $e->getTraceAsString())
        ];
        $this->logger->error($this->getStringForLog($info));
    }

    /**
     * @param array $info
     *
     * @return string
     */
    private function getStringForLog(array $info): string
    {
        return stripcslashes(json_encode($info, JSON_PRETTY_PRINT));
    }
}
