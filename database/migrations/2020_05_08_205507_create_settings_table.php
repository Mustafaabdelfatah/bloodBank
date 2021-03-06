<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSettingsTable extends Migration {

	public function up()
	{
		Schema::create('settings', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->longText('about_app');
			$table->text('notification_setting_text');
			$table->string('phone');
			$table->string('email');
			$table->string('fb_link');
			$table->string('fw_link');
			$table->string('insta_link');
		});
	}

	public function down()
	{
		Schema::drop('settings');
	}
}