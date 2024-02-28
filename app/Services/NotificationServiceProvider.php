<?php declare(strict_types=1);

namespace App\Services;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;
use Psr\Container\ContainerInterface;
use Psr\Log\LoggerInterface;

class NotificationServiceProvider extends ServiceProvider
{
    public function register()
    {
//        $this->app->bind(NotificationService::class, LoggerNotifier::class);
//        $this->app->singleton(NotificationService::class, LoggerNotifier::class);
        $this->app->singleton(
            NotificationService::class,
            function () { return new LoggerNotifier($this->app->make(LoggerInterface::class)); }
        );



        $this->app->when(Controller::class)
            ->needs(NotificationService::class)
            ->give(fn(): TelegramNotifier => $this->app->make(TelegramNotifier::class, ['foo' => 2]));

    }
}
