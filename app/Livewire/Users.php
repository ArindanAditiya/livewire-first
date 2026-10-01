<?php

namespace App\Livewire; 

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class Users extends Component
{
    public $title = "User Page";

    // validasi cara baru
    use WithFileUploads;

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
    }

    public function clearUser()
    {
        User::truncate();
    }

    public function deleteUser(User $user)
    {
        $user->delete();
        if($user->avatar){
            Storage::disk("public")->delete($user->avatar);
        }
    }

    public function resetPreviewAvatar(){
        $this->reset(["avatar"]);
    }

    public function render()
    {
        return view('livewire.users',[
            "users" => User::all()
        ]);
    }
}
