<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBillTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bill', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('project_id')->comment('项目名');
            $table->integer('user_id')->comment('当前账户操作人');
            $table->string('name')->comment('品名');
            $table->string('amount')->comment('数量');
            $table->integer('handle_id')->comment('经手人');
            $table->decimal('price',18, 2)->comment('价格');
            $table->decimal('cash_disburse',18,2)->comment('现金支出');
            $table->decimal('cash_recover',18,2)->comment('现金回收');
            $table->decimal('oil_disburse',18,2)->comment('油卡支出');
            $table->decimal('oil_recover',18,2)->comment('油卡回收');
            $table->decimal('actual_disburse', 18, 2)->comment('实际开支');
            $table->decimal('remaining', 18,  2)->comment('剩余');
            $table->text('note')->nullable()->comment('备注');
            $table->integer('customize_time')->comment('自定义时间');
            $table->integer('created_at')->comment('创建时间');
            $table->integer('updated_at')->comment('更新时间');
            $table->integer('deleted_at')->nullable()->comment('删除时间');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bill');
    }
}
