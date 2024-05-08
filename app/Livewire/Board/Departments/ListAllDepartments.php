<?php

namespace App\Livewire\Board\Departments;


use Livewire\Component;
use App\Models\Department;
use App\Models\Faculty;
use Livewire\WithPagination;
class ListAllDepartments extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $rows = 30 ;
    public $search;
    public $faculty_id;
    protected $listeners   = ['deleteItem'];

    public $faculties;


    public function mount()
    {
        $this->faculties =  Faculty::select('id' , 'name' )->get();
    }
 
    public function deleteItem($item_id)
    {
        $item = Department::find($item_id);
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


    public function resetFilters() {

         $this->reset('faculty_id'); 
    }

    public function render()
    {
        $departments = Department::with('user' , 'faculty')
        ->when($this->search , function($query){
            $query->where('name' , 'LIKE' , '%'.$this->search.'%' );
        })
        ->when($this->faculty_id , function($query){
            $query->where('faculty_id' , $this->faculty_id );
        })
        ->latest()
        ->paginate($this->rows);
        return view('livewire.board.departments.list-all-departments' , compact('departments'));
    }
}
