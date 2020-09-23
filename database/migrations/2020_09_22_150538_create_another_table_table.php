<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnotherTableTable extends Migration
{
    /**
     * Table name.
     * 
     * @var string
     */
    private $tableName = 'another_table';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->increments('id');
            // 整數
            $table->unsignedBigInteger('foreign_integer');
            // 允許 null 的 timestamps
            $table->nullableTimestamps();
            // 表示 another_table.foreign_integer 的 foreign key 是 migration_example.primary_key
            // 型別必須完全一致不然會出現錯誤
            $table->foreign('foreign_integer')->references('primary_key')->on('migration_example');
        });
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
