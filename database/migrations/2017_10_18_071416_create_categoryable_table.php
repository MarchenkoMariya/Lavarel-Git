<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryableTable extends Migration
{
    /*@return
     */

    public function up()
    {
        Schema::create('categoryables', function (Blueprint $table) {
            $table->integer('category_id');
            $table->integer('categoryable_id');
            $table->string('categoryable_type');
        });

    }
    /*@return
*/
    public function down()
    {
        Schema::dropIfExists('categoryables');
    }
}
