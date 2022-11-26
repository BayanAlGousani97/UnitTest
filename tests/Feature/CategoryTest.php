<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    /**
     * A basic feature get request test example.
     *
     * @return void
     */
    public function test_a_basic_get_request()
    {
        $response = $this->get('/categories');

        $response->assertStatus(200);
    }

    /**
     * A basic feature post request test example.
     *
     * @return void
     */
    public function test_a_basic_post_request()
    {
        $response = $this->post('/categories', ['name' => fake()->userName()]);

        $response->assertStatus(200);
    }

    /**
     * A basic feature post request and interacting with headers
     *
     * @return void
     */
    public function test_interacting_with_headers()
    {
        $response = $this->withHeaders([
            'Content-Type' => 'multipart/form-data; ',

        ])->post('/categories', ['name' => 'clothes']);

        $response->assertStatus(200);
    }

    /**
     * A basic feature post request and interacting with headers (test failed status)
     *
     * @return void
     */
    public function test_interacting_with_headers_failed_status()
    {
        $response = $this->withHeaders([
            'Content-Type' => 'multipart/form-data; ',
        ])->post('/categories', ['name' => '']); // empty name

        $response->assertStatus(500); // must be 500 beacause this column is reqauried
    }

    /**
     * Test get request and interacting with one cookie
     *
     * @return void
     */
    public function test_interacting_with_cookie()
    {
        $response = $this->withCookie('name', 'bayan')->get('/categories');

        $response->assertStatus(200);
    }

    /**
     * Test get request and interacting with cookies
     *
     * @return void
     */
    public function test_interacting_with_cookies()
    {
        $response = $this->withCookies([
            'name' => 'bayan',
            'email' => 'bayanalgousani@gmail.com',
        ])->get('/categories');

        $response->assertStatus(200);
    }

    /**
     * Test get request and interacting with the session
     *
     * @return void
     */
    public function test_interacting_with_the_session()
    {
        $response = $this->withSession(['banned' => false])->get('/categories');

        $response->assertStatus(200);
    }

    /**
     * Test get request as user
     *
     * @return void
     */
    public function test_an_action_that_requires_authentication()
    {
        // $user = User::factory()->create();
        // $user = User::first();
        $user = User::find(5);
        $response = $this->actingAs($user)
            ->withSession(['banned' => false])
            ->get('/categories');

        $response->assertStatus(200);
    }

    /**
     * Debugging Responses
     * A basic feature get request test example with debuge
     * @return void
     *
     */
    public function test_a_basic_debuge_get_request()
    {
        $response = $this->get('/categories');
        $response->dumpHeaders(); // method may be used to examine and debug the headers contents
        $response->dumpSession(); // method may be used to examine and debug the session contents
        $response->dump(); // method may be used to examine and debug the response contents (ex: blade page)

        // $response->ddHeaders(); // to dump information about headers response and then stop execution
        // $response->ddSession(); // to dump information about session response and then stop execution
        // $response->dd(); // to dump information about the response contents and then stop execution (ex: blade page)
        $response->assertStatus(200);
    }
}
