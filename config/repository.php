<?php
return [
    'generator'  => [
        'basePath'      => app()->path(),
        'rootNamespace' => 'App\\',
        'stubsOverridePath' => app()->path(),
        'paths'         => [
            'models'       => 'Models',
            'repositories' => 'Repositories\Eloquents',
            'interfaces'   => 'Repositories\Interfaces',
            'transformers' => 'Transformers',
            'presenters'   => 'Presenters',
            'validators'   => 'Validators',
            'controllers'  => 'Http/Controllers',
            'provider'     => 'RepositoryServiceProvider',
            'criteria'     => 'Criteria'
        ]
    ]
];
