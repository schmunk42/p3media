<?php

class m131009_182400_unification extends EDbMigration
{
    public function up()
    {
        if ($this->dbConnection->schema instanceof CMysqlSchema) {
            $options = 'ENGINE=InnoDB DEFAULT CHARSET=utf8';
        } else {
            $options = '';
        }

        if ($this->dbConnection->schema instanceof CMysqlSchema) {
            $this->execute('SET FOREIGN_KEY_CHECKS = 0;');
        }

        // new statuses: 'draft', 'published', 'archived'
        $statusMap = array(
            0  => 'archived',
            10 => 'draft',
            20 => 'draft',
            30 => 'published',
            40 => 'published',
            50 => 'archived',
            60 => 'archived'
        );

        $this->createTable(
             "_p3_media_v0_16",
                 array(
                      "id"                     => "pk",
                      // yiiext/status-behavior
                      "status"                 => "varchar(32) NOT NULL",
                      "type"                   => "VARCHAR(64) NOT NULL DEFAULT 'file'",
                      "name_id"                => "VARCHAR(64)",
                      // mikehaertl/translatable (defaults)
                      "default_title"          => "varchar(255) NOT NULL",
                      "default_description"    => "text",
                      // schmunk42/adjacency-list-behavior
                      "tree_parent_id"         => "int(11)",
                      "tree_position"          => "int(11)",
                      "custom_data_json"       => "text",
                      "original_name"          => "varchar(128)",
                      "path"                   => "varchar(255)",
                      "hash"                   => "varchar(64)",
                      "mime_type"              => "varchar(128)",
                      "size"                   => "int(11)",
                      "info_php_json"          => "text",
                      "info_image_magick_json" => "text",
                      // schmunk42/yii-access
                      "access_owner"           => "varchar(64) NOT NULL",
                      "access_domain"          => "varchar(8) NOT NULL",
                      "access_read"            => "varchar(256)",
                      "access_update"          => "varchar(256)",
                      "access_delete"          => "varchar(256)",
                      "access_append"          => "varchar(256)",
                      // copy behavior
                      "copied_from_id"         => "int(11)",
                      // time
                      "created_at"             => "datetime NULL DEFAULT NULL",
                      "updated_at"             => "datetime NULL DEFAULT NULL",
                      "FOREIGN KEY(tree_parent_id) REFERENCES _p3_media_v0_16(id) ON DELETE RESTRICT ON UPDATE CASCADE",
                 ),
                 $options
        );

        // Schema for table 'p3_media_translation'
        $this->createTable(
             "_p3_media_translation_v0_16",
                 array(
                      "id"             => "pk",
                      "p3_media_id"    => "int(11) NOT NULL",
                      "status"         => "varchar(32) NOT NULL",
                      "language"       => "varchar(8) NOT NULL",
                      "title"          => "varchar(255) NOT NULL",
                      "description"    => "text",
                      // schmunk42/yii-access
                      "access_owner"   => "varchar(64) NOT NULL",
                      #"access_domain"       => "varchar(8)", // * DOMAIN ????
                      "access_read"    => "varchar(256)",
                      "access_update"  => "varchar(256)",
                      "access_delete"  => "varchar(256)",
                      #"access_append"       => "varchar(256)",
                      // copy behavior
                      "copied_from_id" => "int(11)",
                      // time
                      "created_at"     => "datetime NULL DEFAULT NULL",
                      "updated_at"     => "datetime NULL DEFAULT NULL",
                      "FOREIGN KEY(p3_media_id) REFERENCES _p3_media_v0_16(id) ON DELETE CASCADE ON UPDATE CASCADE"
                 ),
                 $options
        );

        $this->createIndex('p3_media_name_id_unique', '_p3_media_v0_16', 'name_id', true);
        $this->createIndex(
             'p3_media_translation_id_language_unique',
                 '_p3_media_translation_v0_16',
                 'p3_media_id, language',
                 true
        );

        // JOIN all three existing tables, use the first translation as default values
        $sqlStatement = "SELECT  p3_media_meta.*, p3_media.*
            FROM p3_media
            LEFT JOIN p3_media_meta ON p3_media_meta.id = p3_media.id";
        $command      = $this->dbConnection->createCommand($sqlStatement);
        $command->execute();
        $reader = $command->query();
        $owner  = array();
        foreach ($reader as $row) {
            #var_dump($row);

            $owner[$row['id']]  = ($row['owner']) ? $row['owner'] : 1;
            $status[$row['id']] = ($row['status']) ? $statusMap[$row['status']] : 'draft';

            echo $row['type'];
            $type[$row['id']] = ($row['type'] == 1) ? 'file' : 'directory';

            $info = CJSON::decode($row['info']);
            if (isset($info[0])) {
                $info_php_json          = $row['info'];
                $info_image_magick_json = null;
            } else {
                $info_php_json          = null;
                $info_image_magick_json = $row['info'];
            }


            $this->insert(
                 "_p3_media_v0_16",
                     array(
                          "id"                     => $row['id'],
                          "name_id"                => $row['nameId'],
                          // mikehaertl/translatable (defaults)
                          "type"                   => $type[$row['id']],
                          // mikehaertl/translatable (defaults)
                          "default_title"          => $row['title'],
                          "default_description"    => $row['description'],
                          // schmunk42/adjacency-list-behavior
                          "tree_parent_id"         => $row['treeParent_id'],
                          "tree_position"          => $row['treePosition'],
                          "custom_data_json"       => $row['customData'],
                          "original_name"          => $row['originalName'],
                          "path"                   => $row['path'],
                          "hash"                   => $row['md5'],
                          "mime_type"              => $row['mimeType'],
                          "size"                   => $row['size'],
                          "info_php_json"          => $info_php_json,
                          "info_image_magick_json" => $info_image_magick_json,
                          // yiiext/status-behavior
                          "status"                 => $status[$row['id']],
                          // schmunk42/yii-access
                          "access_owner"           => $owner[$row['id']],
                          "access_domain"          => $row['language'],
                          "access_read"            => $row['checkAccessRead'],
                          "access_update"          => $row['checkAccessUpdate'],
                          "access_delete"          => $row['checkAccessDelete'],
                          #"access_append"       => $row['checkAccessUpdate'],
                          // copy behavior
                          "copied_from_id"         => null,
                          // time
                          "created_at"             => ($row['createdAt'] && $row['createdAt'] != '0000-00-00 00:00:00') ?
                                  $row['createdAt'] : null,
                          "updated_at"             => ($row['modifiedAt'] && $row['modifiedAt'] != '0000-00-00 00:00:00') ?
                                  $row['modifiedAt'] : null,
                     )
            );

        }

        $this->renameTable('p3_media_meta', '_p3_media_meta_v0_15');
        $this->renameTable('p3_media', '_p3_media_v0_15');

        $this->renameTable('_p3_media_translation_v0_16', 'p3_media_translation');
        $this->renameTable('_p3_media_v0_16', 'p3_media');

        if ($this->dbConnection->schema instanceof CMysqlSchema) {
            $this->execute('SET FOREIGN_KEY_CHECKS = 1;');
        }

        echo "\n\n*** IMPORTANT NOTICE ***";
        echo "\nThe existing p3_media... tables were renamed to _p3_media...v0_15.\n\n";
    }

    public function down()
    {
        if ($this->dbConnection->schema instanceof CMysqlSchema) {
            $this->execute('SET FOREIGN_KEY_CHECKS = 0;');
        }

        $this->dropTable('p3_media_translation');
        $this->dropTable('p3_media');

        $this->renameTable('_p3_media_v0_15', 'p3_media');
        $this->renameTable('_p3_media_meta_v0_15', 'p3_media_meta');

        if ($this->dbConnection->schema instanceof CMysqlSchema) {
            #$this->execute('SET FOREIGN_KEY_CHECKS = 1;');
        }
    }
}