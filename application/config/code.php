<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$config['code_idcard'] = array(
    '' => '-- Select One --',
    'ktp' => 'KTP',
    'sim' => 'SIM',
    'pasport' => 'Pasport',
    'student_id' => 'Kartu Pelajar',
    'other' => 'Lainnya'
);

$config['code_marital'] = array(
    '' => '-- Select One --',
    'S' => 'Single',
    'M' => 'Married'
);

$config['code_kota'] = array(
    '' => '-- Select One --',
    'Aceh' => array(
        'banda aceh' => 'Banda Aceh',
        'banda raya' => 'Banda Raya'
    )
);

/* End of file code.php */
/* Location: ./application/config/code.php */