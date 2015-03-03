<?php

class m141019_183341_create_user_table extends CDbMigration
{

	public function safeUp()
	{
		$this->createTable('user', array(
                  'id_user' => 'pk',
                  'name' => 'string NOT NULL',
                  'last_name' => 'string NOT NULL',
                  'email'=>'string',
                  'password'=>'string',
                  'scope'=>'string',
        ));	

        $this->insert('user', array(              
                  'name' => 'Admin',
                  'last_name' => 'Admin',
                  'email'=>'admin',
                  'password'=>'9bfa42e8bd52b998c2cc4eff2b127025',
                  'scope'=>'admin',
      	));

	}

	public function safeDown()
	{
		 $this->dropTable('user');
	}
}