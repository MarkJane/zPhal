<?php

$router = $di->getRouter();

/**
 * 前台路由
 * */
$router->add('/',
    [
        'module'     => 'frontend',
        'controller' => 'index',
        'action'     => 'index',
    ]
);
$router->add("/article/{id:[0-9]+}.html",
    [
        'module'     => 'frontend',
        'controller' => 'articles',
        'action'     => 'index',
        "id"     => 1,
    ]
)->setName('article');

$router->add('/login',
    [
        'module'     => 'admin',
        'controller' => 'login',
        'action'     => 'index',
    ]
)->setName('admin-login');

/**
 * 后台路由
 */
$router->add('/admin',
    [
        'module'     => 'admin',
        'controller' => 'index',
        'action'     => 'index',
    ]
)->setName('admin-root');

$router->add('/admin/session/login',
    [
        'module'     => 'admin',
        'controller' => 'session',
        'action'     => 'login',
    ]
);

$router->add('/admin/session/logout',
    [
        'module'     => 'admin',
        'controller' => 'session',
        'action'     => 'logout',
    ]
)->setName('admin-logout');

/* subject */
$router->add('/admin/subject',
    [
        'module'    =>  'admin',
        'controller'=>  'subject',
        'action'    =>  'index'
    ]
)->setName('list-subject');
$router->add('/admin/subject/new',
    [
        'module'    =>  'admin',
        'controller'=>  'subject',
        'action'    =>  'new'
    ]
)->setName('new-subject');
$router->add('/admin/subject/save',
    [
        'module'    =>  'admin',
        'controller'=>  'subject',
        'action'    =>  'save'
    ]
)->setName('save-subject');
$router->add('/admin/subject/edit/{id:[0-9]+}',
    [
        'module'    =>  'admin',
        'controller'=>  'subject',
        'action'    =>  'edit',
        'id'        =>  1,
    ]
)->setName('edit-subject');
$router->add('/admin/subject/update/{id:[0-9]+}',
    [
        'module'    =>  'admin',
        'controller'=>  'subject',
        'action'    =>  'update',
        'id'        =>  1,
    ]
)->setName('update-subject');
$router->add('/admin/subject/delete/{id:[0-9]+}',
    [
        'module'    =>  'admin',
        'controller'=>  'subject',
        'action'    =>  'delete',
        'id'        =>  1,
    ]
)->setName('delete-subject');

/* post */
$router->add('/admin/post/:params',
    [
        'module'     => 'admin',
        'controller' => 'post',
        'action'     => 'index',
        'params'       => 1
    ]
)->setName('list-article');
$router->add('/admin/post/new',
    [
        'module'     => 'admin',
        'controller' => 'post',
        'action'     => 'new',
    ]
);
$router->add('/admin/post/save',
    [
        'module'     => 'admin',
        'controller' => 'post',
        'action'     => 'save',
    ]
);
$router->add('/admin/post/autodraft',
    [
        'module'     => 'admin',
        'controller' => 'post',
        'action'     => 'autoSaveDraft',
    ]
);
$router->add('/admin/post/edit/{id:[0-9]+}',
    [
        'module'     => 'admin',
        'controller' => 'post',
        'action'     => 'edit',
        'id'         => 1,
    ]
)->setName('edit-post');
$router->add('/admin/post/update',
    [
        'module'     => 'admin',
        'controller' => 'post',
        'action'     => 'update',
    ]
)->setName('update-post');
$router->add('/admin/post/taxonomy/{type:[a-z]+}',
    [
        'module'     => 'admin',
        'controller' => 'post',
        'action'     => 'taxonomy',
        'type'       => 1,
    ]
);
$router->add('/admin/post/quickAddTaxonomy/{type:[a-z]+}',
    [
        'module'     => 'admin',
        'controller' => 'post',
        'action'     => 'quickAddTaxonomy',
        'type'       => 1,
    ]
);
$router->add('/admin/post/addTaxonomy/{type:[a-z]+}',
    [
        'module'     => 'admin',
        'controller' => 'post',
        'action'     => 'addTaxonomy',
        'type'       => 1,
    ]
)->setName('new-taxonomy');
$router->add('/admin/post/editTaxonomy/{type:[a-z]+}/{id:[0-9]+}',
    [
        'module'     => 'admin',
        'controller' => 'post',
        'action'     => 'editTaxonomy',
        'type'       => 1,
        'id'         => 2,
    ]
)->setName('edit-taxonomy');
$router->add('/admin/post/updateTaxonomy/{type:[a-z]+}/{id:[0-9]+}',
    [
        'module'     => 'admin',
        'controller' => 'post',
        'action'     => 'updateTaxonomy',
        'type'       => 1,
        'id'         => 2,
    ]
)->setName('update-taxonomy');
$router->add('/admin/post/deleteTaxonomy/{type:[a-z]+}/{id:[0-9]+}',
    [
        'module'     => 'admin',
        'controller' => 'post',
        'action'     => 'deleteTaxonomy',
        'type'       => 1,
        'id'         => 2,
    ]
)->setName('delete-taxonomy');



