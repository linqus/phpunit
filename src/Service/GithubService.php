<?php

namespace App\Service;

use App\Enum\HealthStatus;

class GithubService
{

    public function getHealthReport(string $dinoName): HealthStatus
    {

        return HealthStatus::HEALTHY;

    }
}