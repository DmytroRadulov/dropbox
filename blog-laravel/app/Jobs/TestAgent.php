<?php

namespace App\Jobs;

use App\Models\Visit;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Package\Interface\Test\UserAgentInterface;

class TestAgent implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /** @var UserAgentInterface  */
    private $userAgent;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(UserAgentInterface $userAgent)
    {
        $this->userAgent = $userAgent;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $ip = request()->ip();
        if ($ip == '127.0.0.1') {
            $ip = request()->server->get('HTTP_X_FORWARDED_FOR');
        }

        $browser = $this->userAgent->getBrowser();
        $platform = $this->userAgent->getPlatform();

        if (!empty($browser) && !empty($platform)) {
            Visit::create([
                'browser' => $browser,
                'platform' => $platform,
            ]);
        }
    }
}