/* media */
$router->add('/admin/media',
    [
        'module'     => 'admin',
        'controller' => 'media',
        'action'     => 'index',
    ]
);
$router->add('/admin/media/new',
    [
        'module'     => 'admin',
        'controller' => 'media',
        'action'     => 'new',
    ]
);
$router->add('/admin/media/upload',
    [
        'module'     => 'admin',
        'controller' => 'media',
        'action'     => 'upload',
    ]
);

/* links */
$router->add('/admin/link',
    [
        'module'     => 'admin',
        'controller' => 'link',
        'action'     => 'index',
    ]
);
$router->add('/admin/link/new',
    [
        'module'     => 'admin',
        'controller' => 'link',
        'action'     => 'new',
    ]
);
$router->add('/admin/link/linkCategory',
    [
        'module'     => 'admin',
        'controller' => 'link',
        'action'     => 'linkCategory',
    ]
);

/* user */
$router->add('/admin/user',
    [
        'module'     => 'admin',
        'controller' => 'user',
        'action'     => 'index',
    ]
);
$router->add('/admin/user/new',
    [
        'module'     => 'admin',
        'controller' => 'user',
        'action'     => 'new',
    ]
);
$router->add('/admin/user/save',
    [
        'module'     => 'admin',
        'controller' => 'user',
        'action'     => 'save',
    ]
);
$router->add('/admin/user/self',
    [
        'module'     => 'admin',
        'controller' => 'user',
        'action'     => 'self',
    ]
);
$router->add('/admin/user/updateInfo',
    [
        'module'     => 'admin',
        'controller' => 'user',
        'action'     => 'updateInfo',
    ]
);
$router->add('/admin/user/updatePassword',
    [
        'module'     => 'admin',
        'controller' => 'user',
        'action'     => 'updatePassword',
    ]
);

/* setting */
$router->add('/admin/setting/general',
    [
        'module'     => 'admin',
        'controller' => 'setting',
        'action'     => 'general',
    ]
);
$router->add('/admin/setting/writing',
    [
        'module'     => 'admin',
        'controller' => 'setting',
        'action'     => 'writing',
    ]
);
$router->add('/admin/setting/reading',
    [
        'module'     => 'admin',
        'controller' => 'setting',
        'action'     => 'reading',
    ]
);
$router->add('/admin/setting/discuss',
    [
        'module'     => 'admin',
        'controller' => 'setting',
        'action'     => 'discuss',
    ]
);
$router->add('/admin/setting/media',
    [
        'module'     => 'admin',
        'controller' => 'setting',
        'action'     => 'media',
    ]
);
$router->add('/admin/setting/permalink',
    [
        'module'     => 'admin',
        'controller' => 'setting',
        'action'     => 'permalink',
    ]
);


$router->notFound(
    [
        'controller' => 'error',
        'action'     => 'route404',
    ]
);

