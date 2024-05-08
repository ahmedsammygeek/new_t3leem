<?php

namespace App\Livewire\Board\Admins;

use Livewire\Component;
use Livewire\Attributes\On; 
use Livewire\Attributes\Validate;
use App\Models\User;
use Hash; 
use Auth;
class ChangeAdminPassword extends Component
{

    public $admin_id;

    #[Validate('required')] 
    public $password;

    #[Validate('required')] 
    public $password_confirmation;

    #[Validate('required')] 
    public $current_password;

    #[On('show-password-change-modal')] 
    public function openPasswordModal($admin_id)
    {
        $this->admin_id = $admin_id;
        $this->dispatch('openModal');
    }


    public function save()
    {
        $this->validate(); 

        // we need first to check if this user put his own correct password


        if (!Hash::check($this->current_password, Auth::user()->password ) ) {
            $this->addError('current_password', 'كلمه المرور الحاليه غير صحيحه');
            return;
        }

        $admin = User::find($this->admin_id);
        if ($admin) {
            $admin->password = $this->password;
            $admin->save();
            $this->dispatch('passwordChanged');
        }


    }

    public function render()
    {
        return view('livewire.board.admins.change-admin-password');
    }
}
