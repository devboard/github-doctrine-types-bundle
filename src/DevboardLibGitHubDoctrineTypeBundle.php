<?php

declare(strict_types=1);

namespace DevboardLib\GitHubDoctrineTypeBundle;

use DevboardLib\GitHubDoctrineType\Account\AccountApiUrlType;
use DevboardLib\GitHubDoctrineType\Account\AccountAvatarUrlType;
use DevboardLib\GitHubDoctrineType\Account\AccountGravatarIdType;
use DevboardLib\GitHubDoctrineType\Account\AccountHtmlUrlType;
use DevboardLib\GitHubDoctrineType\Account\AccountIdType;
use DevboardLib\GitHubDoctrineType\Account\AccountLoginType;
use DevboardLib\GitHubDoctrineType\Account\AccountTypeType;
use DevboardLib\GitHubDoctrineType\Application\ApplicationIdType;
use DevboardLib\GitHubDoctrineType\Branch\BranchNameType;
use DevboardLib\GitHubDoctrineType\Commit\CommitAuthorEmailType;
use DevboardLib\GitHubDoctrineType\Commit\CommitAuthorNameType;
use DevboardLib\GitHubDoctrineType\Commit\CommitCommitterEmailType;
use DevboardLib\GitHubDoctrineType\Commit\CommitCommitterNameType;
use DevboardLib\GitHubDoctrineType\Commit\CommitDateType;
use DevboardLib\GitHubDoctrineType\Commit\CommitMessageType;
use DevboardLib\GitHubDoctrineType\Commit\CommitShaType;
use DevboardLib\GitHubDoctrineType\Installation\InstallationAccessTokenUrlType;
use DevboardLib\GitHubDoctrineType\Installation\InstallationAccountType;
use DevboardLib\GitHubDoctrineType\Installation\InstallationCreatedAtType;
use DevboardLib\GitHubDoctrineType\Installation\InstallationEventsType;
use DevboardLib\GitHubDoctrineType\Installation\InstallationHtmlUrlType;
use DevboardLib\GitHubDoctrineType\Installation\InstallationIdType;
use DevboardLib\GitHubDoctrineType\Installation\InstallationPermissionsType;
use DevboardLib\GitHubDoctrineType\Installation\InstallationRepositoriesUrlType;
use DevboardLib\GitHubDoctrineType\Installation\InstallationRepositorySelectionType;
use DevboardLib\GitHubDoctrineType\Installation\InstallationUpdatedAtType;
use DevboardLib\GitHubDoctrineType\Repo\RepoApiUrlType;
use DevboardLib\GitHubDoctrineType\Repo\RepoCreatedAtType;
use DevboardLib\GitHubDoctrineType\Repo\RepoDescriptionType;
use DevboardLib\GitHubDoctrineType\Repo\RepoFullNameType;
use DevboardLib\GitHubDoctrineType\Repo\RepoGitUrlType;
use DevboardLib\GitHubDoctrineType\Repo\RepoHtmlUrlType;
use DevboardLib\GitHubDoctrineType\Repo\RepoIdType;
use DevboardLib\GitHubDoctrineType\Repo\RepoNameType;
use DevboardLib\GitHubDoctrineType\Repo\RepoPushedAtType;
use DevboardLib\GitHubDoctrineType\Repo\RepoSizeType;
use DevboardLib\GitHubDoctrineType\Repo\RepoUpdatedAtType;
use DevboardLib\GitHubDoctrineType\Tag\TagNameType;
use DevboardLib\GitHubDoctrineType\User\UserApiUrlType;
use DevboardLib\GitHubDoctrineType\User\UserAvatarUrlType;
use DevboardLib\GitHubDoctrineType\User\UserGravatarIdType;
use DevboardLib\GitHubDoctrineType\User\UserHtmlUrlType;
use DevboardLib\GitHubDoctrineType\User\UserIdType;
use DevboardLib\GitHubDoctrineType\User\UserLoginType;
use Doctrine\DBAL\Types\Type;
use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class DevboardLibGitHubDoctrineTypeBundle extends Bundle
{
    private $types = [
        'GitHubAccountApiUrl'     => AccountApiUrlType::class,
        'GitHubAccountAvatarUrl'  => AccountAvatarUrlType::class,
        'GitHubAccountGravatarId' => AccountGravatarIdType::class,
        'GitHubAccountHtmlUrl'    => AccountHtmlUrlType::class,
        'GitHubAccountId'         => AccountIdType::class,
        'GitHubAccountLogin'      => AccountLoginType::class,
        'GitHubAccountType'       => AccountTypeType::class,

        'GitHubBranchName' => BranchNameType::class,
        'GitHubTagName'    => TagNameType::class,

        'GitHubCommitAuthorEmail'    => CommitAuthorEmailType::class,
        'GitHubCommitAuthorName'     => CommitAuthorNameType::class,
        'GitHubCommitCommitterEmail' => CommitCommitterEmailType::class,
        'GitHubCommitCommitterName'  => CommitCommitterNameType::class,
        'GitHubCommitDate'           => CommitDateType::class,
        'GitHubCommitMessage'        => CommitMessageType::class,
        'GitHubCommitSha'            => CommitShaType::class,

        'GitHubRepoApiUrl'      => RepoApiUrlType::class,
        'GitHubRepoCreatedAt'   => RepoCreatedAtType::class,
        'GitHubRepoDescription' => RepoDescriptionType::class,
        'GitHubRepoGitUrl'      => RepoGitUrlType::class,
        'GitHubRepoHtmlUrl'     => RepoHtmlUrlType::class,
        'GitHubRepoId'          => RepoIdType::class,
        'GitHubRepoFullName'    => RepoFullNameType::class,
        'GitHubRepoName'        => RepoNameType::class,
        'GitHubRepoPushedAt'    => RepoPushedAtType::class,
        'GitHubRepoSize'        => RepoSizeType::class,
        'GitHubRepoUpdatedAt'   => RepoUpdatedAtType::class,

        'GitHubUserApiUrl'     => UserApiUrlType::class,
        'GitHubUserAvatarUrl'  => UserAvatarUrlType::class,
        'GitHubUserGravatarId' => UserGravatarIdType::class,
        'GitHubUserHtmlUrl'    => UserHtmlUrlType::class,
        'GitHubUserId'         => UserIdType::class,
        'GitHubUserLogin'      => UserLoginType::class,

        'GitHubInstallationId'                  => InstallationIdType::class,
        'GitHubInstallationAccount'             => InstallationAccountType::class,
        'GitHubApplicationId'                   => ApplicationIdType::class,
        'GitHubInstallationRepositorySelection' => InstallationRepositorySelectionType::class,
        'GitHubInstallationPermissions'         => InstallationPermissionsType::class,
        'GitHubInstallationEvents'              => InstallationEventsType::class,
        'GitHubInstallationAccessTokenUrl'      => InstallationAccessTokenUrlType::class,
        'GitHubInstallationRepositoriesUrl'     => InstallationRepositoriesUrlType::class,
        'GitHubInstallationHtmlUrl'             => InstallationHtmlUrlType::class,
        'GitHubInstallationCreatedAt'           => InstallationCreatedAtType::class,
        'GitHubInstallationUpdatedAt'           => InstallationUpdatedAtType::class,
    ];

    public function __construct()
    {
        foreach ($this->types as $name => $type) {
            if (false === Type::hasType($name)) {
                Type::addType($name, $type);
            }
        }
    }

    public function boot()
    {
        foreach (array_keys($this->types) as $name) {
            $this->getDatabasePlatform()->registerDoctrineTypeMapping($name, $name);
        }
    }

    private function getDatabasePlatform()
    {
        return $this->container
            ->get('doctrine.orm.entity_manager')
            ->getConnection()
            ->getDatabasePlatform();
    }
}
