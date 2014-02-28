<?php

class m110719_000000_init extends CDbMigration {

	public function up() {
// Schema for table 'p3_media'

		if ($this->dbConnection->schema instanceof CMysqlSchema)
			$options = 'ENGINE=InnoDB DEFAULT CHARSET=utf8';
		else
			$options = '';



// Schema for table 'p3_media'

		$this->createTable(
			"p3_media", array(
			"id" => "pk",
			"title" => "varchar(32) NOT NULL",
			"description" => "text",
			"type" => "int(11) NOT NULL",
			"path" => "varchar(255)",
			"md5" => "varchar(32)",
			"originalName" => "varchar(128)",
			"mimeType" => "varchar(128)",
			"size" => "int(11)",
			"info" => "text",
			), $options);



		$this->createTable("p3_media_meta", array(
			"id" => "int(11) NOT NULL",
			"status" => "int(11)",
			"type" => "varchar(64)",
			"language" => "varchar(8)",
			"treeParent_id" => "int(11)",
			"treePosition" => "int(11)",
			"begin" => "datetime",
			"end" => "datetime",
			"keywords" => "text",
			"customData" => "text",
			"label" => "int(11)",
			"owner" => "varchar(64)",
			"checkAccessCreate" => "varchar(256)",
			"checkAccessRead" => "varchar(256)",
			"checkAccessUpdate" => "varchar(256)",
			"checkAccessDelete" => "varchar(256)",
			"createdAt" => "timestamp",
			"createdBy" => "varchar(64)",
			"modifiedAt" => "timestamp",
			"modifiedBy" => "varchar(64)",
			"guid" => "varchar(64)",
			"ancestor_guid" => "varchar(64)",
			"model" => "varchar(128)",
			"PRIMARY KEY (id)"
			), $options);


// Foreign Keys for table 'p3_media_meta'

		if (($this->dbConnection->schema instanceof CSqliteSchema) == false):

		$this->addForeignKey('fk_p3_media_id', 'p3_media_meta', 'id', 'p3_media', 'id', null, null); // update 'null' for ON DELTE and ON UPDATE

		$this->addForeignKey('fk_p3_media_meta_treeParent_id', 'p3_media_meta', 'treeParent_id', 'p3_media_meta', 'id', null, null); // update 'null' for ON DELTE and ON UPDATE

		endif;
	}

	public function down() {
		$this->dropTable('p3_media_meta');
		$this->dropTable('p3_media');
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