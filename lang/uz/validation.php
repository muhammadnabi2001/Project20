<?php

return [

    /*
    |----------------------------------------------------------------------
    | Validation Language Lines
    |----------------------------------------------------------------------
    |
    | Quyidagi til satrlari validator sinfida ishlatiladigan xato xabarlarini
    | o'z ichiga oladi. Ba'zi qoidalar bir nechta versiyaga ega. Ularni
    | bu yerda sozlash imkoniga egasiz.
    |
    */

    'accepted' => ':attribute maydoni qabul qilinishi kerak.',
    'accepted_if' => ':attribute maydoni :other :value bo\'lganda qabul qilinishi kerak.',
    'active_url' => ':attribute maydoni haqiqiy URL bo\'lishi kerak.',
    'after' => ':attribute maydoni :date sanasidan keyingi sana bo\'lishi kerak.',
    'after_or_equal' => ':attribute maydoni :date sanasidan keyingi yoki teng bo\'lgan sana bo\'lishi kerak.',
    'alpha' => ':attribute maydoni faqat harflardan iborat bo\'lishi kerak.',
    'alpha_dash' => ':attribute maydoni faqat harflar, raqamlar, tire va pastki chiziqlardan iborat bo\'lishi kerak.',
    'alpha_num' => ':attribute maydoni faqat harflar va raqamlardan iborat bo\'lishi kerak.',
    'array' => ':attribute maydoni massiv bo\'lishi kerak.',
    'ascii' => ':attribute maydoni faqat bir baytli alfanumerik belgilar va simvollardan iborat bo\'lishi kerak.',
    'before' => ':attribute maydoni :date sanasidan oldingi sana bo\'lishi kerak.',
    'before_or_equal' => ':attribute maydoni :date sanasidan oldingi yoki teng bo\'lgan sana bo\'lishi kerak.',
    'between' => [
        'array' => ':attribute maydoni :min va :max elementlar orasida bo\'lishi kerak.',
        'file' => ':attribute maydoni :min va :max kilobayt orasida bo\'lishi kerak.',
        'numeric' => ':attribute maydoni :min va :max orasida bo\'lishi kerak.',
        'string' => ':attribute maydoni :min va :max belgilar orasida bo\'lishi kerak.',
    ],
    'boolean' => ':attribute maydoni true yoki false bo\'lishi kerak.',
    'can' => ':attribute maydoni ruxsat etilmagan qiymatni o\'z ichiga oladi.',
    'confirmed' => ':attribute maydoni tasdiqlanishi mos kelmaydi.',
    'contains' => ':attribute maydoni zarur qiymatni o\'z ichiga olishi kerak.',
    'current_password' => 'Parol noto\'g\'ri.',
    'date' => ':attribute maydoni haqiqiy sana bo\'lishi kerak.',
    'date_equals' => ':attribute maydoni :date sanasi bilan teng bo\'lishi kerak.',
    'date_format' => ':attribute maydoni :format formatiga mos bo\'lishi kerak.',
    'decimal' => ':attribute maydoni :decimal o\'nlik raqamni o\'z ichiga olishi kerak.',
    'declined' => ':attribute maydoni rad etilishi kerak.',
    'declined_if' => ':attribute maydoni :other :value bo\'lganida rad etilishi kerak.',
    'different' => ':attribute maydoni va :other farqli bo\'lishi kerak.',
    'digits' => ':attribute maydoni :digits raqamdan iborat bo\'lishi kerak.',
    'digits_between' => ':attribute maydoni :min va :max raqamlar orasida bo\'lishi kerak.',
    'dimensions' => ':attribute maydoni noto\'g\'ri rasm o\'lchamlari mavjud.',
    'distinct' => ':attribute maydoni takroriy qiymatga ega.',
    'doesnt_end_with' => ':attribute maydoni quyidagi qiymatlarning biri bilan tugamashi kerak: :values.',
    'doesnt_start_with' => ':attribute maydoni quyidagi qiymatlarning biri bilan boshlanmasligi kerak: :values.',
    'email' => ':attribute maydoni haqiqiy email manzili bo\'lishi kerak.',
    'ends_with' => ':attribute maydoni quyidagi qiymatlarning biri bilan tugashi kerak: :values.',
    'enum' => 'Tanlangan :attribute noto\'g\'ri.',
    'exists' => 'Tanlangan :attribute noto\'g\'ri.',
    'extensions' => ':attribute maydoni quyidagi kengaytmalar bilan bo\'lishi kerak: :values.',
    'file' => ':attribute maydoni fayl bo\'lishi kerak.',
    'filled' => ':attribute maydoni qiymatga ega bo\'lishi kerak.',
    'gt' => [
        'array' => ':attribute maydoni :value elementdan ko\'p bo\'lishi kerak.',
        'file' => ':attribute maydoni :value kilobaytdan katta bo\'lishi kerak.',
        'numeric' => ':attribute maydoni :value dan katta bo\'lishi kerak.',
        'string' => ':attribute maydoni :value belgidan katta bo\'lishi kerak.',
    ],
    'gte' => [
        'array' => ':attribute maydoni :value elementdan ko\'p yoki teng bo\'lishi kerak.',
        'file' => ':attribute maydoni :value kilobaytdan katta yoki teng bo\'lishi kerak.',
        'numeric' => ':attribute maydoni :value dan katta yoki teng bo\'lishi kerak.',
        'string' => ':attribute maydoni :value belgidan katta yoki teng bo\'lishi kerak.',
    ],
    'hex_color' => ':attribute maydoni haqiqiy heksadesimal rang bo\'lishi kerak.',
    'image' => ':attribute maydoni rasm bo\'lishi kerak.',
    'in' => 'Tanlangan :attribute noto\'g\'ri.',
    'in_array' => ':attribute maydoni :other da mavjud bo\'lishi kerak.',
    'integer' => ':attribute maydoni butun son bo\'lishi kerak.',
    'ip' => ':attribute maydoni haqiqiy IP manzili bo\'lishi kerak.',
    'ipv4' => ':attribute maydoni haqiqiy IPv4 manzili bo\'lishi kerak.',
    'ipv6' => ':attribute maydoni haqiqiy IPv6 manzili bo\'lishi kerak.',
    'json' => ':attribute maydoni haqiqiy JSON satri bo\'lishi kerak.',
    'list' => ':attribute maydoni ro\'yxat bo\'lishi kerak.',
    'lowercase' => ':attribute maydoni kichik harflardan iborat bo\'lishi kerak.',
    'lt' => [
        'array' => ':attribute maydoni :value elementdan kam bo\'lishi kerak.',
        'file' => ':attribute maydoni :value kilobaytdan kichik bo\'lishi kerak.',
        'numeric' => ':attribute maydoni :value dan kichik bo\'lishi kerak.',
        'string' => ':attribute maydoni :value belgidan kichik bo\'lishi kerak.',
    ],
    'lte' => [
        'array' => ':attribute maydoni :value elementdan kam yoki teng bo\'lishi kerak.',
        'file' => ':attribute maydoni :value kilobaytdan kichik yoki teng bo\'lishi kerak.',
        'numeric' => ':attribute maydoni :value dan kichik yoki teng bo\'lishi kerak.',
        'string' => ':attribute maydoni :value belgidan kichik yoki teng bo\'lishi kerak.',
    ],
    'mac_address' => ':attribute maydoni haqiqiy MAC manzili bo\'lishi kerak.',
    'max' => [
        'array' => ':attribute maydoni :max elementdan ko\'p bo\'lmasligi kerak.',
        'file' => ':attribute maydoni :max kilobaytdan ko\'p bo\'lmasligi kerak.',
        'numeric' => ':attribute maydoni :max dan ko\'p bo\'lmasligi kerak.',
        'string' => ':attribute maydoni :max belgidan ko\'p bo\'lmasligi kerak.',
    ],
    'max_digits' => ':attribute maydoni :max raqamdan ko\'p bo\'lmasligi kerak.',
    'mimes' => ':attribute maydoni quyidagi turdagi fayl bo\'lishi kerak: :values.',
    'mimetypes' => ':attribute maydoni quyidagi turdagi fayl bo\'lishi kerak: :values.',
    'min' => [
        'array' => ':attribute maydoni kamida :min elementga ega bo\'lishi kerak.',
        'file' => ':attribute maydoni kamida :min kilobayt bo\'lishi kerak.',
        'numeric' => ':attribute maydoni kamida :min bo\'lishi kerak.',
        'string' => ':attribute maydoni kamida :min belgiga ega bo\'lishi kerak.',
    ],
    'min_digits' => ':attribute maydoni :min raqamdan kam bo\'lmasligi kerak.',
    'multiple_of' => ':attribute maydoni :value ning ko\'p bo\'lishi kerak.',
    'not_in' => 'Tanlangan :attribute noto\'g\'ri.',
    'not_regex' => ':attribute maydoni noto\'g\'ri formatga ega.',
    'numeric' => ':attribute maydoni faqat raqamlardan iborat bo\'lishi kerak.',
    'password' => [
        'letters' => ':attribute maydoni kamida bitta harfni o\'z ichiga olishi kerak.',
        'mixed' => ':attribute maydoni katta va kichik harflarni o\'z ichiga olishi kerak.',
        'numbers' => ':attribute maydoni kamida bitta raqamni o\'z ichiga olishi kerak.',
        'symbols' => ':attribute maydoni kamida bitta belgi bo\'lishi kerak.',
        'uncompromised' => 'Berilgan :attribute ma\'lumotlar bazasida xavfli bo\'lishi mumkin. Iltimos, boshqa :attribute tanlang.',
    ],
    'present' => ':attribute maydoni mavjud bo\'lishi kerak.',
    'prohibited' => ':attribute maydoni taqiqlangan.',
    'prohibited_if' => ':attribute maydoni :other :value bo\'lganda taqiqlangan.',
    'prohibited_unless' => ':attribute maydoni :other :values bo\'lmaganda taqiqlangan.',
    'regex' => ':attribute maydoni noto\'g\'ri formatga ega.',
    'relatable' => ':attribute maydoni ushbu resurs bilan bog\'lanmagan.',
    'required' => ':attribute maydoni talab qilinadi.',
    'required_if' => ':other :value bo\'lganda :attribute maydoni talab qilinadi.',
    'required_unless' => ':other :values bo\'lmaganda :attribute maydoni talab qilinadi.',
    'required_with' => ':values mavjud bo\'lganda :attribute maydoni talab qilinadi.',
    'required_with_all' => ':values mavjud bo\'lganda :attribute maydoni talab qilinadi.',
    'required_without' => ':values mavjud bo\'lmaganda :attribute maydoni talab qilinadi.',
    'required_without_all' => ':values mavjud bo\'lmaganda :attribute maydoni talab qilinadi.',
    'same' => ':attribute maydoni va :other bir xil bo\'lishi kerak.',
    'size' => [
        'array' => ':attribute maydoni :size elementga ega bo\'lishi kerak.',
        'file' => ':attribute maydoni :size kilobayt bo\'lishi kerak.',
        'numeric' => ':attribute maydoni :size bo\'lishi kerak.',
        'string' => ':attribute maydoni :size belgiga ega bo\'lishi kerak.',
    ],
    'starts_with' => ':attribute maydoni quyidagi qiymatlarning biri bilan boshlanishi kerak: :values.',
    'string' => ':attribute maydoni matn bo\'lishi kerak.',
    'timezone' => ':attribute maydoni haqiqiy zona bo\'lishi kerak.',
    'unique' => ':attribute maydoni avvaldan mavjud.',
    'uploaded' => ':attribute maydoni yuklab olishda xato yuz berdi.',
    'url' => ':attribute maydoni haqiqiy URL bo\'lishi kerak.',
    'uuid' => ':attribute maydoni haqiqiy UUID bo\'lishi kerak.',
];
