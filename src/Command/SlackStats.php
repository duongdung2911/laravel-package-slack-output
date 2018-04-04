<?php

namespace CodeGym\SlackOutput\Command;

use Illuminate\Console\Command;
use CodeGym\SlackOutput\Facade\SlackOutput;

class SlackStats extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'slack:stats';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send recent stats to slack';


    /**
     * Execute the command.
     *
     * @return void
     */
    public function handle()
    {
        $this->comment("Send stats to slack");
        SlackOutput::stats();
        $this->info("Done");
    }

}