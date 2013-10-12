<?php

class m130827_201909_update_title_length extends EDbMigration
{
	public function safeUp()
	{
        if (Yii::app()->db->schema instanceof CMysqlSchema) {
            $options = 'ENGINE=InnoDB DEFAULT CHARSET=utf8';
        } else {
            $options = '';
        }

        $this->createTable(
            "p3_media_130827",
            array(
                "id" => "int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT",
                "title" => "varchar(64) NOT NULL",
                "description" => "text",
                "type" => "int(11) NOT NULL",
                "path" => "varchar(255) DEFAULT NULL",
                "md5" => "varchar(32) DEFAULT NULL",
                "originalName" => "varchar(128) DEFAULT NULL",
                "mimeType" => "varchar(128) DEFAULT NULL",
                "size" => "int(11) DEFAULT NULL",
                "info" => "text",
                "nameId" => "varchar(64) DEFAULT NULL",
                "UNIQUE KEY `p3_media_nameId_unique` (`nameId`)"
            ),
            $options
        );

        $sqlStatement = "SELECT * FROM p3_media";
        $command = $this->dbConnection->createCommand($sqlStatement);
        $command->execute();

        $reader = $command->query();

        foreach($reader as $row) {
            $this->insert(
                "p3_media_130827",
                array(
                    "id"            => $row['id'],
                    "title"         => $row['title'],
                    "description"   => $row['description'],
                    "type"          => $row['type'],
                    "path"          => $row['path'],
                    "md5"           => $row['md5'],
                    "originalName"  => $row['originalName'],
                    "mimeType"      => $row['mimeType'],
                    "size"          => $row['size'],
                    "info"          => $row['info'],
                    "nameId"        => $row['nameId']
                )
            );
        }
        
        if (Yii::app()->db->schema instanceof CMysqlSchema) {
           $this->execute('SET FOREIGN_KEY_CHECKS = 0;');
        }

        $this->dropTable('p3_media');

        if (Yii::app()->db->schema instanceof CMysqlSchema) {
           $this->execute('SET FOREIGN_KEY_CHECKS = 1;');
        }

        $this->renameTable('p3_media_130827', 'p3_media');
	}

	public function safeDown()
	{
        if (Yii::app()->db->schema instanceof CMysqlSchema) {
            $options = 'ENGINE=InnoDB DEFAULT CHARSET=utf8';
        } else {
            $options = '';
        }

        $this->createTable(
            "p3_media_down_130827",
            array(
                "id" => "int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT",
                "title" => "varchar(32) NOT NULL",
                "description" => "text",
                "type" => "int(11) NOT NULL",
                "path" => "varchar(255) DEFAULT NULL",
                "md5" => "varchar(32) DEFAULT NULL",
                "originalName" => "varchar(128) DEFAULT NULL",
                "mimeType" => "varchar(128) DEFAULT NULL",
                "size" => "int(11) DEFAULT NULL",
                "info" => "text",
                "nameId" => "varchar(64) DEFAULT NULL",
                "UNIQUE KEY `p3_media_nameId_unique` (`nameId`)"
            ),
            $options
        );

        $sqlStatement = "SELECT * FROM p3_media";
        $command = $this->dbConnection->createCommand($sqlStatement);
        $command->execute();

        $reader = $command->query();

        foreach($reader as $row) {
            $this->insert(
                "p3_media_down_130827",
                array(
                    "id"            => $row['id'],
                    "title"         => $row['title'],
                    "description"   => $row['description'],
                    "type"          => $row['type'],
                    "path"          => $row['path'],
                    "md5"           => $row['md5'],
                    "originalName"  => $row['originalName'],
                    "mimeType"      => $row['mimeType'],
                    "size"          => $row['size'],
                    "info"          => $row['info'],
                    "nameId"        => $row['nameId']
                )
            );
        }
        
        if (Yii::app()->db->schema instanceof CMysqlSchema) {
           $this->execute('SET FOREIGN_KEY_CHECKS = 0;');
        }

        $this->dropTable('p3_media');

        if (Yii::app()->db->schema instanceof CMysqlSchema) {
           $this->execute('SET FOREIGN_KEY_CHECKS = 1;');
        }

        $this->renameTable('p3_media_down_130827', 'p3_media');
	}
}
