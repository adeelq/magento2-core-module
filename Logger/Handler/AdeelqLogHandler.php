<?php

namespace Adeelq\CoreModule\Logger\Handler;

use Monolog\Logger;
use Magento\Framework\Logger\Handler\Base;

class AdeelqLogHandler extends Base
{
    /**
     * @var int
     */
    protected $loggerType = Logger::DEBUG;

    /**
     * @var string
     */
    protected $fileName = '/var/log/adeelq.log';
}
