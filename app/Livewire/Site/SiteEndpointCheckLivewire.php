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
    public string $idEndpoint;

    public function mount()
    {
        $site = Site::where('id', $this->id)->firstOrFail();

        $this->url = (string) $site->url;
    }

    public string $search = '';

    public function checks()
    {
        return Check::where('endpoint_id', $this->idEndpoint)->latest()->paginate();
    }

    public function render()
    {
        return view('livewire.site.check', [
            'checks' => $this->checks(),
        ])->layout('layouts.app');
    }
}
