<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%addresses}}`.
 */
class m210517_110729_create_addresses_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%addresses}}', [
            'id' => $this->primaryKey(),
            'street_id' => $this->integer(),
            'building' => $this->string()->notNull(),
            'apartment' => $this->string()->notNull(),
        ]);

        $this->createIndex(
            'idx-addresses-street_id',
            '{{%addresses}}',
            'street_id'
        );

        $this->addForeignKey(
            'fk-addresses-street_id',
            '{{%addresses}}',
            'street_id',
            '{{%streets}}',
            'id'
//            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
            'fk-addresses-street_id',
            '{{%addresses}}'
        );

        $this->dropIndex(
            'idx-addresses-street_id',
            '{{%addresses}}'
        );

        $this->dropTable('{{%addresses}}');
    }
}
