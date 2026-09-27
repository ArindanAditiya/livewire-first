<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Livewire\Component;

class Users extends Component
{
    public $title = "User Page";
    public $name = "";
    public $email = "";
    public $password = "";

    public function addNewUser()
    {
        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'email_verified_at' => now(),
            'password' => Hash::make($this->password),
            'remember_token' => Str::random(10),
        ]);

        $this->reset();
    }

    public function createRandomUser()
    {
        User::create([
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
        ]);
    }

    public function clearUser()
    {
        User::truncate();
    }

    public function deleteUser(User $user)
    {
        $user->delete();
    }

    public function render()
    {
        return view('livewire.users',[
            "users" => User::all()
        ]);
    }
}
