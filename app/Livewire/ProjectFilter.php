<?php

namespace App\Livewire;

use Livewire\Component;

class ProjectFilter extends Component
{
    public $filter = 'all';

    public function setFilter($category)
    {
        $this->filter = $category;
    }

    public function getProjectsProperty()
    {
        if ($this->filter === 'all') {
            return \App\Models\Project::latest()->paginate(9); // Using pagination might need WithPagination trait
        }

        return \App\Models\Project::where('sector', $this->filter)->latest()->paginate(9);
    }

    use \Livewire\WithPagination;

    public function render()
    {
        return view('livewire.project-filter', [
            'projects' => $this->projects
        ]);
    }
}
