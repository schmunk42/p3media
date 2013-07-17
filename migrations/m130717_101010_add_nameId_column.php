<?php

class m130717_101010_add_nameId_column extends EDbMigration
{
    public function up()
    {
        $this->addColumn('p3_media', 'nameId', 'VARCHAR(64)');
        $this->createIndex('p3_media_nameId_unique', 'p3_media', 'nameId', true);
    }

    public function down()
    {
        $this->dropColumn('p3_media', 'nameId');
    }
}