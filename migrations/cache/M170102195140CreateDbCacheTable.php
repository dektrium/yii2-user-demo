<?php

namespace app\migrations\cache;

use yii\db\Migration;

class M170102195140CreateDbCacheTable extends Migration
{
    public function safeUp()
    {
        $this->createTable(env('CACHE_DB_TABLE', '{{%cache}}'), [
            'id' => $this->char(128)->notNull()->append('PRIMARY KEY'),
            'expire' => $this->integer(),
            'data' => $this->binary(),
        ]);

        $this->createIndex('idx_cache_expire', env('CACHE_DB_TABLE', '{{%cache}}'), 'expire');
    }

    public function safeDown()
    {
        $this->dropTable(env('CACHE_DB_TABLE', '{{%cache}}'));
    }
}
