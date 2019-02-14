<?php

namespace App\Console\Commands;

use App\Service\FizzBuzzService;
use Illuminate\Console\Command;

class FizzBuzzCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:fizz_buzz';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle(FizzBuzzService $fiz_buzz)
    {
        //
        $answer = $this->ask('input number.');

        $result = $fiz_buzz->exec($answer);

        $this->showDisplay($result);
    }

    /**
     * showDisplay
     *
     * @param array $fiz_buzz
     * @access private
     * @return void
     */
    private function showDisplay(array $fiz_buzz): void
    {
        foreach ($fiz_buzz as $v) {
            echo $v.PHP_EOL;
        }
    }
}
