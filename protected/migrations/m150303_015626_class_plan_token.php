<?php

class m150303_015626_class_plan_token extends CDbMigration
{
	public function up()
	{
		$this->addColumn("class", "access_token", "string");
	}

	public function down()
	{
		$this->dropColumn("class", "access_token");
	}

	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}