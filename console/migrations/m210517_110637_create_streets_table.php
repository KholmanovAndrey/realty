<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%streets}}`.
 */
class m210517_110637_create_streets_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%streets}}', [
            'id' => $this->primaryKey(),
            'city_id' => $this->integer(),
            'name' => $this->string()->notNull()->unique(),
            'title' => $this->string()->notNull()->unique(),
        ]);

        $this->createIndex(
            'idx-streets-city_id',
            '{{%streets}}',
            'city_id'
        );

        $this->addForeignKey(
            'fk-streets-city_id',
            '{{%streets}}',
            'city_id',
            '{{%cities}}',
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
            'fk-streets-city_id',
            '{{%streets}}'
        );

        $this->dropIndex(
            'idx-streets-city_id',
            '{{%streets}}'
        );

        $this->dropTable('{{%streets}}');
    }
}
