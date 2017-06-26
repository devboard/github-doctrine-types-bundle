<?php

declare(strict_types=1);

namespace Devboard\GitHub\DoctrineTypesBundle;

use Devboard\GitHub\DoctrineTypes\Account\GitHubAccountApiUrlType;
use Devboard\GitHub\DoctrineTypes\Account\GitHubAccountAvatarUrlType;
use Devboard\GitHub\DoctrineTypes\Account\GitHubAccountGravatarIdType;
use Devboard\GitHub\DoctrineTypes\Account\GitHubAccountHtmlUrlType;
use Devboard\GitHub\DoctrineTypes\Account\GitHubAccountIdType;
use Devboard\GitHub\DoctrineTypes\Account\GitHubAccountLoginType;
use Devboard\GitHub\DoctrineTypes\Account\GitHubAccountTypeType;
use Devboard\GitHub\DoctrineTypes\Branch\GitHubBranchNameType;
use Devboard\GitHub\DoctrineTypes\Commit\GitHubCommitAuthorEmailType;
use Devboard\GitHub\DoctrineTypes\Commit\GitHubCommitAuthorNameType;
use Devboard\GitHub\DoctrineTypes\Commit\GitHubCommitCommitterEmailType;
use Devboard\GitHub\DoctrineTypes\Commit\GitHubCommitCommitterNameType;
use Devboard\GitHub\DoctrineTypes\Commit\GitHubCommitDateType;
use Devboard\GitHub\DoctrineTypes\Commit\GitHubCommitMessageType;
use Devboard\GitHub\DoctrineTypes\Commit\GitHubCommitShaType;
use Devboard\GitHub\DoctrineTypes\Repo\GitHubRepoApiUrlType;
use Devboard\GitHub\DoctrineTypes\Repo\GitHubRepoCreatedAtType;
use Devboard\GitHub\DoctrineTypes\Repo\GitHubRepoDescriptionType;
use Devboard\GitHub\DoctrineTypes\Repo\GitHubRepoFullNameType;
use Devboard\GitHub\DoctrineTypes\Repo\GitHubRepoGitUrlType;
use Devboard\GitHub\DoctrineTypes\Repo\GitHubRepoHtmlUrlType;
use Devboard\GitHub\DoctrineTypes\Repo\GitHubRepoIdType;
use Devboard\GitHub\DoctrineTypes\Repo\GitHubRepoNameType;
use Devboard\GitHub\DoctrineTypes\Repo\GitHubRepoPushedAtType;
use Devboard\GitHub\DoctrineTypes\Repo\GitHubRepoSizeType;
use Devboard\GitHub\DoctrineTypes\Repo\GitHubRepoUpdatedAtType;
use Devboard\GitHub\DoctrineTypes\Tag\GitHubTagNameType;
use Devboard\GitHub\DoctrineTypes\User\GitHubUserApiUrlType;
use Devboard\GitHub\DoctrineTypes\User\GitHubUserAvatarUrlType;
use Devboard\GitHub\DoctrineTypes\User\GitHubUserGravatarIdType;
use Devboard\GitHub\DoctrineTypes\User\GitHubUserHtmlUrlType;
use Devboard\GitHub\DoctrineTypes\User\GitHubUserIdType;
use Devboard\GitHub\DoctrineTypes\User\GitHubUserLoginType;
use Doctrine\DBAL\Types\Type;
use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class DevboardGitHubDoctrineTypesBundle extends Bundle
{
    private $types = [
        'GitHubAccountApiUrl'     => GitHubAccountApiUrlType::class,
        'GitHubAccountAvatarUrl'  => GitHubAccountAvatarUrlType::class,
        'GitHubAccountGravatarId' => GitHubAccountGravatarIdType::class,
        'GitHubAccountHtmlUrl'    => GitHubAccountHtmlUrlType::class,
        'GitHubAccountId'         => GitHubAccountIdType::class,
        'GitHubAccountLogin'      => GitHubAccountLoginType::class,
        'GitHubAccountType'       => GitHubAccountTypeType::class,

        'GitHubBranchName' => GitHubBranchNameType::class,
        'GitHubTagName'    => GitHubTagNameType::class,

        'GitHubCommitAuthorEmail'    => GitHubCommitAuthorEmailType::class,
        'GitHubCommitAuthorName'     => GitHubCommitAuthorNameType::class,
        'GitHubCommitCommitterEmail' => GitHubCommitCommitterEmailType::class,
        'GitHubCommitCommitterName'  => GitHubCommitCommitterNameType::class,
        'GitHubCommitDate'           => GitHubCommitDateType::class,
        'GitHubCommitMessage'        => GitHubCommitMessageType::class,
        'GitHubCommitSha'            => GitHubCommitShaType::class,

        'GitHubRepoApiUrl'      => GitHubRepoApiUrlType::class,
        'GitHubRepoCreatedAt'   => GitHubRepoCreatedAtType::class,
        'GitHubRepoDescription' => GitHubRepoDescriptionType::class,
        'GitHubRepoGitUrl'      => GitHubRepoGitUrlType::class,
        'GitHubRepoHtmlUrl'     => GitHubRepoHtmlUrlType::class,
        'GitHubRepoId'          => GitHubRepoIdType::class,
        'GitHubRepoFullName'    => GitHubRepoFullNameType::class,
        'GitHubRepoName'        => GitHubRepoNameType::class,
        'GitHubRepoPushedAt'    => GitHubRepoPushedAtType::class,
        'GitHubRepoSize'        => GitHubRepoSizeType::class,
        'GitHubRepoUpdatedAt'   => GitHubRepoUpdatedAtType::class,

        'GitHubUserApiUrl'     => GitHubUserApiUrlType::class,
        'GitHubUserAvatarUrl'  => GitHubUserAvatarUrlType::class,
        'GitHubUserGravatarId' => GitHubUserGravatarIdType::class,
        'GitHubUserHtmlUrl'    => GitHubUserHtmlUrlType::class,
        'GitHubUserId'         => GitHubUserIdType::class,
        'GitHubUserLogin'      => GitHubUserLoginType::class,
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
