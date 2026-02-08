<?php

namespace App\Livewire\Site;

use Livewire\Component;

use App\Models\Site;

use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;

class SiteLivewire extends Component
{
    use WithPagination;

    use WithoutUrlPagination;

    public string $search = '';

    public function sites()
    {
        return Site::query()
            ->when($this->search, function ($query) {
                $query->where(function ($q) {
                    $q->where('url', 'like', '%' . $this->search . '%')
                        ->orWhere('user_id', 'like', '%' . $this->search . '%');
                });
            })
            ->latest()
            ->paginate();
    }

    public function render()
    {
        return view('livewire.site.index', [
            'sites' => $this->sites(),
        ])->layout('layouts.app');
    }
}
