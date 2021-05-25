<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%street}}`.
 */
class m210517_110637_create_street_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%street}}', [
            'id' => $this->primaryKey(),
            'city_id' => $this->integer()->notNull(),
            'name' => $this->string()->notNull()->unique(),
            'title' => $this->string()->notNull()->unique(),
        ]);

        $this->createIndex(
            'idx-street-city_id',
            '{{%street}}',
            'city_id'
        );

        $this->addForeignKey(
            'fk-street-city_id',
            '{{%street}}',
            'city_id',
            '{{%city}}',
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
            'fk-street-city_id',
            '{{%street}}'
        );

        $this->dropIndex(
            'idx-street-city_id',
            '{{%street}}'
        );

        $this->dropTable('{{%street}}');
    }
}
