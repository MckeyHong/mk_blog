<?php

use Illuminate\Database\Seeder;
class SystemSeeder extends Seeder{

    public function run(){
        $config = [
            [
                'cate'=>1,
                'system_name'=>'title',
                'system_value'=>'網站標題'
            ],
            [
                'cate'=>1,
                'system_name'=>'subheading',
                'system_value'=>'副標題'
            ],
            [
                'cate'=>1,
                'system_name'=>'put_on_record',
                'system_value'=>'admin123'
            ],
            [
                'cate'=>1,
                'system_name'=>'all_ow_access',
                'system_value'=>1
            ],
            [
                'cate'=>1,
                'system_name'=>'allow_comments',
                'system_value'=>1
            ],
            [
                'cate'=>1,
                'system_name'=>'seo_key',
                'system_value'=>'seo關鍵字'
            ],
            [
                'cate'=>1,
                'system_name'=>'seo_desc',
                'system_value'=>'seo 描述'
            ],
            [
                'cate'=>1,
                'system_name'=>'copyright',
                'system_value'=>'版權聲明'
            ]
        ];
        DB::table('systems')->insert($config);
    }

}