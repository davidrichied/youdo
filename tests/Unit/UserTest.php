<?php

namespace Tests\Unit;

use App\Item;
use App\Leest;
use App\User;
use Laravel\Passport\Passport;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public $user;

    public $leest;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = factory(User::class)->create([
            'password' => password_hash('password', PASSWORD_BCRYPT),
            'email' => 'test@fake.com',
        ]);
        Passport::actingAs($this->user);
    }

    public function test_user_has_items()
    {
        factory(Item::class, 5)->create([
            'user_id' => $this->user->id,
        ]);
        $this->assertEquals(5, $this->user->items->count());
    }

    public function test_user_has_leests()
    {
        $this->leest = factory(Leest::class)->create([
            'user_id' => $this->user->id,
        ]);
        $this->assertEquals(1, $this->user->leests->count());
    }
}
