<?php
/**
 * Created by PhpStorm.
 * User: lxphp
 * Date: 2018/3/20
 * Time: 16:38
 */
namespace App\Exports;
use App\Model\Bill;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;

class DebitsExport implements WithHeadings, WithMapping, FromQuery
{
    protected $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * 控制器传递过来id查询数据
     * @return $this|\Illuminate\Database\Query\Builder
     */
    public function query()
    {
        $query = Bill::query();

        if (is_array($this->id)) {
            return $query->whereIn('id', $this->id);
        }

        return $query->where('id', $this->id);
    }


    /**
     * 列格式化
     * @param mixed $debit
     * @return array
     */
    public function map($billId): array
    {
        return [
            $billId->user->name,
            $billId->project->project_name,
            $billId->name,
            $billId->amount,
            $billId->handle->handle_name,
            $billId->price,
            $billId->cash_disburse,
            $billId->cash_recover,
            $billId->oil_disburse,
            $billId->oil_recover,
            $billId->actual_disburse,
            $billId->remaining,
            $billId->note,
            $billId->created_at,
        ];
    }
    public function headings(): array
    {
        return [
            '会员名',
            '项目名',
            '品名',
            '数量',
            '经手人',
            '运价',
            '现金支出	',
            '现金回收',
            '油卡支出',
            '油卡回收',
            '实际开支	',
            '剩余',
            '备注',
            '时间',
        ];
    }

}