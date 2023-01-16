<?php

namespace Tests\Unit;

use App\Models\Agama29;
use App\Models\Data29;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_login()
    {
        $response = $this->get('/login29');
        $response->assertStatus(200);
    }

    public function test_register()
    {
        $response = $this->get('/register29');
        $response->assertStatus(200);
    }

    public function test_insert_barang()
    {
        $agama = Agama29::create([
            'id' => 1,
            'nama_agama' => 'Stroller',
            ]);
            $this->assertDatabaseHas('agama29', [
            'id' => 1,
            'nama_agama' => 'Stroller',
            ]);
    }

    public function test_update_barang()
    {
        $agama = Agama29::where('nama_agama', 'Kereta Dorong')->update([
            'nama_agama' => 'Stroller',
            ]);
            $this->assertDatabaseHas('agama29', [
            'id' => 1,
            'nama_agama' => 'Stroller',
            ]);
    }

    public function test_delete_barang()
    {
        Agama29::where('nama_agama', 'Kereta Dorong')->delete();
        $this->assertDatabaseMissing('agama29', [
            'id' => 1,
            'nama_agama' => 'Kereta Dorong',
        ]);
    }

    public function test_insert_data()
    {
        $data = Data29::create([
            'id_user' => '1',
            'alamat' => 'Colomadu',
            'tempat_lahir' => 'Karanganyar',
            'tanggal_lahir' => '2020-09-08',
            'id_agama' => 3
            ]);
            $this->assertDatabaseHas('data29', [
            'id_user' => '1',
            'alamat' => 'Colomadu',
            'tempat_lahir' => 'Karanganyar',
            'tanggal_lahir' => '2020-09-08',
            'id_agama' => 3
            ]);
    }

    public function test_update_data()
    {
        $data = Data29::where('id_user', '1')->update([
            'alamat' => 'Kartasura',
            ]);
            $this->assertDatabaseHas('data29', [
            'id_user' => '1',
            'alamat' => 'Kartasura',
            'tempat_lahir' => 'Karanganyar',
            'tanggal_lahir' => '2020-09-08',
            'id_agama' => 3
            ]);
    }

    public function test_delete_data()
    {
        Data29::where('id_user', '1')->delete();
        $this->assertDatabaseMissing('data29', [
            'id_user' => '1',
            'alamat' => 'Kartasura',
            'tempat_lahir' => 'Karanganyar',
            'tanggal_lahir' => '2020-09-08',
            'id_agama' => 3
        ]);
    }



}
