<?php

namespace App\Livewire\Board\Teachers;


use Livewire\Component;
use App\Models\User;
use App\Enums\UserType;
use Livewire\WithPagination;
class ListAllTeachers extends Component
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
        $teachers = User::where(function($query){
            return $query->where('type' , UserType::TEACHER);
        })
        ->when($this->search , function($query){
            $query->where(function($query){
                $query->where('email' , 'LIKE' , '%'.$this->search.'%' )->orWhere('name' , 'LIKE' , '%'.$this->search.'%' )->orWhere('mobile' , 'LIKE' , '%'.$this->search.'%' );
            });
        })
        ->latest()
        ->paginate($this->rows);
        return view('livewire.board.teachers.list-all-teachers' , compact('teachers'));
    }
}
