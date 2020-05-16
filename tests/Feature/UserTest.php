<?php

namespace Tests\Feature;

use App\Leest;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Passport\Passport;
use Tests\TestCase;

class UserTest extends TestCase
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
    public function test_a_user_can_create_an_item_without_a_leest()
    {
        $data = [
            'title' => 'Todo Title',
            'content' => 'Lots of content',
            'user_id' => 1,
        ];
        $response = $this->json('POST', '/api/items', $data);
        $response->assertJson([
            'item' => [
                'title' => 'Todo Title',
                'content' => 'Lots of content',
                'user_id' => 1,
            ],
        ]);
        $response->assertStatus(201);
    }

    public function test_a_user_can_create_an_item_with_a_leest()
    {
        $leest = factory(Leest::class)->create([
            'user_id' => $this->user->id,
            'id' => 123,
        ]);
        $data = [
            'title' => 'Todo Title',
            'content' => 'Lots of content',
            'user_id' => 1,
            'leest' => $leest->id
        ];
        $response = $this->json('POST', '/api/items', $data);
        $response->assertJson([
            'item' => [
                'title' => 'Todo Title',
                'content' => 'Lots of content',
                'user_id' => 1,
                'leest_id' => $leest->id,
            ],
        ]);
        $response->assertStatus(201);
    }

    public function test_user_can_get_lists()
    {
        factory(Leest::class, 3)->create([
            'user_id' => $this->user->id,
        ]);
        $response = $this->json('GET', '/api/home');
        $data = json_decode($response->getContent());
        $leests = $data->leests;
        $this->assertEquals(3, count($leests));
    }

    public function test_user_can_create_leest()
    {
        $data = [
            'title' => 'Leest Title',
            'user_id' => $this->user->id,
        ];
        $response = $this->json('POST', '/api/leests', $data);
        $response->assertJson([
            'leest' => [
                'title' => 'Leest Title',
                'user_id' => $this->user->id,
            ],
        ]);
    }
}
