<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAutoRepalyCampaignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auto_repaly_campaigns', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->tinyInteger('type');
            $table->longText('details');
            $table->integer('page_id');
            $table->integer('post_id');
            $table->integer('user_id');
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
        Schema::dropIfExists('auto_repaly_campaigns');
    }
}
