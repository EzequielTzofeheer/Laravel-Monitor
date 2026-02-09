<?php

namespace App\Jobs\Site;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

use App\Models\Endpoint;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Response;

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
            'response_body' => $this->responseBody($response),
        ]);

        $this->endpoint->update([
           'next_check' => $this->nextcheck(),
        ]);
    }

    private function responseBody(Response $response): string | null
    {
        if ($response->successful()) {
            return null;
        }

        return (string) $response->body();
    }

    private function nextcheck()
    {
        return now()->addMinutes($this->endpoint->frequency);
    }
}
