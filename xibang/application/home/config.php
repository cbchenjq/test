<?php
//配置文件
use think\Request;

return array(
        //视图输出字符串内容替换
        'view_replace_str' => array(
            '__CSS__' => '/static/home/css',
            '__JS__' => '/static/home/js',
            '__IMG__' => '/static/home/images',
            '__FONT__' => '/static/home/font',
            '__SCSS__' => '/static/home/scss',
            '__DMAIN__' => Request::instance()->domain()
        ),
        'template' => array(
            'layout_on' => true,
            'layout_name' => 'content'

        )

    );