<?php

namespace App\Tests;

use App\Entity\Admin;
use PHPUnit\Framework\TestCase;

class AdminUnitTest extends TestCase
{
    public function testIsTrue(): void
    {
        $admin = new Admin();

        $admin->setEmail('admin@test.com');

    }
}
