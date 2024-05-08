<?php

namespace App\Livewire\Board\Admins;


use Livewire\Component;
use App\Models\User;
use App\Enums\UserType;
use Livewire\WithPagination;
class ListAllAdmins extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $rows = 30 ;
    public $search;
    public $showDeletionConfirmationModal = false;
    protected $listeners   = ['deleteItem'];

    public function deleteItem($item_id)
    {
        $item = User::find($item_id);
        if ($item) {
            $item->delete();
            $this->dispatch('itemDeleted');
        }
    }   


    public function updatedRows()
    {
        $this->resetPage();
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $admins = User::where(function($query){
            return $query->where('type' , UserType::ADMIN );
        })
        ->when($this->search , function($query){
            $query->where('email' , 'LIKE' , '%'.$this->search.'%' )->orWhere('name' , 'LIKE' , '%'.$this->search.'%' )->orWhere('mobile' , 'LIKE' , '%'.$this->search.'%' );
        })
        ->latest()
        ->paginate($this->rows);
        return view('livewire.board.admins.list-all-admins' , compact('admins'));
    }
}
