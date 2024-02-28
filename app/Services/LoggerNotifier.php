<?php declare(strict_types=1);

namespace App\Services;

use App\Services\NotificationService;
use Psr\Log\LoggerInterface;

class LoggerNotifier implements NotificationService
{
    public function __construct(private readonly LoggerInterface $logger)
    {

    }

    public function notify(int $userId, string $message): void
    {
        $this->logger->debug("Sent message '$message' to user $userId");
    }
}
