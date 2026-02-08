<?php

namespace App\Livewire\Site;

use Livewire\Component;

use App\Models\Site;
use App\Http\Requests\Site\StoreUpdateFormRequest;

class SiteCreateLivewire extends Component
{
    public string $url;

    protected function rules(): array
    {
        return (new StoreUpdateFormRequest())->rules();
    }

    public function store(): void
    {
        $this->validate();

        try {

            Site::create([
                'url'       => $this->url,
                'user_id'   => auth()->user()->id,
            ]);

            $this->redirectRoute('site');

        } catch (\Exception $e) {
            $this->showSwalError('Falha ao inserir registro: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.site.create')->layout('layouts.app');
    }
}
