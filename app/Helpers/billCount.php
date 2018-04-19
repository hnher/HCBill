<?php

namespace App\Helpers;

use App\Model\Bill;

class billCount
{
    public function getBill($query)
    {
        $countDisburses = $query->sum('cash_disburse');//现金支出总金额统计

        $countRecover = $query->sum('cash_recover');//现金回收总金额统计

        $oil_disburse = $query->sum('oil_disburse');//油卡支出总金额

        $oil_recover = $query->sum('oil_recover');//油卡支出总金额

        return [
            'countDisburses'=>$countDisburses,
            'countRecover'=>$countRecover,
            'oil_disburse'=>$oil_disburse,
            'oil_recover'=>$oil_recover,
        ];
    }
}