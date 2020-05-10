<?php

namespace Tests\Feature;
use App\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {


        $response = $this->post('/registrar' ,[
            'email'=> "teste@teste.org",
            'name' => "teste",
            "password"=> '12345678',
        ]);
        $response->assertStatus(200);
    }
}
