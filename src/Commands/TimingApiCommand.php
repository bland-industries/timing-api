<?php

namespace BlandIndustries\TimingApi\Commands;

use Illuminate\Console\Command;

class TimingApiCommand extends Command
{
    public $signature = 'timing-api';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
