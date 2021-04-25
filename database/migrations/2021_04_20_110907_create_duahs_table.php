<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDuahsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('duahs', function (Blueprint $table) {
            $table->id();
            $table->foreignId("category_id")->nullable()->constrained("categories")->onDelete("set null");
            $table->string("title");
            $table->string("slug");
            $table->longText("details_en");
            $table->longText("details_bn");
            $table->longText("details_ar");
            $table->boolean("status")->default(1);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('duahs');
    }
}
