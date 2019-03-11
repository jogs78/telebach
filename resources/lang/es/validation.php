<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'             => 'El campo :attribute debe ser aceptado.',
    'active_url'           => 'El campo :attribute no es una URL válida.',
    'after'                => 'El campo :attribute debe ser una fecha posterior a :date.',
    'alpha'                => 'El campo :attribute sólo puede contener letras.',
    'alpha_dash'           => 'El campo :attribute sólo puede contener letras, números y guiones (a-z, 0-9, -_).',
    'alpha_num'            => 'El campo :attribute sólo puede contener letras y números.',
    'array'                => 'El campo :attribute debe ser un array.',
    'before'               => 'El campo :attribute debe ser una fecha anterior a :date.',
    
    'between'              => [
        'numeric' => 'El campo :attribute debe ser un valor entre :min y :max.',
        'file'    => 'El archivo :attribute debe pesar entre :min y :max kilobytes.',
        'string'  => 'El campo :attribute debe contener entre :min y :max caracteres.',
        'array'   => 'El campo :attribute debe contener entre :min y :max elementos.',
    ],
    'boolean'              => 'El campo :attribute debe ser verdadero o falso.',
    'confirmed'            => 'El campo confirmación de :attribute no coincide.',
    'country'              => 'El campo :attribute no es un país válido.',
    'date'                 => 'El campo :attribute no corresponde con una fecha válida.',
    'date_format'          => 'El campo :attribute no corresponde con el formato de fecha :format.',
    'different'            => 'Los campos :attribute y :other han de ser diferentes.',
    'digits'               => 'El campo :attribute debe ser un número de :digits dígitos.',
    'digits_between'       => 'El campo :attribute debe contener entre :min y :max dígitos.',
    'distinct'             => 'El campo :attribute tiene un valor duplicado.',
    'email'                => 'El campo :attribute no corresponde con una dirección de e-mail válida.',
    'filled'               => 'El campo :attribute es obligatorio.',
    'exists'               => 'El campo :attribute no existe.',
    'image'                => 'El campo :attribute debe ser una imagen.',
    'in'                   => 'El campo :attribute debe ser igual a alguno de estos valores :values',
    'in_array'             => 'El campo :attribute no existe en :other.',
    'integer'              => 'El campo :attribute debe ser un número entero.',
    'ip'                   => 'El campo :attribute debe ser una dirección IP válida.',
    'json'                 => 'El campo :attribute debe ser una cadena de texto JSON válida.',
    'max'                  => [
        'numeric' => 'El campo :attribute debe ser :max como máximo.',
        'file'    => 'El archivo :attribute debe pesar :max kilobytes como máximo.',
        'string'  => 'El campo :attribute debe contener :max caracteres como máximo.',
        'array'   => 'El campo :attribute debe contener :max elementos como máximo.',
    ],
    'mimes'                => 'El campo :attribute debe ser un archivo de tipo :values.',
    'min'                  => [
        'numeric' => 'El campo :attribute debe tener al menos :min.',
        'file'    => 'El archivo :attribute debe pesar al menos :min kilobytes.',
        'string'  => 'El campo :attribute debe contener al menos :min caracteres.',
        'array'   => 'El campo :attribute no debe contener más de :min elementos.',
    ],
    'not_in'               => 'El campo :attribute seleccionado es invalido.',
    'numeric'              => 'El campo :attribute debe ser un numero.',
    'present'              => 'El campo :attribute debe estar presente.',
    'regex'                => 'El formato del campo :attribute es inválido.',
    'required'             => 'El campo :attribute es obligatorio',
    'required_if'          => 'El campo :attribute es obligatorio cuando el campo :other es :value.',
    'required_unless'      => 'El campo :attribute es requerido a menos que :other se encuentre en :values.',
    'required_with'        => 'El campo :attribute es obligatorio cuando :values está presente.',
    'required_with_all'    => 'El campo :attribute es obligatorio cuando :values está presente.',
    'required_without'     => 'El campo :attribute es obligatorio cuando :values no está presente.',
    'required_without_all' => 'El campo :attribute es obligatorio cuando ningún campo :values están presentes.',
    'same'                 => 'Los campos :attribute y :other deben coincidir.',
    'size'                 => [
        'numeric' => 'El campo :attribute debe ser :size.',
        'file'    => 'El archivo :attribute debe pesar :size kilobytes.',
        'string'  => 'El campo :attribute debe contener :size caracteres.',
        'array'   => 'El campo :attribute debe contener :size elementos.',
    ],
    'state'                => 'El estado no es válido para el país seleccionado.',
    'string'               => 'El campo :attribute debe contener solo caracteres.',
    'timezone'             => 'El campo :attribute debe contener una zona válida.',
    'unique'               => 'El elemento :attribute ya está en uso.',
    'url'                  => 'El formato de :attribute no corresponde con el de una URL válida.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
   
        'name' => [
            'required' => 'El campo nombre es obligatorio',
            'alpha'    => 'El campo nombre sólo puede contener letras.',
            'unique'=>'El nombre ingresado ya esta en uso por favor ingrese otro distinto',
        ],
        'mother_last_name' => [
            'required' => 'El campo apellido paterno es obligatorio',
            'alpha'    => 'El campo apellido paterno sólo puede contener letras.',
        ],
        'father_last_name' => [
            'required' => 'El campo apellido materno es obligatorio',
            'alpha'    => 'El campo apellido materno sólo puede contener letras.',
        ],
        'email' => [
            'required' => 'El campo Email es obligatorio',
        ],
        'phone' => [
            'required' => 'El campo teléfono es obligatorio',
            'digits'   => 'El campo teléfono debe ser un número de :digits dígitos.',
        ],
        'home' => [
            'required' => 'El campo domicilio es obligatorio',
            'alpha_num' => 'El campo domicilio sólo puede contener letras y números.',
        ],
        'password' => [
            'required' => 'El campo contraseña de acceso es obligatorio',
            'alpha_dash' => 'El campo contraseña sólo puede contener letras, números y guiones (a-z, 0-9, -_).',
        ],
        'description' => [
            'required' => 'El campo descripción es obligatorio',
            'alpha'    => 'El campo descripción sólo puede contener letras.',
        ],
        'key' => [
            'required' => 'El campo clave es obligatorio',
            'alpha_num'    => 'El campo clave sólo puede contener letras y números.',
        ],
        'period' => [
            'required' => 'El campo periodo escolar es obligatorio',
            'unique'=>'El campo periodo escolar ya esta en uso por favor ingrese otro distinto',
            'alpha_dash' => 'El campo periodo escolar sólo puede contener letras, números y guiones (a-z, 0-9, -_).',
        ],
        'start_period' => [
            'required' => 'El campo fecha de inicio es obligatorio',
            'date'     => 'El campo fecha de inicio no corresponde con una fecha válida.',
        ],
        'end_period' => [
            'required' => 'El campo fecha de termino es obligatorio',
            'date'     => 'El campo fecha de termino no corresponde con una fecha válida.',
        ],
        'enrollment' => [
            'required' => 'El campo matricula es obligatorio',
            'alpha_dash' => 'El campo matricula sólo puede contener letras, números y guiones (a-z, 0-9, -_).',
        ],
        'age' => [
            'required' => 'El campo fecha de nacimiento es obligatorio',
            'date'     => 'El campo fecha de nacimiento no corresponde con una fecha válida.',
        ],
        'curp' => [
            'required' => 'El campo CURP es obligatorio',
            'alpha_dash' => 'El campo CURP sólo puede contener letras, números y guiones (a-z, 0-9, -_).',
        ],
        'address' => [
            'required' => 'El campo domicilio es obligatorio',
            'alpha_num' => 'El campo domicilio sólo puede contener letras y números.',
        ],


    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [],

];
