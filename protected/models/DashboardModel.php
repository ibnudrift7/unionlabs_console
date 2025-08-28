<?php

/**
 * ContactForm class.
 * ContactForm is the data structure for keeping
 * contact form data. It is used by the 'contact' action of 'SiteController'.
 */
class DashboardModel
{

    public static function getDashboardsTotal()
    {
        $project_active = Yii::app()->session['project_active'];

        // get all ackasbank
        $ackasbank = AcKasBank::model()->findAll('company_id = :company_id', array(':company_id' => $project_active));

        // [] bank_id, company_id, trx_tipe='debit' on AcTranscationList
        $debit = AcTransactionsList::model()->findAll('company_id = :company_id AND trx_tipe = :trx_tipe AND deleted_at IS NULL', array(':company_id' => $project_active, ':trx_tipe' => 'debit'));
        // [] bank_id, company_id, trx_tipe='kredit' on AcTranscationList
        $kredit = AcTransactionsList::model()->findAll('company_id = :company_id AND trx_tipe = :trx_tipe AND deleted_at IS NULL', array(':company_id' => $project_active, ':trx_tipe' => 'kredit'));

        $totalDebit = 0;
        $totalKredit = 0;
        if ($debit) {   
            foreach ($debit as $key => $value) {
                $totalDebit += $value->amount;
            }
        }

        if ($kredit) {   
            foreach ($kredit as $key => $value) {
                $totalKredit += $value->amount;
            }
        }
    
        return [
            'ackasbank' => $ackasbank,
            'debit' => $totalDebit,
            'kredit' => $totalKredit,
            'saldo' => $totalDebit - $totalKredit,
        ];
    }

    public static function getTotalPengeluaranTiapProyek()
    {
        $project_active = Yii::app()->session['project_active'];
        $proyekList = Proyeks::model()->findAll('t.company_id = :cmp_id and t.deleted_at IS NULL', array(':cmp_id' => $project_active));

        $res_Lists = [];
        foreach ($proyekList as $proyek) {
            $criteria = new CDbCriteria();
            $criteria->addCondition('t.company_id = :company_id AND t.trx_tipe = :trx_tipe AND t.project_id = :project_id AND t.deleted_at IS NULL');
            $criteria->params = [
                ':company_id' => intval($project_active),
                ':trx_tipe'   => 'kredit',
                ':project_id' => intval($proyek->id),
            ];
            // echo '<pre style="font-size: 12px; color: #000; display:none;">';
            // print_r($criteria);
            // echo '</pre>';

            $allKredit = AcTransactionsList::model()->findAll($criteria);

            
            $totalPengeluaran = array_reduce($allKredit, function ($sum, $item) {
                return $sum + (float)$item->amount;
            }, 0);

            // echo '<pre style="font-size: 12px; color: #000; display:none;">';
            // print_r($totalPengeluaran);
            // echo '</pre>';

            $res_Lists[] = [
                'id'           => $proyek->id,
                'nama_proyek'  => $proyek->names,
                'pengeluaran'  => $totalPengeluaran,
            ];
        }

        return $res_Lists;
    }

    public function getSisaSaldo()
    {
        
    }

}