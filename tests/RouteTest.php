<?php

use App\User;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;


class RouteTest extends TestCase
{
    /**
     *Test landing page
     */
    public function testLandingPage()
    {
        $this->visit('/');
        $this->see('This is landing page');

    }
    /**
     * Test admin Route
     *
     */
    public function testAdminRoute()
    {

        $response = $this->call('GET', '/admin');
        $this->assertEquals(401, $response->status());
        $user = User::first();
        $this->be($user);
        $response = $this->call('GET', '/admin');
        $this->assertEquals(200, $response->status());
    }
    /**
     * Test create Route
     *
     */
    public function testCreateRoute()
    {

        $response = $this->call('GET', '/posts/create');
        $this->assertEquals(401, $response->status());
        $user = User::first();
        $this->be($user);
        $response = $this->call('GET', '/admin');
        $this->assertEquals(200, $response->status());
    }
}
