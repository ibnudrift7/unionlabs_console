<?php

class RekapModel
{
    // start_date, end_date, get data dari purchase order, spk opname, biaya list, harian kantor
    public static function getRekap($get = [])
    {
        $startDate = $get['start_date'];
        $endDate = $get['end_date'];

        $purchaseOrder = PurchaseOrder::model()->createReportLastDayRekap(null, $startDate, $endDate);
        $spkOpname = SpkOpname::model()->createReportLastDayRekap(null, $startDate, $endDate);
        $biayaList = BiayaList::model()->createReportLastDayRekap(null, $startDate, $endDate);
        $harianKantor = HarianKantor::model()->createReportLastDayRekap(null, $startDate, $endDate);

        $data = [
            'purchase_order' => $purchaseOrder,
            'spk' => $spkOpname,
            'overhead' => $biayaList,
            'harian' => $harianKantor,
        ];

        // loop all data and grouping by proyek, and categorys. like this.
        // proyek.name > category.name (purchase_order, spk, overheat, harian)
        // data list.
        $groupedData = [];
        foreach ($data as $key => $value) {
            foreach ($value as $key2 => $value2) {
                $groupedData[$value2['proyek_id']][$key][] = [
                    'category' => $key,
                    'data' => $value2,
                ];
            }
        }
        // echo '<pre>';
        // print_r($groupedData);
        // exit;

        return $groupedData;
    }

}