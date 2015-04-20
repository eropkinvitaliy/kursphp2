<?php

namespace App\Migrations;

use T4\Orm\Migration;

class m_1404205365_createMenu
    extends Migration
{

    public function up()
    {
        $this->createTable('menu',
            [
                'title' => [
                    'type' => 'string',
                    'length' => 1024,
                ],
                'url' => [
                    'type' => 'string',
                ],
            ],
            [
            ],
            ['tree']
        );
    }

    public function down()
    {
        $this->dropTable('menu');
    }

}