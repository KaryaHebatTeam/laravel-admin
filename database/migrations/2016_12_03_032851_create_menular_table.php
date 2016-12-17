<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenularTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    
    public function up()
    {
        Schema::create('menulars', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('url');
            $table->string('icon_class');
            $table->enum('level', array('1', '2', '3'));
            $table->integer('parent_id')->nullable();
            $table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    
    public function down()
    {
        Schema::drop('menulars');
    }
}
