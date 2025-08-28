<?php

/**
 * Fungsi Untuk Mendata Translate Text
 * 
 * @author Deory Pandu
 */
class Tt
{
    public static function t($category, $message, $params = array(), $source = NULL, $language = NULL)
    {
        if (true) {
            $data = TtText::model()->find('message = :message COLLATE utf8_bin', array(':message' => $message));
            if ($data === null) {
                $model = new TtText;
                $model->category = $category;
                $model->message = $message;
                $model->save(false);
            }
        }
        return Yii::t($category, $message, $params, $source, $language);
    }

    public static function SentApiWAOut($to, $message)
    {
        // api 1
        $api_url = 'https://api_citraland_wa.atechnocorp.my.id/send-message';

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $api_url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, [
            'phone' => $to,
            'message' => $message,
        ]);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);

        return $response;
    }

    public static function CallWaApi($to, $arr_data = array(), $type_template = 'request_st', $typeSent = 'user')
    {
        // broker/admin, tipe_template, message
        $textTemplate = '';
        if ($type_template == 'request_st') {
            $textTemplate = 'Terimakasih, Anda telah melakukan booking ST unit {code_unit}, di tanggal {tgl} {jam}.. ' . "\n" . 'untuk ketersediaan waktu akan kita konfirmasi WA Kembali.';
        } else if ($type_template == 'confirm_st_admin') {
            $textTemplate = 'Citraland Surabaya. ' . "\n" . 'INFO!. ' . "\n" . 'unit rumah {code_unit} atas nama {nama}, dengan nomer {no_ktp}, sudah siap diserah terimakan dimulai tanggal {date_st}. ' . "\n" . 'Silahkan melakukan booking pada url berikut ini, dengan username ({no_ktp}) dan password ({phone})';
        }

        $textFix = str_replace('{code_unit}', $arr_data['code_unit'], $textTemplate);

        if ($type_template == 'rtequest_st') {
            $textFix = str_replace('{tgl}', $arr_data['tgl'], $textFix);
            $textFix = str_replace('{jam}', $arr_data['jam'], $textFix);
        }

        $textFix = str_replace('{nama}', $arr_data['nama'], $textFix);
        $textFix = str_replace('{no_ktp}', $arr_data['no_ktp'], $textFix);
        $textFix = str_replace('{date_st}', $arr_data['date_st'], $textFix);
        $textFix = str_replace('{phone}', $arr_data['phone'], $textFix);

        $response = @self::SentApiWAOut($to, $textFix);

        return $response;
    }
}
