<?php

namespace App\Livewire\Site;

use Livewire\Component;

use App\Models\Site;
use App\Models\Check;
use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;

class SiteEndpointCheckLivewire extends Component
{
    use WithPagination;
    use WithoutUrlPagination;

    public string $id;
    public string $url;

    public int $status_code;
    public string $response_body;
    public array $expanded = [];

    public function mount()
    {
        $site = Site::where('id', $this->id)->firstOrFail();

        $this->url = (string) $site->url;
    }

    public string $search = '';

    public function checks()
    {
        return Check::query()
            ->when($this->search, function ($query) {
                $query->where(function ($q) {
                    $q->where('status_code', 'like', '%' . $this->search . '%')
                        ->orWhere('response_body', 'like', '%' . $this->search . '%');
                });
            })
            ->latest()
            ->paginate();
    }

    public function render()
    {
        return view('livewire.site.check', [
            'checks' => $this->checks(),
        ])->layout('layouts.app');
    }
}
