<?php declare(strict_types=1);

namespace App\Services;

interface NotificationService
{
    public function notify(int $userId, string $message): void;
}
