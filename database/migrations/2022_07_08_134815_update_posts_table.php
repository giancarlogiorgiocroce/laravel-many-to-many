<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table){
            //Questo crea la colonna per la FK
            $table->unsignedBigInteger('category_id')->nullable()->after('id');
            //Mentre questo assegna la FK alla colonna
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table){
            //L'eliminazione è speculare: prima elimino la FK
            $table->dropForeign(['category_id']);
            //Questo crea la colonna per la FK
            $table->dropColumn('category_id');;
        });
    }
}
