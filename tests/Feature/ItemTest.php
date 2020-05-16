<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Passport\Passport;
use Tests\TestCase;

class ItemTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = factory(User::class)->create([
            'password' => password_hash('password', PASSWORD_BCRYPT),
            'email' => 'test@fake.com',
        ]);
        Passport::actingAs($this->user);
    }
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }
}
