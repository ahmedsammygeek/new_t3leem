<?php

namespace App\Livewire\Board\Faculties;


use Livewire\Component;
use App\Models\Faculty;
use Livewire\WithPagination;
class ListAllFaculties extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $rows = 30 ;
    public $search;
    protected $listeners   = ['deleteItem'];

    public function deleteItem($item_id)
    {
        $item = Faculty::find($item_id);
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
        $faculties = Faculty::when($this->search , function($query){
            $query->where('name' , 'LIKE' , '%'.$this->search.'%' );
        })
        ->latest()
        ->paginate($this->rows);
        return view('livewire.board.faculties.list-all-faculties' , compact('faculties'));
    }
}
