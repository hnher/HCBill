<?php
/**
 * Created by PhpStorm.
 * User: lxphp
 * Date: 2018/3/20
 * Time: 16:38
 */
namespace App\Exports;
use App\Model\Debit;
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
        $query = Debit::query();

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
    public function map($debit): array
    {
        return [
            $debit->project->project_name,
            $debit->name,
            $debit->amount,
            $debit->handle->handle_name,
            $debit->price,
            $debit->cash_disburse,
            $debit->cash_recover,
            $debit->oil_disburse,
            $debit->oil_recover,
            $debit->actual_disburse,
            $debit->remaining,
            $debit->note,
            $debit->created_at,
        ];
    }
    public function headings(): array
    {
        return [
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