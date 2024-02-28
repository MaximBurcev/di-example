<?php

namespace App\Http\Controllers;

use App\Services\NotificationService;
use Illuminate\Contracts\Cache\Repository;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function __construct(private readonly NotificationService $notificationService)
    {
    }


    public function hello()
    {
        $this->notificationService->notify(1, 'privet');

        return 'ok';
    }
}
