<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class IncreaseElementViews implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $element;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($element)
    {
        $this->element = $element;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->element->update([
            'views' => $this->element->views + 1
        ]);
    }
}
