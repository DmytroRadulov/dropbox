<?php

namespace App\Services\UserAgent;

interface UserAgentInterface
{
    public function setUserAgent($userAgent = null): ?string;

    public function getBrowser(): ?string;

    public function getPlatform(): ?string;
}
