<?php

namespace App\Jobs\Site;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

use App\Models\Endpoint;
use Illuminate\Support\Facades\Http;

class EndpointCheckJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(public Endpoint $endpoint)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $url = $this->endpoint->url();
        $response = Http::get($url);

        $this->endpoint->checks()->create([
            'status_code'   => $response->status(),
            'response_body' => $response->body(),
        ]);

        $this->endpoint->update([
           'next_check' => now()->addMinutes($this->endpoint->frequency),
        ]);
    }
}
