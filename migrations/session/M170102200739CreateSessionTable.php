<?php

namespace app\migrations\session;

use yii\db\Migration;

class M170102200739CreateSessionTable extends Migration
{
    public function safeUp()
    {
        $this->createTable(env('SESSION_DB_TABLE', '{{%session}}'), [
            'id' => $this->char(40)->notNull()->append('PRIMARY KEY'),
            'expire' => $this->integer(),
            'data' => $this->binary(),
        ]);
    }

    public function safeDown()
    {
        $this->dropTable(env('SESSION_DB_TABLE', '{{%session}}'));
    }
}
