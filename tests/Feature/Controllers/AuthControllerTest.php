<?php

namespace Controllers;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Socialite\Facades\Socialite;
use Mockery;
use Tests\TestCase;

class AuthControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_auth_redirect_correctly_redirects()
    {
      $response = $this->get('/auth/redirect');
      $response->assertStatus(302);
      $response->assertRedirect();
    }

    public function test_auth_callback_creates_user_and_logs_them_in()
    {
      Socialite::partialMock();
      $fakeUser = new \stdClass();
      $fakeUser->id = 1;
      $fakeUser->email = 'test@test.com';
      $fakeUser->name = 'Test User';
      $fakeUser->token = 1;
      $fakeUser->refreshToken = 1;
      Socialite::shouldReceive('driver->google')->andReturn(true);
      Socialite::shouldReceive('driver->user')->andReturn($fakeUser);

      $response = $this->get('/auth/callback');
      $response->assertRedirect('/dashboard');
    }
}
