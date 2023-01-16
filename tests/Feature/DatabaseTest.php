<?php

namespace Tests\Feature;

use App\Models\User;
use App\Controllers\Auth;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DatabaseTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_insert_database()
    {
        $user = User::create([
        'name' => 'danis', 
        'email'=> 'danis@example.com', 
        'password' => '@Secret123',   
        'role' => 'user',
        'is_active' => '0',
        'foto' => 'foto.jpg',
        ]);
        $this->assertDatabaseHas('users29', [
        'name' => 'danis', 
        'email'=> 'danis@example.com', 
        'password' => '@Secret123',   
        'role' => 'user',
        'is_active' => '0',
        'foto' => 'foto.jpg',
        ]);
    }

    public function test_update_database()
    {
        $user = User::where('id', '1')->update([
            'name' => 'danis rp'
            ]);
            $this->assertDatabaseHas('users29', [
            'name' => 'danis', 
            'email'=> 'danis@example.com', 
            'password' => '@Secret123',   
            'role' => 'user',
            'is_active' => '0',
            'foto' => 'foto.jpg',
            ]);
    }

    public function test_delete_database()
    {
        User::where('email', 'danis@example.com')->delete();
        $this->assertDatabaseMissing('users29', [
        'name' => 'danis', 
        'email'=> 'danis@example.com', 
        'password' => '@Secret123',   
        'role' => 'user',
        'is_active' => '0',
        'foto' => 'foto.jpg',
        ]);
    }

}
