<?php declare(strict_types=1);

namespace App\Services;

use Psr\Container\ContainerInterface;
use Psr\Log\LoggerInterface;

class TelegramNotifier implements NotificationService
{
    public function __construct(
        private readonly ContainerInterface $container,
        private int $foo
    ) {
    }

    public function notify(int $userId, string $message): void
    {
        $logger = $this->container->get(LoggerInterface::class);
        $logger->debug("Sent telegram message '$message' to user $userId; foo=$this->foo");
    }
}
