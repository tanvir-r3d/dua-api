<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSubCategoryFieldToDuahsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('duahs', function (Blueprint $table) {
            $table->foreignId("subcategory_id")->nullable()->constrained("subcategories")->onDelete("set null");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('duahs', function (Blueprint $table) {
            $table->dropColumn('subcategory_id');
        });
    }
}
