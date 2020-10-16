<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Redis;
use App\Model\GoodsModel;
use Log;
class updategoodszxp extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'updategoodszxp';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '从redis更新详情点击数量到数据库';

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
    public function handle()
    {
        $hits = Redis::zrange('item_',0,-1);
        if(count($hits)){
            foreach($hits as $v){
                $update = [
                    'hits'=>Redis::zscore('item_',$v)
                ];
                $hitarr = explode('_', $v);
                $goods_id = $hitarr[1];
                $res = GoodsModel::where('goods_id',$goods_id)->update($update);
                if($res){
                    Log::info($goods_id.'更新成功');
                }
            }
                
        }
    }
}
