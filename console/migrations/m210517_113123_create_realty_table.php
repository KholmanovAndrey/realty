<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%realty}}`.
 */
class m210517_113123_create_realty_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%realty}}', [
            'id' => $this->primaryKey(),
            'address_id' => $this->integer()->notNull(),
            'name' => $this->string()->notNull()->unique(),
            'title' => $this->string()->notNull(),
            'description' => $this->text()->notNull(),
            'price' => $this->integer()->notNull(),
            'photos' => $this->text()->notNull(),

            'phones' => $this->string()->notNull(),
            'contact' => $this->string()->notNull(),

            'district' => $this->string()->notNull(),
            'number_of_rooms' => $this->tinyInteger()->notNull(),
            'sleeping_places' => $this->string()->notNull(),

            'status' => $this->smallInteger()->notNull()->defaultValue(10),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);

        $this->createIndex(
            'idx-realty-address_id',
            '{{%realty}}',
            'address_id'
        );

        $this->addForeignKey(
            'fk-realty-address_id',
            '{{%realty}}',
            'address_id',
            '{{%address}}',
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
            'fk-realty-address_id',
            '{{%realty}}'
        );

        $this->dropIndex(
            'idx-realty-address_id',
            '{{%realty}}'
        );

        $this->dropTable('{{%realty}}');
    }
}
