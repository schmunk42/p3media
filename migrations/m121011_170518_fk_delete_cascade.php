<?php

class m121011_170518_fk_delete_cascade extends EDbMigration
{
    public function up()
    {
        if (($this->dbConnection->schema instanceof CSqliteSchema) == false):

            $this->dropForeignKey('fk_p3_media_id', 'p3_media_meta');
            $this->addForeignKey('fk_p3_media_id', 'p3_media_meta', 'id', 'p3_media', 'id', 'CASCADE', 'CASCADE');
            $this->dropForeignKey('fk_p3_media_meta_treeParent_id', 'p3_media_meta');
            $this->addForeignKey('fk_p3_media_meta_treeParent_id', 'p3_media_meta', 'treeParent_id', 'p3_media_meta', 'id', 'RESTRICT', 'RESTRICT');

        endif;
    }

    public function down()
    {
        echo "m121011_160518_fk_delete_cascade does not support migration down.\n";
        return false;
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