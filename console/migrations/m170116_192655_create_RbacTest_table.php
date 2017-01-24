<?php

use yii\db\Migration;

/**
 * Handles the creation of table `rbactest`.
 */
class m170116_192655_create_RbacTest_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('rbactest', [
            'id' => $this->primaryKey(),
            'title' => $this->string(),
            'text_all' => $this->text(),
            'id_ouner' => $this->integer(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('rbactest');
    }
}
