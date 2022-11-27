<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\TestAgent;
use Package\Interface\Test\UserAgentInterface;

class AgentController extends Controller
{
    public function index(UserAgentInterface $userAgent)
    {
        TestAgent::dispatch($userAgent)->onQueue('parsing');
    }
}

