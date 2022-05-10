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

    'accepted'             => '：attribute必須被接受。',
    'active_url'           => '：attribute不是有效的URL。',
    'after'                => '：attribute必須是：date之後的日期。',
    'after_or_equal'       => '：attribute必須是等於或小於：date的日期。',
    'alpha'                => '：attribute只能包含字母。',
    'alpha_dash'           => '：attribute只能包含字母，數字，破折號和下劃線。',
    'alpha_num'            => '：attribute只能包含字母和數字。',
    'array'                => '：attribute必須是一個數組。',
    'before'               => '：attribute必須是：date之前的日期。',
    'before_or_equal'      => '：attribute必須是等於或小於：date的日期。',
    'between'              => [
        'numeric' => '：attribute必須介於：min和：max之間。',
        'file'    => '：attribute必須介於：min和：max千字節之間。',
        'string'  => '：attribute必須介於：min和：max之間。',
        'array'   => '：attribute必須在：min和：max之間。',
    ],
    'boolean'              => '：attribute字段必須為true或false。',
    'confirmed'            => '：attribute確認不匹配。',
    'current_password'     => '密码不正确。',
    'date'                 => '：attribute不是有效日期。',
    'date_equals'          => '：attribute必須是等於：date的日期。',
    'date_format'          => '：attribute與格式：format不匹配。',
    'different'            => '：attribute和：other必須不同。',
    'digits'               => '：attribute必須為：digits位數。',
    'digits_between'       => '：attribute必須介於：min和：max數字之間。',
    'dimensions'           => '：attribute的圖片尺寸無效。',
    'distinct'             => '：attribute字段具有重複值。',
    'email'                => '：attribute必須是有效的電子郵件地址。',
    'ends_with'            => '：attribute必須以下列之一結尾：：values',
    'exists'               => '所選的：attribute無效。',
    'file'                 => '：attribute必須是一個文件。',
    'filled'               => '：attribute字段必須有一個值。',
    'gt'                   => [
        'numeric' => '：attribute必須大於：value。',
        'file'    => '：attribute必須大於：value千字節。',
        'string'  => '：attribute必須大於：value字符。',
        'array'   => '：attribute必須包含多個：value項目。',
    ],
    'gte'                  => [
        'numeric' => 'a：attribute必須大於或等於：value。',
        'file'    => '：attribute必須大於或等於：value千字節。',
        'string'  => '：attribute必須大於或等於：value字符。',
        'array'   => '：attribute必須具有：value項或更多。',
    ],
    'image'                => '：attribute必須是圖像。',
    'in'                   => '所選的：attribute無效。',
    'in_array'             => '：attribute字段在：other中不存在。',
    'integer'              => '：attribute必須為整數。',
    'ip'                   => '：attribute必須是有效的IP地址。',
    'ipv4'                 => '：attribute必須是有效的IPv4地址。',
    'ipv6'                 => '：attribute必須是有效的IPv6地址。',
    'json'                 => '：attribute必須是有效的JSON字符串。',
    'lt'                   => [
        'numeric' => '：attribute必須小於：value。',
        'file'    => '：attribute必須小於：value千字節。',
        'string'  => '：attribute必須小於：value字符。',
        'array'   => '：attribute必須少於：value個項目。',
    ],
    'lte'                  => [
        'numeric' => '：attribute必須小於或等於：value。',
        'file'    => '：attribute必須小於或等於：value千字節。',
        'string'  => '：attribute必須小於或等於：value字符。',
        'array'   => '：attribute不得超過：value個項目。',
    ],
    'max'                  => [
        'numeric' => '：attribute不得大於：max。',
        'file'    => '：attribute不得大於：max千字節。',
        'string'  => '：attribute不得大於：max個字符。',
        'array'   => '：attribute最多只能包含：max個項目。',
    ],
    'mimes'                => '：attribute必須是類型：：values的文件。',
    'mimetypes'            => '：attribute必須是類型：：values的文件。',
    'min'                  => [
        'numeric' => '：attribute必須至少為：min。',
        'file'    => '：attribute必須至少為：min千字節。',
        'string'  => '：attribute必須至少為：min個字符。',
        'array'   => '：attribute必須至少包含：min個項目。',
    ],
    'multiple_of'          => ':attribute 必须是 :value 的倍数。',
    'not_in'               => '所選的：attribute無效。',
    'not_regex'            => '：attribute格式無效。',
    'numeric'              => '：attribute必須為數字。',
    'password'             => '密码不正确。',
    'present'              => '：attribute字段必須存在。',
    'regex'                => '：attribute格式無效。',
    'required'             => '：attribute字段是必需的。',
    'required_if'          => '當：other是：value時，：attribute字段是必需的。',
    'required_unless'      => '除非：other位於：values中，否則：attribute字段是必填字段。',
    'required_with'        => '如果存在：values，則：attribute字段為必填字段。',
    'required_with_all'    => '如果存在：values，則：attribute字段是必需的。',
    'required_without'     => '當：values不存在時，：attribute字段是必需的。',
    'required_without_all' => '當：values不存在時，：attribute字段是必需的。',
    'prohibited'           => '禁止 :attribute 字段。',
    'prohibited_if'        => '当 :other 为 :value 时，禁止 :attribute字段。',
    'prohibited_unless'    => '禁止 :attribute字段，除非 :other 在 :values 中。',
    'same'                 => '：attribute和：other必須匹配。',
    'size'                 => [
        'numeric' => '：attribute必須為：size。',
        'file'    => '：attribute必須為：size千字節。',
        'string'  => '：attribute必須為：size字符。',
        'array'   => '：attribute必須包含：size項。',
    ],
    'starts_with'          => '：attribute必須以下列之一開頭：：values',
    'string'               => '：attribute必須為字符串。',
    'timezone'             => '：attribute必須是有效的區域。',
    'unique'               => '：attribute已經被使用。',
    'uploaded'             => '：attribute上傳失敗。',
    'url'                  => '：attribute格式無效。',
    'uuid'                 => '：attribute必須是有效的UUID。',

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
        'attribute-name' => [
            'rule-name' => '自定義消息',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
