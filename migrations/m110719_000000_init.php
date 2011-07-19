<?php

class m110719_000000_init extends CDbMigration {

	public function up() {

		$this->createTable("p3_media", array(
			"id" => "pk",
			"parent_id" => "int(11) NOT NULL DEFAULT '1'",
			"title" => "varchar(32) NOT NULL DEFAULT '-'",
			"description" => "text",
			"type" => "varchar(45)",
			"path" => "varchar(255) NOT NULL",
			"md5" => "varchar(32) NOT NULL",
			"originalName" => "varchar(128)",
			"mimeType" => "varchar(64)",
			"size" => "int(11)",
			"info" => "text",
			), "");

		$this->insert("p3_media", array(
			"id" => "1",
			"parent_id" => "1",
			"title" => "root",
			"description" => "Root folder",
			"type" => 2,
			"path" => "",
			"md5" => "",
			"originalName" => "root",
			"mimeType" => null,
			"size" => null,
			"info" => null,
			));

		$this->createTable("p3_media_meta", array(
			"id" => "int(11) NOT NULL",
			"parent_id" => "int(11) NOT NULL",
			"p3_media_id" => "int(11) NOT NULL",
			"owner" => "int(11)",
			"language" => "varchar(8)",
			"status" => "int(11)",
			"type" => "varchar(45)",
			"checkAccess" => "varchar(128)",
			"begin" => "date",
			"end" => "date",
			"createdAt" => "time",
			"createdBy" => "varchar(32)",
			"modifiedAt" => "timestamp",
			"modifiedBy" => "varchar(32)",
			"keywords" => "varchar(255)",
			"customData" => "text",
			), "");
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