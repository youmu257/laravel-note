<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMigrationExampleTable extends Migration
{
    /**
     * Table name.
     * 
     * @var string
     */
    private $tableName = 'migration_example';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            // 主鑑
            $table->id('primary_key')
                ->comment('這是註解');
                // 控制欄位位置為第一個
            $table->binary('data')
                // 此欄位可為空
                ->nullable();
            // 布林值
            $table->boolean('is_boolean')
                // 預設值
                ->default(false);
            // 整數
            $table->integer('integer_number')
                // 設置 integer 欄位為 UNSIGNED
                ->unsigned();
            // 長度 4 的 char
            $table->char('char_len4', 4)
                ->nullable();
            // 日期
            $table->date('date_type')
                ->nullable();
            // 日期含時間
            $table->dateTime('date_time')
                ->nullable();
            // 長度 5 並包含小數點 2 位的十進制
            $table->decimal('amount', 5, 2)
                ->nullable();
            // 長度 5 並包含小數點 8 位的浮點數
            $table->double('double_number', 15, 8)
                ->nullable();
            // Enum 型別
            $table->enum('choices', ['foo', 'bar'])
                ->nullable();
            // 浮點數
            $table->float('float_number')
                ->nullable();
            // long text
            $table->longText('long_text')
                ->nullable();
            // small integer
            $table->smallInteger('small_integer')
                ->nullable();
            // 加入 deleted_at 欄位於軟刪除使用
            $table->softDeletes();
            // varchar 長度100
            $table->string('string_len100', 100)
                ->nullable();
            // text
            $table->text('description')
                ->nullable();
            // time
            $table->time('time_type')
                ->nullable();
            // 加入 created_at 和 updated_at 欄位
            $table->timestamps();
        });

        DB::statement("ALTER TABLE `$this->tableName` comment '這是 Table 註解'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists($this->tableName);
    }
}
