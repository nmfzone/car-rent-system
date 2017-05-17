<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Baris Bahasa untuk Validasi
    |--------------------------------------------------------------------------
    |
    | Baris bahasa berikut ini berisi standar pesan kesalahan yang digunakan oleh
    | kelas validasi. Beberapa aturan mempunyai multi versi seperti aturan 'size'.
    | Jangan ragu untuk mengoptimalkan setiap pesan yang ada di sini.
    |
    */

    'accepted'             => 'Isian kolom :attribute harus diterima.',
    'active_url'           => 'Isian kolom :attribute bukan URL yang valid.',
    'after'                => 'Isian kolom :attribute harus tanggal setelah :date.',
    'after_or_equal'       => 'Isian kolom :attribute harus tanggal setelah atau sama dengan tanggal :date.',
    'alpha'                => 'Isian kolom :attribute hanya boleh berisi huruf.',
    'alpha_dash'           => 'Isian kolom :attribute hanya boleh berisi huruf, angka, strip, dan underscore.',
    'alpha_num'            => 'Isian kolom :attribute hanya boleh berisi huruf dan angka.',
    'array'                => 'Isian kolom :attribute harus berupa sebuah array.',
    'before'               => 'Isian kolom :attribute harus tanggal sebelum :date.',
    'before_or_equal'      => 'Isian kolom :attribute harus tanggal sebelum atau sama dengan tanggal :date.',
    'between'              => [
        'numeric' => 'Isian kolom :attribute harus antara :min sampai :max.',
        'file'    => 'Berkas :attribute harus berukuran antara :min sampai :max kilobytes.',
        'string'  => 'Isian kolom :attribute harus antara :min sampai :max karakter.',
        'array'   => 'Isian kolom :attribute harus antara :min sampai :max item.',
    ],
    'boolean'              => 'Isian kolom :attribute hanya boleh berisi true atau false.',
    'confirmed'            => 'Isian kolom :attribute konfirmasi tidak cocok.',
    'date'                 => 'Isian kolom :attribute bukan tanggal yang valid.',
    'date_format'          => 'Isian kolom :attribute harus sesuai format (:format).',
    'different'            => 'Isian kolom :attribute dan :other harus berbeda.',
    'digits'               => 'Isian kolom :attribute harus berisi angka dengan panjang :digits digit.',
    'digits_between'       => 'Isian kolom :attribute harus berisi angka dengan panjang antara :min sampai :max digit.',
    'dimensions'           => 'Isian kolom :attribute terdapat dimensi gambar yang tidak valid.',
    'distinct'             => 'Isian kolom :attribute tidak boleh terdapat duplikasi nilai.',
    'email'                => 'Isian kolom :attribute harus berupa alamat surel yang valid.',
    'exists'               => 'Isian kolom :attribute yang dipilih tidak valid.',
    'file'                 => 'Isian kolom :attribute harus berupa file.',
    'filled'               => 'Kolom :attribute wajib diisi.',
    'image'                => 'Isian kolom :attribute harus berupa gambar.',
    'in'                   => 'Isian kolom :attribute yang dipilih tidak valid.',
    'in_array'             => 'Isian kolom :attribute tidak terdapat pada :other.',
    'integer'              => 'Isian kolom :attribute harus merupakan bilangan bulat.',
    'ip'                   => 'Isian kolom :attribute harus berupa alamat IP yang valid.',
    'json'                 => 'Isian kolom :attribute harus berupa JSON yang valid.',
    'max'                  => [
        'numeric' => 'Isian kolom :attribute tidak boleh lebih dari :max.',
        'file'    => 'Isian kolom :attribute tidak boleh lebih dari :max kilobytes.',
        'string'  => 'Isian kolom :attribute tidak boleh lebih dari :max karakter.',
        'array'   => 'Isian kolom :attribute tidak boleh lebih dari :max item.',
    ],
    'mimes'                => 'Isian kolom :attribute hanya boleh berupa dokumen berjenis : :values.',
    'mimetypes'            => 'Isian kolom :attribute hanya boleh berupa dokumen berjenis : :values.',
    'min'                  => [
        'numeric' => 'Isian kolom :attribute harus minimal :min.',
        'file'    => 'Isian kolom :attribute harus minimal :min kilobytes.',
        'string'  => 'Isian kolom :attribute harus minimal :min karakter.',
        'array'   => 'Isian kolom :attribute harus minimal :min item.',
    ],
    'not_in'               => 'Isian kolom :attribute yang dipilih tidak valid.',
    'numeric'              => 'Isian kolom :attribute harus berupa angka.',
    'present'              => 'Kolom :attribute harus ada.',
    'regex'                => 'Format isian kolom :attribute tidak valid.',
    'required'             => 'Kolom :attribute harus diisi.',
    'required_if'          => 'Kolom :attribute harus diisi bila :other adalah :value.',
    'required_unless'      => 'Kolom :attribute harus diisi bila :other bernilai :values.',
    'required_with'        => 'Kolom :attribute harus diisi bila terdapat :values.',
    'required_with_all'    => 'Kolom :attribute harus diisi bila terdapat :values.',
    'required_without'     => 'Kolom :attribute harus diisi bila tidak terdapat :values.',
    'required_without_all' => 'Kolom :attribute harus diisi bila :values tidak ada.',
    'same'                 => 'Isian kolom :attribute dan :other harus sama.',
    'size'                 => [
        'numeric' => 'Isian kolom :attribute harus berisi :size.',
        'file'    => 'Berkas :attribute harus berukuran :size kilobyte.',
        'string'  => 'Isian kolom :attribute harus berisi :size karakter.',
        'array'   => 'Isian kolom :attribute harus mengandung :size item.',
    ],
    'string'               => 'Isian kolom :attribute harus berupa string.',
    'timezone'             => 'Isian kolom :attribute harus berupa zona waktu yang valid.',
    'unique'               => 'Isian kolom :attribute sudah ada sebelumnya.',
    'uploaded'             => 'Isian kolom :attribute gagal di unggah.',
    'url'                  => 'Isian kolom :attribute tidak sesuai format.',

    // Pesan untuk kustom validasi
    'date_range_format'          => 'Isian kolom :attribute harus sesuai format (:format - :format).',
    'date_end_more_than_date_start' => 'Tanggal berakhir harus selalu lebih besar dari tanggal dimulai.',

    /*
    |--------------------------------------------------------------------------
    | Baris Bahasa untuk Validasi Kustom
    |--------------------------------------------------------------------------
    |
    | Di sini Anda dapat menentukan pesan validasi kustom untuk atribut dengan menggunakan
    | konvensi "attribute.rule" dalam penamaan baris. Hal ini membuat cepat dalam
    | menentukan spesifik baris bahasa kustom untuk aturan atribut yang diberikan.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Kustom Validasi Atribut
    |--------------------------------------------------------------------------
    |
    | Baris bahasa berikut digunakan untuk menukar atribut 'place-holders'
    | dengan sesuatu yang lebih bersahabat dengan pembaca seperti Alamat Surel daripada
    | "surel" saja. Ini benar-benar membantu kita membuat pesan sedikit bersih.
    |
    */

    'attributes' => [
        'name'                      => 'nama',
        'date'                      => 'tanggal',
        'created_at'                => 'tanggal',
        'started_at'                => 'dimulai pada',
        'ended_at'                  => 'berakhir pada',
        'date_start'                => 'dimulai pada',
        'date_finish'               => 'berakhir pada',
        'address'                   => 'alamat',
        'note'                      => 'catatan',
        'booking_dates'             => 'tanggal penggunaan',
        'phone'                     => 'nomor HP',
    ],

];
