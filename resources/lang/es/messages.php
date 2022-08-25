<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Translation messages
    |--------------------------------------------------------------------------
    |
    |
    */

    'roles' => [
        'admin' => 'Administrador',
        'staff' => 'Staff',
        'editor' => 'Editor',
        'reporter' => 'Revisor',
        'demo' => 'Demo',
        'author' => 'Autor',
        'subscriptor' => 'Suscriptor',
        'administration' => 'Administracion'
    ],
    'permissions' => [
        'blog' => [
            'dashboard' => [
                'show' => 'Accesar al panel de administración'
            ],
            'authorization' => [
                'index' => 'Ver los roles y permisos de los usuarios',
                'update' => 'Modificar los roles y permisos de los usuarios'
            ],
            'articles' => [
                'all' => 'Listar todos los artículos',
                'index' => 'Listar los artículos creados',
                'create' => 'Crear nuevos artículos',
                'read' => 'Ver los artículos creados',
                'update' => 'Modificar los artículos creados',
                'delete' => 'Eliminar y restaurar artículos creados',
                'publish' => 'Publicar los artículos creados'
            ],
            'videos' => [
                'all' => 'Listar todos los videos',
                'index' => 'Listar los videos creados',
                'create' => 'Crear nuevos videos',
                'read' => 'Ver los videos creados',
                'update' => 'Modificar los videos creados',
                'delete' => 'Eliminar y restaurar videos creados',
                'publish' => 'Publicar los videos creados'
            ],
            'podcasts' => [
                'all' => 'Listar todos los podcasts',
                'index' => 'Listar los podcasts creados',
                'create' => 'Crear nuevos podcasts',
                'read' => 'Ver los podcasts creados',
                'update' => 'Modificar los podcasts creados',
                'delete' => 'Eliminar y restaurar podcasts creados',
                'publish' => 'Publicar los podcasts creados'
            ],
            'courses' => [
                'all' => 'Listar todos los cursos',
                'index' => 'Listar los cursos creados',
                'create' => 'Crear nuevos cursos',
                'read' => 'Ver los cursos creados',
                'update' => 'Modificar los cursos creados',
                'delete' => 'Eliminar y restaurar cursos creados',
                'publish' => 'Publicar los cursos creados'
            ],
            'covers' => [
                'all' => 'Listar todas las portadas',
                'index' => 'Listar las portadas creados',
                'create' => 'Crear nuevas portadas',
                'read' => 'Ver las portadas creadas',
                'update' => 'Modificar las portadas creadas',
                'delete' => 'Eliminar y restaurar portadas creadas'
            ],
            'pages' => [
                'all' => 'Listar todas las páginas',
                'index' => 'Listar las páginas creados',
                'create' => 'Crear nuevas páginas',
                'read' => 'Ver las páginas creadas',
                'update' => 'Modificar las páginas creadas',
                'delete' => 'Eliminar y restaurar páginas creadas'
            ],
            'downloads' => [
                'all' => 'Listar todas las descargas',
                'index' => 'Listar las descargas creados',
                'create' => 'Crear nuevas descargas',
                'read' => 'Ver las descargas creadas',
                'update' => 'Modificar las descargas creadas',
                'delete' => 'Eliminar y restaurar descargas creadas'
            ],
            'quotes' => [
                'all' => 'Listar todas las citas',
                'index' => 'Listar las citas creados',
                'create' => 'Crear nuevas citas',
                'read' => 'Ver las citas creadas',
                'update' => 'Modificar las citas creadas',
                'delete' => 'Eliminar y restaurar citas creadas'
            ],
            'speakers' => [
                'all' => 'Listar todos los expositores',
                'index' => 'Listar los expositores creados',
                'create' => 'Crear nuevos expositores',
                'read' => 'Ver los expositores creados',
                'update' => 'Modificar los expositores creados',
                'delete' => 'Eliminar y restaurar expositores creados'
            ],
            'users' => [
                'all' => 'Listar todos los usuarios',
                'index' => 'Listar los usuarios creados',
                'create' => 'Crear nuevos usuarios',
                'read' => 'Ver los usuarios creados',
                'update' => 'Modificar los usuarios creados',
                'delete' => 'Desactivar y activar usuarios'
            ],
            'authors' => [
                'all' => 'Listar todos los autores',
                'index' => 'Listar los autores creados',
                'create' => 'Crear nuevos autores',
                'read' => 'Ver los autores creados',
                'update' => 'Modificar los autores creados',
                'delete' => 'Eliminar y restaurar autores creados'
            ],
            'messages' => [
                'index' => 'Listar los mensajes creados',
                'read' => 'Ver los mensajes creados',
                'delete' => 'Eliminar y restaurar mensajes'
            ],
            'adverts' => [
                'all' => 'Listar todos los anuncios',
                'index' => 'Listar los anuncios creados',
                'create' => 'Crear nuevos anuncios',
                'read' => 'Ver los anuncios creados',
                'update' => 'Modificar los anuncios creados',
                'delete' => 'Eliminar y restaurar anuncios creados'
            ],
            'categories' => [
                'all' => 'Listar todas las categorías',
                'index' => 'Listar las categorías creados',
                'create' => 'Crear nuevas categorías',
                'read' => 'Ver las categorías creadas',
                'update' => 'Modificar las categorías creadas',
                'delete' => 'Eliminar y restaurar categorías creadas'
            ],
            'reports' => [
                'index' => 'Listar los reportes creados',
                'read' => 'Ver los reportes creados'
            ],
            'landings' => [
                'all' => 'Listar todas las landing pages',
                'index' => 'Listar las landing pages creadas',
                'create' => 'Crear nuevas landing pages (inactivo)',
                'read' => 'Ver las landing pages',
                'update' => 'Actualizar las landing pages (inactivo)',
                'delete' => 'Eliminar las landing pages (inactivo)'
            ]
        ],
        'parameters' => [
            'price' => [
                'rating' => [
                    'show' => 'Ver parametro actual para Rating de precio',
                    'update' => 'Actualizar Rating de precio de asesorias'
                ],
            ],
        ],
    ]
];
