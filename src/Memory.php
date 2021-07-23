<?php

namespace Pleets\MemoryTools;

use Pleets\Units\Information;
use Pleets\Units\Units\InformationUnit;

class Memory
{
    /**
     * Memory in bytes
     *
     * @var int
     */
    protected int $memory;

    public function __construct(int $memory = 0)
    {
        $this->memory = $memory;
    }

    public function usage(): self
    {
        $this->memory = memory_get_usage();

        return $this;
    }

    public function maxUsage(): self
    {
        $this->memory = memory_get_peak_usage();

        return $this;
    }

    public function get(): int
    {
        return $this->memory;
    }

    public function format(): Information
    {
        return Information::fromUnit(InformationUnit::BYTE, $this->memory);
    }
}
