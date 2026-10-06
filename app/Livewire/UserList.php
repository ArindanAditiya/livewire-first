<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\On; 
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class UserList extends Component
{
    public $query = "";

    use WithPagination, WithoutUrlPagination;

    #[On("created-users")]
    public function updatedQuery()
    {
        $this->resetPage();
    }
        
    public function searchUser(){
        $this->resetPage();
    }

    public function deleteUser(User $user)
    {
        $user->delete();
        if($user->avatar){
            Storage::disk("public")->delete($user->avatar);
        }
    }

    public function render()
    {
        return view('livewire.user-list',[
            "users" => User::latest()->where("name", "like", "%{$this->query}%")->paginate(6),
        ]);
    }
}
