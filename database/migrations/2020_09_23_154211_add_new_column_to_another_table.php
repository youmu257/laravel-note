<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewColumnToAnotherTable extends Migration
{
    /**
     * Table name.
     * 
     * @var string
     */
    private $tableName = 'another_table';

    /**
     * New column name.
     * 
     * @var string
     */
    private $addColumn = 'char_len4';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->tableName)) {
            Schema::table($this->tableName, function (Blueprint $table) {
                // 新增加一個長度為 4 的 char
                $table->char($this->addColumn, 4);
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasTable($this->tableName)) {
            if (Schema::hasColumn($this->tableName, $this->addColumn)) {
                Schema::table($this->tableName, function (Blueprint $table) {
                    // 刪除一個欄位
                    $table->dropColumn($this->addColumn);
                });
            }
        }
    }
}
