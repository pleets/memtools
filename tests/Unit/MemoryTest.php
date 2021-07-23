<?php

namespace Pleets\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Pleets\MemoryTools\Memory;

class MemoryTest extends TestCase
{
    /** @test */
    public function itCanFormatTheGivenMemory()
    {
        $memory = new Memory(1000);

        $kilobytes = $memory->format()->toKilobytes()->toString();

        $this->assertSame('1KB', $kilobytes);
        $this->assertSame(1000, $memory->get());
    }

    /** @test */
    public function itCanGetUsageMemoryAndMaxMemory()
    {
        $memory = new Memory();

        $usage = $memory->usage()->format()->getQuantity();
        $maxUsage = $memory->maxUsage()->format()->getQuantity();

        $this->assertIsNumeric($usage);
        $this->assertIsNumeric($maxUsage);
        $this->assertTrue($maxUsage > $usage);
    }
}
