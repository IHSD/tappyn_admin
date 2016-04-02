<?php

use Phinx\Migration\AbstractMigration;

class CreateAuthTables extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     *
     * The following commands can be used in this method and Phinx will
     * automatically reverse them when rolling back:
     *
     *    createTable
     *    renameTable
     *    addColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change()
    {
        $this->query("

        CREATE TABLE `groups` (
          `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
          `name` varchar(20) NOT NULL,
          `description` varchar(100) NOT NULL,
          PRIMARY KEY (`id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

        CREATE TABLE `users` (
          `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
          `ip_address` varchar(15) NOT NULL,
          `username` varchar(100) NULL,
          `password` varchar(255) NOT NULL,
          `salt` varchar(255) DEFAULT NULL,
          `email` varchar(100) NOT NULL,
          `activation_code` varchar(40) DEFAULT NULL,
          `forgotten_password_code` varchar(40) DEFAULT NULL,
          `forgotten_password_time` int(11) unsigned DEFAULT NULL,
          `remember_code` varchar(40) DEFAULT NULL,
          `created_on` int(11) unsigned NOT NULL,
          `last_login` int(11) unsigned DEFAULT NULL,
          `active` tinyint(1) unsigned DEFAULT NULL,
          `first_name` varchar(50) DEFAULT NULL,
          `last_name` varchar(50) DEFAULT NULL,
          `company` varchar(100) DEFAULT NULL,
          `phone` varchar(20) DEFAULT NULL,
          PRIMARY KEY (`id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

        CREATE TABLE `users_groups` (
          `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
          `user_id` int(11) unsigned NOT NULL,
          `group_id` mediumint(8) unsigned NOT NULL,
          PRIMARY KEY (`id`),
          KEY `fk_users_groups_users1_idx` (`user_id`),
          KEY `fk_users_groups_groups1_idx` (`group_id`),
          CONSTRAINT `uc_users_groups` UNIQUE (`user_id`, `group_id`),
          CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
          CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

        CREATE TABLE `login_attempts` (
          `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
          `ip_address` varchar(15) NOT NULL,
          `login` varchar(100) NOT NULL,
          `time` int(11) unsigned DEFAULT NULL,
          PRIMARY KEY (`id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8;");

        $data = array(
            array(
                'id' => 1,
                'name' => "admin",
                'description' => "Administrator"
            ),
            array(
                'id' => 2,
                'name' => "member",
                'description' => "Members who submit content"
            ),
            array(
                'id' => 3,
                'name' =>'company',
                'description' => "Copmanies who sign up to create contests"
            )
        );
        $groups = $this->table('groups');
        $groups->insert($data)->save();

        $data = array(
            array(
                'id' => 1,
                'ip_address' => '127.0.0.1',
                'username' => 'administrator',
                'password' => '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36',
                'salt' => '',
                'email' => 'admin@admin.com',
                'activation_code' => '',
                'forgotten_password_code' => NULL,
                'created_on' => time(),
                'last_login' => time(),
                'active' => 1,
                'first_name' => 'Admin',
                'last_name' => 'istrator',
                'company' => 'ADMIN',
                'phone' => '0'
            ),

        );
        $users = $this->table('users');
        $users->insert($data)->save();

        $data = array(
            array(
                'id' => 1,
                'user_id' => 1,
                'group_id' => 1
            ),
            array(
                'id' => 2,
                'user_id' => 1,
                'group_id' => 2,
            ),
            array(
                'id' => 3,
                'user_id' => 1,
                'group_id' => 3
            )
        );

        $ugroups = $this->table('users_groups');
        $ugroups->insert($data)->save();
    }
}
