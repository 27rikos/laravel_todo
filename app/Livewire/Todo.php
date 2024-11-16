<?php

namespace App\Livewire;

use App\Models\Todo as ModelsTodo;
use Livewire\Component;
use Livewire\WithPagination;

class Todo extends Component
{
    use WithPagination;

    public $todo = '';
    public $search = '';
    public function render()
    {

        $todos = ModelsTodo::orderBy('created_at', 'desc')->where('todo', 'like', '%' . $this->search . '%')->paginate(5);
        return view('livewire.todo', [
            'todos' => $todos,
        ]);
    }

    public function save()
    {
        $validated = $this->validate([
            'todo' => 'required',
        ]);
        ModelsTodo::create($validated);
        return redirect()->to('/')->with('success', 'Todo ' . $this->todo . ' Was Created');
    }

    public function checklist($id)
    {
        $data = ModelsTodo::findOrFail($id);
        $data->update([
            'is_complete' => 1,
        ]);
        return redirect()->to('/')->with('success', 'Todo ' . $this->todo . ' Was Done');
    }

    public function delete($id)
    {
        $data = ModelsTodo::findOrFail($id);
        $data->delete();
        return redirect()->to('/')->with('success', 'Todo ' . $this->todo . ' Was Deleted');
    }
}
