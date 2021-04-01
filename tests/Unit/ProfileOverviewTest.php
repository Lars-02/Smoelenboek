<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\TestCase;

class ProfileOverviewTest extends TestCase
{
    /**
     * An unit test for the profiles overview page.
     *
     */

    use RefreshDatabase;

    public function test_profiles_overview_can_be_rendered()
    {
        $this->assertTrue(true);
    }
}
