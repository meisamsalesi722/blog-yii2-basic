<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%category}}`.
 */
class m260622_113757_create_category_table extends Migration
{
    /**
     * {@inheritdoc}
     */

      public function safeUp()
    {
        $this->createTable('{{%category}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(150)->notNull(),
            'parent_id' => $this->integer()->null(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);
        $this->addForeignKey(
            'fk-category-parent',
            'category',
            'parent_id',
            'category',
            'id',
            'SET NULL',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-category-parent', 'category');
        $this->dropTable('{{%category}}');
    }


}
