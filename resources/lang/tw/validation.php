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

    'accepted' => ':attribute 必須接受。',
    'accepted_if' => ':attribute 必須接受 :other。',
    'active_url' => ':attribute 不是一個有效的網址。',
    'after' => ':attribute 必須是 :date 之後的日期。',
    'after_or_equal' => ':attribute 必須是 :date 之後或相同的日期。',
    'alpha' => ':attribute 只能由字母組成。',
    'alpha_dash' => ':attribute 只能由字母、數字、中划線(-)和下劃線(_)組成。',
    'alpha_num' => ':attribute 只能由字母和數字組成。',
    'array' => ':attribute 必須是一個陣列。',
    'before' => ':attribute 必須是 :date 之前的日期。',
    'before_or_equal' => ':attribute 必須是 :date 之前或相同的日期。',
    'between' => [
        'numeric' => ':attribute 必須介於 :min 和 :max 之間。',
        'file' => ':attribute 必須介於 :min 和 :max KB 之間。',
        'string' => ':attribute 必須介於 :min 和 :max 個字元之間。',
        'array' => ':attribute 必須只有 :min 和 :max 個項目。',
    ],
    'boolean' => ':attribute 必須是 true 或 false。',
    'confirmed' => ':attribute 確認欄位不匹配。',
    'current_password' => ':attribute 不正確。',
    'date' => ':attribute 不是一個有效的日期。',
    'date_equals' => ':attribute 必須等於 :date。',
    'date_format' => ':attribute 不符合格式 :format。',
    'different' => ':attribute 和 :other 必須不同。',
    'digits' => ':attribute 必須是 :digits 位數字。',
    'digits_between' => ':attribute 必須介於 :min 和 :max 位數字之間。',
    'dimensions' => ':attribute 圖片尺寸不正確。',
    'distinct' => ':attribute 欄位內容重複。',
    'email' => ':attribute 必須是一個有效的電子信箱。',
    'ends_with' => ':attribute 必須以下列之一結束: :values',
    'exists' => '所選的 :attribute 是無效的。',
    'file' => ':attribute 必須是一個檔案。',
    'filled' => ':attribute 欄位是必填的。',
    'gt' => [
        'numeric' => ':attribute 必須大於 :value。',
        'file' => ':attribute 必須大於 :value KB。',
        'string' => ':attribute 必須多於 :value 個字元。',
        'array' => ':attribute 必須多於 :value 個項目。',
    ],
    'gte' => [
        'numeric' => ':attribute 必須大於或等於 :value。',
        'file' => ':attribute 必須大於或等於 :value KB。',
        'string' => ':attribute 必須多於或等於 :value 個字元。',
        'array' => ':attribute 必須多於或等於 :value 個項目。',
    ],
    'image' => ':attribute 必須是一張圖片。',
    'in' => '所選的 :attribute 是無效的。',
    'in_array' => ':attribute 欄位不存在於 :other。',
    'integer' => ':attribute 必須是一個整數。',
    'ip' => ':attribute 必須是一個有效的 IP 地址。',
    'ipv4' => ':attribute 必須是一個有效的 IPv4 地址。',
    'ipv6' => ':attribute 必須是一個有效的 IPv6 地址。',
    'json' => ':attribute 必須是一個有效的 JSON 字符串。',
    'lt' => [
        'numeric' => ':attribute 必須小於 :value。',
        'file' => ':attribute 必須小於 :value KB。',
        'string' => ':attribute 必須小於 :value 個字元。',
        'array' => ':attribute 必須小於 :value 個項目。',
    ],
    'lte' => [
        'numeric' => ':attribute 必須小於或等於 :value。',
        'file' => ':attribute 必須小於或等於 :value KB。',
        'string' => ':attribute 必須小於或等於 :value 個字元。',
        'array' => ':attribute 必須小於或等於 :value 個項目。',
    ],
    'max' => [
        'numeric' => ':attribute 不能大於 :max。',
        'file' => ':attribute 不能大於 :max KB。',
        'string' => ':attribute 不能大於 :max 個字元。',
        'array' => ':attribute 不能多於 :max 個項目。',
    ],
    'mimes' => ':attribute 必須是一個 :values 類型的檔案。',
    'mimetypes' => ':attribute 必須是一個 :values 類型的檔案。',
    'min' => [
        'numeric' => ':attribute 必須大於等於 :min。',
        'file' => ':attribute 必須大於等於 :min KB。',
        'string' => ':attribute 必須大於等於 :min 個字元。',
        'array' => ':attribute 必須大於等於 :min 個項目。',
    ],
    'multiple_of' => ':attribute 必須是 :multiple 的倍數。',
    'not_in' => '所選的 :attribute 是無效的。',
    'not_regex' => ':attribute 的格式不正確。',
    'numeric' => ':attribute 必須是一個數字。',
    'password' => '密碼不正確。',
    'present' => ':attribute 欄位必須存在。',
    'regex' => ':attribute 的格式不正確。',
    'required' => ':attribute 欄位是必填的。',
    'required_if' => '當 :other 是 :value 時 :attribute 欄位是必填的。',
    'required_unless' => '當 :other 不是 :value 時 :attribute 欄位是必填的。',
    'required_with' => '當 :values 存在時 :attribute 欄位是必填的。',
    'required_with_all' => '當 :values 存在時 :attribute 欄位是必填的。',
    'required_without' => '當 :values 不存在時 :attribute 欄位是必填的。',
    'required_without_all' => '當 :values 都不存在時 :attribute 欄位是必填的。',
    'prohibited' => ':attribute 欄位是禁止的。',
    'prohibited_if' => '當 :other 是 :value 時 :attribute 欄位是禁止的。',
    'prohibited_unless' => '當 :other 不是 :value 時 :attribute 欄位是禁止的。',
    'same' => ':attribute 和 :other 必須相同。',
    'size' => [
        'numeric' => ':attribute 必須是 :size。',
        'file' => ':attribute 必須是 :size KB。',
        'string' => ':attribute 必須是 :size 個字元。',
        'array' => ':attribute 必須是 :size 個項目。',
    ],
    'starts_with' => ':attribute 必須以 :values 開頭。',
    'string' => ':attribute 必須是一個字串。',
    'timezone' => ':attribute 必須是一個有效的時區。',
    'unique' => ':attribute 已經被使用。',
    'uploaded' => ':attribute 上傳失敗。',
    'url' => ':attribute 格式不正確。',
    'uuid' => ':attribute 必須是一個有效的 UUID。',

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
            'rule-name' => 'custom-message',
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

    'attributes' => 
        json_decode(file_get_contents(resource_path().'/lang/tw.json'), true)
    

];
