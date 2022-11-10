<?php

namespace App\Services\UserAgent;

use Jenssegers\Agent\Agent;

class ParserJenssegers implements UserAgentInterface
{
    protected $_data;

    public function __construct()
    {
        $this->_data = new Agent();
    }

    public function getBrowser(): ?string
    {
        return $this->_data->browser() ?? null;
    }

    public function getPlatform(): ?string
    {
        return $this->_data->platform() ?? null;
    }
}
