<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%comment}}`.
 */
class m260622_114640_create_comment_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%comment}}', [
            'id' => $this->primaryKey(),
            'article_id' => $this->integer()->notNull(),
            'user_id' => $this->integer()->notNull(),
            'comment' => $this->text()->notNull(),
            'status' => $this->tinyInteger()->defaultValue(0),
            'created_at' => $this->integer(),
        ]);
        // FK به article
        $this->addForeignKey(
            'fk-comment-article',
            'comment',
            'article_id',
            'article',
            'id',
            'CASCADE',
            'CASCADE'
        );
        // FK به user
        $this->addForeignKey(
            'fk-comment-user',
            'comment',
            'user_id',
            'user',
            'id',
            'CASCADE',
            'CASCADE'
        );
    }
    /**
     * {@inheritdoc}
     */

    public function safeDown()
    {
        $this->dropForeignKey('fk-comment-article', 'comment');
        $this->dropForeignKey('fk-comment-user', 'comment');
        $this->dropTable('{{%comment}}');
    }


}
