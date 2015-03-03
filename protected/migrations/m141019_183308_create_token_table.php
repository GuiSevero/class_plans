<?php

class m141019_183308_create_token_table extends CDbMigration
{


	public function safeUp()
	{
		$this->createTable('token', array(
                  'id' => 'pk',
                  'name' => 'string NOT NULL',
        ));	

	}

	public function safeDown()
	{
		 $this->dropTable('token');
	}
}