<?php
function khong_dau($str)
{
    $str = mb_strtolower($str, 'UTF-8'); // chuyển thành thường trước
    $str = preg_replace([
        '/[áàảãạăắằẳẵặâấầẩẫậ]/u',
        '/[éèẻẽẹêếềểễệ]/u',
        '/[íìỉĩị]/u',
        '/[óòỏõọôốồổỗộơớờởỡợ]/u',
        '/[úùủũụưứừửữự]/u',
        '/[ýỳỷỹỵ]/u',
        '/[đ]/u'
    ], [
        'a',
        'e',
        'i',
        'o',
        'u',
        'y',
        'd'
    ], $str);

    return $str;
}
