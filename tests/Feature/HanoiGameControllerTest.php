<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HanoiGameControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */


    protected $uri = '/api';

    public function test_that_user_can_get_game_status(): void
    {
        $response = $this->get("$this->uri/state");

        $response->assertStatus(200);

        $response->assertJsonStructure([
            "pegs",
            "game_over"
        ]);
    }

    public function test_that_user_can_move_disk(): void
    {

        $from  = 0; // 0 represent peg 1

        $to = 1; // 1 represent peg 2;

        $response = $this->post("$this->uri/move/$from/$to");

        $response->assertStatus(200);
    }


    public function test_that_wrong_disk_move_doesnt_work(): void
    {

        $from  = 5; // 0 represent peg 5 ( wrong peg because we only have 3 pegs )

        $to = 1; // 1 represent peg 1;

        $response = $this->post("$this->uri/move/$from/$to");

        $response->assertStatus(400);
    }
}
