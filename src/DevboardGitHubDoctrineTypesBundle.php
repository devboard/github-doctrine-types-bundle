<?php

declare(strict_types=1);

namespace Devboard\GitHub\DoctrineTypesBundle;

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
use Devboard\GitHub\DoctrineTypes\User\GitHubUserTypeType;
use Doctrine\DBAL\Types\Type;
use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class DevboardGitHubDoctrineTypesBundle extends Bundle
{
    public function boot()
    {
        $this->addType('GitHubBranchName', GitHubBranchNameType::class);
        $this->addType('GitHubTagName', GitHubTagNameType::class);

        $this->addType('GitHubCommitAuthorEmail', GitHubCommitAuthorEmailType::class);
        $this->addType('GitHubCommitAuthorName', GitHubCommitAuthorNameType::class);
        $this->addType('GitHubCommitCommitterEmail', GitHubCommitCommitterEmailType::class);
        $this->addType('GitHubCommitCommitterName', GitHubCommitCommitterNameType::class);
        $this->addType('GitHubCommitDate', GitHubCommitDateType::class);
        $this->addType('GitHubCommitMessage', GitHubCommitMessageType::class);
        $this->addType('GitHubCommitSha', GitHubCommitShaType::class);

        $this->addType('GitHubRepoApiUrl', GitHubRepoApiUrlType::class);
        $this->addType('GitHubRepoCreatedAt', GitHubRepoCreatedAtType::class);
        $this->addType('GitHubRepoDescription', GitHubRepoDescriptionType::class);
        $this->addType('GitHubRepoGitUrl', GitHubRepoGitUrlType::class);
        $this->addType('GitHubRepoHtmlUrl', GitHubRepoHtmlUrlType::class);
        $this->addType('GitHubRepoId', GitHubRepoIdType::class);
        $this->addType('GitHubRepoFullName', GitHubRepoFullNameType::class);
        $this->addType('GitHubRepoName', GitHubRepoNameType::class);
        $this->addType('GitHubRepoPushedAt', GitHubRepoPushedAtType::class);
        $this->addType('GitHubRepoSize', GitHubRepoSizeType::class);
        $this->addType('GitHubRepoUpdatedAt', GitHubRepoUpdatedAtType::class);

        $this->addType('GitHubUserApiUrl', GitHubUserApiUrlType::class);
        $this->addType('GitHubUserAvatarUrl', GitHubUserAvatarUrlType::class);
        $this->addType('GitHubUserGravatarId', GitHubUserGravatarIdType::class);
        $this->addType('GitHubUserHtmlUrl', GitHubUserHtmlUrlType::class);
        $this->addType('GitHubUserId', GitHubUserIdType::class);
        $this->addType('GitHubUserLogin', GitHubUserLoginType::class);
        $this->addType('GitHubUserType', GitHubUserTypeType::class);
    }

    private function addType(string $name, string $typeClassName)
    {
        if (false === Type::hasType($name)) {
            Type::addType($name, $typeClassName);
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
