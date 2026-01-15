<?php

declare(strict_types=1);

namespace OxidSupport\Heartbeat\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Creates the Heartbeat API user group and service user.
 *
 * The service user is created without a password. Use the shop's
 * "forgot password" feature to set the initial password.
 */
final class Version20251223000001 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Create Heartbeat API user group and service user';
    }

    public function up(Schema $schema): void
    {
        $this->connection->getDatabasePlatform()->registerDoctrineTypeMapping('enum', 'string');

        // 1. Create the custom user group for Heartbeat API access
        $this->addSql("
            INSERT INTO oxgroups (OXID, OXACTIVE, OXTITLE, OXTITLE_1)
            VALUES ('oxsheartbeat_api', 1, 'Heartbeat API', 'Heartbeat API')
            ON DUPLICATE KEY UPDATE OXID = OXID
        ");

        // 2. Create the service user (password empty - must use forgot-password feature)
        // Using a deterministic OXID based on the username for idempotency
        $userId = md5('oxsheartbeat_api_user');
        // Note: OXPASSWORD must be non-empty for "forgot password" to work.
        // We generate a random placeholder hash that will never match any password.
        // The user must use "forgot password" to set a real password.
        $placeholderHash = bin2hex(random_bytes(32));
        $this->addSql("
            INSERT INTO oxuser (OXID, OXACTIVE, OXRIGHTS, OXSHOPID, OXUSERNAME, OXPASSWORD, OXPASSSALT, OXFNAME, OXLNAME, OXCREATE, OXREGISTER, OXADDINFO)
            VALUES (
                '{$userId}',
                1,
                'user',
                1,
                'heartbeat-api@oxid-esales.com',
                '{$placeholderHash}',
                '',
                'Heartbeat',
                'API User',
                NOW(),
                NOW(),
                'Service user for Heartbeat GraphQL API. Created by oxsheartbeat module.'
            )
            ON DUPLICATE KEY UPDATE OXID = OXID
        ");

        // 3. Link the user to the Heartbeat API group
        $linkId = md5($userId . 'oxsheartbeat_api');
        $this->addSql("
            INSERT INTO oxobject2group (OXID, OXSHOPID, OXOBJECTID, OXGROUPSID)
            VALUES ('{$linkId}', 1, '{$userId}', 'oxsheartbeat_api')
            ON DUPLICATE KEY UPDATE OXID = OXID
        ");
    }

    public function down(Schema $schema): void
    {
        $userId = md5('oxsheartbeat_api_user');
        $linkId = md5($userId . 'oxsheartbeat_api');

        // Remove the user-group link
        $this->addSql("DELETE FROM oxobject2group WHERE OXID = '{$linkId}'");

        // Remove the service user
        $this->addSql("DELETE FROM oxuser WHERE OXID = '{$userId}'");

        // Remove the user group
        $this->addSql("DELETE FROM oxgroups WHERE OXID = 'oxsheartbeat_api'");
    }
}
