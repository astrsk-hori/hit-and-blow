<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Service\HitAndBlowService;

class HitAndBlowCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:hit_and_blow';

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
    public function handle(HitAndBlowService $hitAndBlowService)
    {
        \Log::debug(print_r($hitAndBlowService->getAnswer(), true));

        while (true) {
            $answer = $this->ask('input 3 number.');
            try {
                if ($hitAndBlowService->checkAnswer($answer)) {
                    $this->info("complete !");
                    $this->info("your answer count:".$hitAndBlowService->getAnswerCnt());

                    break;
                }

                $this->info($hitAndBlowService->getResultString());

            } catch (Exception $e) {
                $this->info($e->getMessage());

                break;
            }
        }
    }
}
