<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class UserReqisterForm extends Component
{
    use WithFileUploads;

     // validasi cara baru
    #[Validate("required|min:3")]
    public $name = "";
    #[Validate("required|email:dns|unique:users,email")]
    public $email = "";
    #[Validate("required|min:3")]
    public $password = "";
    #[Validate("image|max:5000")]
    public $avatar = "";

    public function addNewUser()
    {
        // lanjutan dari cara baru
        $validated = $this->validate();

        if($this->avatar){
            $validated["avatar"] = $this->avatar->store("avatar", "public");
        } else {
            $validated["avatar"] = null;
        }

        User::create([
            "avatar" => $validated["avatar"],
            'name' => $this->name,
            'email' => $this->email,
            'email_verified_at' => now(),
            'password' => Hash::make($this->password),
            'remember_token' => Str::random(10),
        ]);

        $this->reset();

        session()->flash("success", "User has been created");

        $this->dispatch("created-users");
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
        session()->flash("success", "User has been created");
        $this->dispatch("created-users");
        }
        
    public function clearUser()
    {
        User::truncate();
        $this->dispatch("created-users");
    }

    public function resetPreviewAvatar(){
        $this->reset(["avatar"]);
    }

     public function placeholder()
    {
        return view("livewire.placeholders.user-register-placeholder");
    }


    public function render()
    {
        return view('livewire.user-reqister-form');
    }
}
