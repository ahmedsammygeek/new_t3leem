<?php

namespace App\Livewire\Board\Universities;


use Livewire\Component;
use App\Models\University;
use Livewire\WithPagination;
class ListAllUniversities extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $rows = 90 ;
    public $search;
    protected $listeners   = ['deleteItem'];

    public function deleteItem($item_id)
    {
        $item = University::find($item_id);
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
        $universities = University::when($this->search , function($query){
            $query->where('name' , 'LIKE' , '%'.$this->search.'%' );
        })
        ->latest()
        ->paginate($this->rows);
        return view('livewire.board.universities.list-all-universities' , compact('universities'));
    }
}
