<?php
return array(
	//'配置项'=>'配置值'
    'TMPL_CACHE_ON'   => false,  // 默认开启模板编译缓存 false 的话每次都重新编译模板
    'ACTION_CACHE_ON'  => false,  // 默认关闭Action 缓存

    'HTML_CACHE_ON'   => false,   // 默认关闭静态缓存
    'DB_FIELDS_CACHE'       =>  false,        // 启用字段缓存
/*
    'TOKEN_ON'      =>    true,  // 是否开启令牌验证 默认关闭
    'TOKEN_NAME'    =>    '__hash__',    // 令牌验证的表单隐藏字段名称，默认为__hash__
    'TOKEN_TYPE'    =>    'md5',  //令牌哈希验证规则 默认为MD5
    'TOKEN_RESET'   =>    true,  //令牌验证出错后是否重置令牌 默认为true
*/
    'DATA_CACHE_TYPE'       =>  'Memcache' // 数据缓存类型,支持:File|Db|Apc|Memcache|Shmop|Sqlite|Xcache|Apachenote|Eaccelerator
);