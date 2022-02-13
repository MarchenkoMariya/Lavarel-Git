<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable {

    /*@return
*/
public function up()
{
    Schema::create('categories', function (Blueprint $table) {
        $table->increments("id");
        $table->string('title');
        $table->string('slug')->unique();
        $table->integer('parent_id')->nullable();
        $table->tinyinteger('published')->nullable();
        $table->integer('created_by')->nullable();
        $table->integer('modified_by')->nullable();
        $table->timestamps();
    });
}

/*@return
*/
public function down()
{
    Schema::dropIfExists('categories');
}
}
