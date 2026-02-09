<?php

namespace App\Livewire\Site;

use Livewire\Component;

use App\Models\Site;
use App\Models\Endpoint;
use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;

class SiteEndpointLivewire extends Component
{
    use WithPagination;
    use WithoutUrlPagination;

    public string $id;
    public string $url;

    public function mount()
    {
        $site = Site::where('id', $this->id)->firstOrFail();

        $this->url = (string) $site->url;
    }

    public string $search = '';

    public function endpoints()
    {
        return Endpoint::query()
            ->when($this->search, function ($query) {
                $query->where(function ($q) {
                    $q->where('endpoint', 'like', '%' . $this->search . '%')
                        ->orWhere('frequency', 'like', '%' . $this->search . '%');
                });
            })
            ->latest()
            ->paginate();
    }

    public function render()
    {
        return view('livewire.site.endpoint', [
            'endpoints' => $this->endpoints(),
        ])->layout('layouts.app');
    }
}
