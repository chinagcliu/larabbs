<?php

use App\Models\Link;
use Illuminate\Database\Seeder;

class LinksTableSeeder extends Seeder
{
    public function run()
    {
        // 生成数据集合
        $links = factory(Link::class)->times(6)->make();

        // 将数据集合转换为数组，并插入到数据库中
        Link::insert($links->toArray());
    }
}
