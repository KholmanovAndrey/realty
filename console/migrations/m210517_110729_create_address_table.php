<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%addresses}}`.
 */
class m210517_110729_create_address_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%address}}', [
            'id' => $this->primaryKey(),
            'street_id' => $this->integer()->notNull(),
            'building' => $this->string()->notNull(),
            'apartment' => $this->string(),
        ]);

        $this->createIndex(
            'idx-address-street_id',
            '{{%address}}',
            'street_id'
        );

        $this->addForeignKey(
            'fk-address-street_id',
            '{{%address}}',
            'street_id',
            '{{%street}}',
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
            'fk-address-street_id',
            '{{%address}}'
        );

        $this->dropIndex(
            'idx-address-street_id',
            '{{%address}}'
        );

        $this->dropTable('{{%address}}');
    }
}
