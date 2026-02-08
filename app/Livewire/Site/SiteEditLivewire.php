<?php

namespace App\Livewire\Site;

use Livewire\Component;

use App\Models\Site;
use App\Http\Requests\Site\StoreUpdateFormRequest;

class SiteEditLivewire extends Component
{

    public bool $isEdit = false;

    public string $id;
    public string $url;

    public function mount($id = null)
    {
        if ($id) {

            $this->isEdit = true;

            $site = Site::where('id', $this->id)->firstOrFail();

            $this->url = (string) $site->url;
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

            $site = Site::where('id', $this->id)->firstOrFail();

            $site->update([
                'url'       => $this->url,
            ]);

            $this->redirectRoute('site');

        } catch (\Exception $e) {
            $this->showSwalError('Falha ao inserir registro: ' . $e->getMessage());
        }
    }

    public function destroy(): void
    {
        try {
            $site = Site::where('id', $this->id)->firstOrFail();

            $site->delete();

            $this->redirectRoute('site');

        } catch (\Exception $e) {
            $this->showSwalError('Falha ao deletar registro: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.site.create-edit')->layout('layouts.app');
    }
}
