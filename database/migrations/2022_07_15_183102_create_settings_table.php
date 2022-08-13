<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSettingsTable extends Migration {

	public function up()
	{
		Schema::create('settings', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->text('notification_setting_text');
			$table->string('about_app',100);
			$table->string('phone',100);
			$table->string('email',100);
			$table->string('fb_link',100);
			$table->string('tw_link',100);
			$table->string('insta_link',100);
			$table->string('whats_link',100);
			$table->string('g_link',100);
		});
	}

	public function down()
	{
		Schema::drop('settings');
	}
}