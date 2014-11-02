<?php

class m141019_183229_create_classplan_table extends CDbMigration
{

	public function safeUp()
	{

		$this->createTable('class_plan', array(
                  'id_class' => 'pk',
                  'title' => 'string NOT NULL',
                  'objectives' => 'text NOT NULL',
                  'contents'=>'text',
                  'resources'=>'text',
                  'evaluation'=>'text',
                  'sobek_keywords'=>'string',
                  'tags'=>'string',
                  'released'=>'boolean',
                  'id_owner'=>'integer',
                  'descricao'=>'text',
                  'theme'=>'string'
        ));	

	}

	public function safeDown()
	{
		echo "m141019_183229_create_classplan_table does not support migration down.\n";
		 $this->dropTable('user');
	}
}