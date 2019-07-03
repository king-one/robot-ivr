<?php
/**
 * Created by PhpStorm.
 * User: Yxs <250915790@qq.com>
 * Date: 2019/6/3
 * Time: 11:52
 */

namespace App\Http\Controllers\Api\Task;


use App\Http\Controllers\Api\Controller;
use App\Repositories\Eloquent\OutboundTaskRepository;
use Illuminate\Http\Request;

/**
 * 外呼任务管理
 * Class Outbound
 * @package App\Http\Controllers\Api\Task
 */
class Outbound extends Controller
{

    protected $outboundTask;

    public function __construct(OutboundTaskRepository $outboundTask)
    {
        $this->outboundTask = $outboundTask;
    }

    /**
     * @param Request $request
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(Request $request)
    {
        $this->outboundTask->create($request->all());
    }

    /**
     * @param Request $request
     * @param string $id
     */
    public function update(Request $request, $id)
    {
        info('update task:', [
            'id' => $id,
            'data' => $request->all()
        ]);
    }

    /**
     * @param $id
     */
    public function destroy($id)
    {

    }

    public function start($id)
    {

    }

    public function stop($id)
    {

    }

}
