<?php

namespace App\Livewire\Board\Admins;

use Livewire\Component;
use Livewire\Attributes\On; 

class ChangeAdminPassword extends Component
{

    #[On('show-password-change-modal')] 
    public function openPasswordModal($admin_id)
    {
        $this->dispatch('openModal');
    }


    public function render()
    {
        return view('livewire.board.admins.change-admin-password');
    }
}
