<?php

namespace App\Console\Commands;

use App\Repositories\Eloquent\OutboundNumberRepository;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;

/**
 * 外呼失败重播次数
 * Class AutoDialerRecycle
 * @package App\Console\Commands
 */
class AutoDialerRecycle extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'auto-dialer:recycle {task_id : 任务ID}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '外呼任务失败后重新呼叫';

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
     * @param OutboundNumberRepository $repository
     * @return mixed
     */
    public function handle(OutboundNumberRepository $repository)
    {
        //获取任务id
        $task_id = $this->argument('task_id');

        //扫描呼叫失败的任务号码
        $taskNumber = $repository
            ->setTask($task_id)->scopeQuery(function ($model) {
                return $model->recycleEnable()->lineFailed();
            })
            ->get();
        //重新外呼
        $taskNumber->each(function ($item) use ($task_id) {
            $item->increment('recycle', 1, [
                'state' => null,
                'calldate' => Carbon::now(),
            ]);
        });

    }
}