<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserTest extends TestCase
{
	/** @test */
    public function check_landing_page()
    {
    	#$this->withoutExceptionHandling();
        $response = $this->get('/')->assertStatus(404);
    }

    /** @test */
    public function a_landing_page_check_user_id()
    {
    	#$this->withoutExceptionHandling();
        $response = $this->call('GET', '/', ['id'=>1])->assertOk();
    }
}
