<?php

namespace App\Helpers;

use App\Model\Debit;
use App\Model\Handle;
use App\Model\Project;

class billCount
{
    public function getBill()
    {
        $countProject = Project::get()->count();//项目统计

        $countHandles = Handle::get()->count();//品名统计

        $countDisburses = Debit::sum('cash_disburse');//现金支出总金额统计

        $countRecover = Debit::sum('cash_recover');//现金回收总金额统计

        $oil_disburse = Debit::sum('oil_disburse');//油卡支出总金额

        $oil_recover = Debit::sum('oil_recover');//油卡支出总金额

        return [
            'countProject'=>$countProject,
            'countHandles'=>$countHandles,
            'countDisburses'=>$countDisburses,
            'countRecover'=>$countRecover,
            'oil_disburse'=>$oil_disburse,
            'oil_recover'=>$oil_recover,
        ];
    }
}