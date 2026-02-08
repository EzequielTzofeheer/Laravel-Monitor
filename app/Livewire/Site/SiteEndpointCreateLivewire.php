<?php

namespace App\Livewire\Site;

use Livewire\Component;

use App\Models\Site;
use App\Models\Endpoint;
use App\Http\Requests\Endpoint\StoreUpdateFormRequest;

class SiteEndpointCreateLivewire extends Component
{
    public bool $isEdit = false;
    public string $id;
    public string $url;

    public string $name;
    public int $frequency;

    public function mount()
    {
        $site = Site::where('id', $this->id)->firstOrFail();

        $this->url = (string) $site->url;
    }

    protected function rules(): array
    {
        return (new StoreUpdateFormRequest($this->id))->rules();
    }

    public function store(): void
    {
        $this->validate();

        try {

            Endpoint::create([
                'site_id'       => $this->id,
                'name'          => $this->name,
                'frequency'     => $this->frequency,
                'next_check'    => now()->addSeconds($this->frequency),
            ]);

            $this->redirectRoute('site.endpoint', $this->id);

        } catch (\Exception $e) {
            $this->showSwalError('Falha ao inserir registro: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.site.endpoint-create-edit')->layout('layouts.app');
    }
}
