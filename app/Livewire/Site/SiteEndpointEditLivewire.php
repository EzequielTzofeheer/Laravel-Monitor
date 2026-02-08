<?php

namespace App\Livewire\Site;

use Livewire\Component;

use App\Models\Site;
use App\Models\Endpoint;
use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;
use App\Http\Requests\Endpoint\StoreUpdateFormRequest;

class SiteEndpointEditLivewire extends Component
{
    use WithPagination;
    use WithoutUrlPagination;

    public bool $isEdit = false;

    public string $id;
    public string $url;

    public string $idEndpoint;
    public string $name;
    public int $frequency;

    public function mount($idEndpoint = null)
    {
        $site = Site::where('id', $this->id)->firstOrFail();

        $this->url = (string) $site->url;

        if ($idEndpoint) {

            $this->isEdit = true;

            $endpoint = Endpoint::where('id', $idEndpoint)->firstOrFail();

            $this->name = (string) $endpoint->name;
            $this->frequency = (string) $endpoint->frequency;
        }
    }

    protected function rules(): array
    {
        return (new StoreUpdateFormRequest())->rules();
    }

    public function update(): void
    {
        $this->validate();

        try {

            $endpoint = Endpoint::where('id', $this->idEndpoint)->firstOrFail();

            $endpoint->update([
                'name'          => $this->name,
                'frequency'     => $this->frequency,
            ]);

            $this->redirectRoute('site.endpoint', $this->id);

        } catch (\Exception $e) {
            $this->showSwalError('Falha ao inserir registro: ' . $e->getMessage());
        }
    }

    public function destroy(): void
    {
        try {
            $endpoint = Endpoint::where('id', $this->idEndpoint)->firstOrFail();

            $endpoint->delete();

            $this->redirectRoute('site.endpoint', $this->id);

        } catch (\Exception $e) {
            $this->showSwalError('Falha ao deletar registro: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.site.endpoint-create-edit')->layout('layouts.app');
    }
}
