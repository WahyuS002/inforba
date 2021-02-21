<?php

namespace App\Http\Livewire\Event;

use App\Models\Event;
use Livewire\Component;

class NavbarSearch extends Component
{
    public $query, $events;

    public function mount()
    {
        $this->query = '';
        $this->events = [];
    }

    public function updatedQuery()
    {
        $this->events = Event::where('title', 'like', '%' . $this->query . '%')
            ->get()
            ->toArray();
    }

    public function render()
    {
        return view('livewire.event.navbar-search');
    }
}
