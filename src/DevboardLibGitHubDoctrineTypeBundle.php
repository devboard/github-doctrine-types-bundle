<?php

declare(strict_types=1);

namespace DevboardLib\GitHubDoctrineTypeBundle;

use DevboardLib\GitHubDoctrineType\Account\AccountApiUrlType;
use DevboardLib\GitHubDoctrineType\Account\AccountAvatarUrlType;
use DevboardLib\GitHubDoctrineType\Account\AccountHtmlUrlType;
use DevboardLib\GitHubDoctrineType\Account\AccountIdType;
use DevboardLib\GitHubDoctrineType\Account\AccountLoginType;
use DevboardLib\GitHubDoctrineType\Account\AccountTypeType;
use DevboardLib\GitHubDoctrineType\Application\ApplicationIdType;
use DevboardLib\GitHubDoctrineType\Branch\BranchNameType;
use DevboardLib\GitHubDoctrineType\Build\BuildIdType;
use DevboardLib\GitHubDoctrineType\Build\BuildStatusType;
use DevboardLib\GitHubDoctrineType\Commit\AuthorNameType;
use DevboardLib\GitHubDoctrineType\Commit\CommitApiUrlType;
use DevboardLib\GitHubDoctrineType\Commit\CommitAuthorDetailsType;
use DevboardLib\GitHubDoctrineType\Commit\CommitAuthorType;
use DevboardLib\GitHubDoctrineType\Commit\CommitCommitterDetailsType;
use DevboardLib\GitHubDoctrineType\Commit\CommitCommitterType;
use DevboardLib\GitHubDoctrineType\Commit\CommitDateType;
use DevboardLib\GitHubDoctrineType\Commit\CommitHtmlUrlType;
use DevboardLib\GitHubDoctrineType\Commit\CommitMessageType;
use DevboardLib\GitHubDoctrineType\Commit\CommitParent\ParentApiUrlType;
use DevboardLib\GitHubDoctrineType\Commit\CommitParent\ParentHtmlUrlType;
use DevboardLib\GitHubDoctrineType\Commit\CommitParentType;
use DevboardLib\GitHubDoctrineType\Commit\CommitShaType;
use DevboardLib\GitHubDoctrineType\Commit\CommitterNameType;
use DevboardLib\GitHubDoctrineType\Commit\CommitTreeType;
use DevboardLib\GitHubDoctrineType\Commit\CommitVerificationType;
use DevboardLib\GitHubDoctrineType\Commit\Tree\TreeApiUrlType;
use DevboardLib\GitHubDoctrineType\Commit\Verification\VerificationPayloadType;
use DevboardLib\GitHubDoctrineType\Commit\Verification\VerificationReasonType;
use DevboardLib\GitHubDoctrineType\Commit\Verification\VerificationSignatureType;
use DevboardLib\GitHubDoctrineType\Commit\Verification\VerificationVerifiedType;
use DevboardLib\GitHubDoctrineType\External\ExternalServiceType;
use DevboardLib\GitHubDoctrineType\Generix\EmailAddressType;
use DevboardLib\GitHubDoctrineType\Generix\GravatarIdType;
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
use DevboardLib\GitHubDoctrineType\Issue\IssueApiUrlType;
use DevboardLib\GitHubDoctrineType\Issue\IssueAssigneeCollectionType;
use DevboardLib\GitHubDoctrineType\Issue\IssueAssigneeType;
use DevboardLib\GitHubDoctrineType\Issue\IssueAuthorType;
use DevboardLib\GitHubDoctrineType\Issue\IssueBodyType;
use DevboardLib\GitHubDoctrineType\Issue\IssueClosedAtType;
use DevboardLib\GitHubDoctrineType\Issue\IssueCreatedAtType;
use DevboardLib\GitHubDoctrineType\Issue\IssueHtmlUrlType;
use DevboardLib\GitHubDoctrineType\Issue\IssueIdType;
use DevboardLib\GitHubDoctrineType\Issue\IssueNumberType;
use DevboardLib\GitHubDoctrineType\Issue\IssueStateType;
use DevboardLib\GitHubDoctrineType\Issue\IssueTitleType;
use DevboardLib\GitHubDoctrineType\Issue\IssueUpdatedAtType;
use DevboardLib\GitHubDoctrineType\IssueComment\IssueCommentApiUrlType;
use DevboardLib\GitHubDoctrineType\IssueComment\IssueCommentAuthorType;
use DevboardLib\GitHubDoctrineType\IssueComment\IssueCommentBodyType;
use DevboardLib\GitHubDoctrineType\IssueComment\IssueCommentCreatedAtType;
use DevboardLib\GitHubDoctrineType\IssueComment\IssueCommentHtmlUrlType;
use DevboardLib\GitHubDoctrineType\IssueComment\IssueCommentIdType;
use DevboardLib\GitHubDoctrineType\IssueComment\IssueCommentUpdatedAtType;
use DevboardLib\GitHubDoctrineType\Label\LabelApiUrlType;
use DevboardLib\GitHubDoctrineType\Label\LabelColorType;
use DevboardLib\GitHubDoctrineType\Label\LabelIdType;
use DevboardLib\GitHubDoctrineType\Label\LabelNameType;
use DevboardLib\GitHubDoctrineType\Milestone\MilestoneApiUrlType;
use DevboardLib\GitHubDoctrineType\Milestone\MilestoneClosedAtType;
use DevboardLib\GitHubDoctrineType\Milestone\MilestoneCreatedAtType;
use DevboardLib\GitHubDoctrineType\Milestone\MilestoneCreatorType;
use DevboardLib\GitHubDoctrineType\Milestone\MilestoneDescriptionType;
use DevboardLib\GitHubDoctrineType\Milestone\MilestoneDueOnType;
use DevboardLib\GitHubDoctrineType\Milestone\MilestoneHtmlUrlType;
use DevboardLib\GitHubDoctrineType\Milestone\MilestoneIdType;
use DevboardLib\GitHubDoctrineType\Milestone\MilestoneNumberType;
use DevboardLib\GitHubDoctrineType\Milestone\MilestoneStateType;
use DevboardLib\GitHubDoctrineType\Milestone\MilestoneTitleType;
use DevboardLib\GitHubDoctrineType\Milestone\MilestoneUpdatedAtType;
use DevboardLib\GitHubDoctrineType\PullRequest\PullRequestApiUrlType;
use DevboardLib\GitHubDoctrineType\PullRequest\PullRequestAssigneeCollectionType;
use DevboardLib\GitHubDoctrineType\PullRequest\PullRequestAssigneeType;
use DevboardLib\GitHubDoctrineType\PullRequest\PullRequestAuthorType;
use DevboardLib\GitHubDoctrineType\PullRequest\PullRequestBodyType;
use DevboardLib\GitHubDoctrineType\PullRequest\PullRequestClosedAtType;
use DevboardLib\GitHubDoctrineType\PullRequest\PullRequestCreatedAtType;
use DevboardLib\GitHubDoctrineType\PullRequest\PullRequestHtmlUrlType;
use DevboardLib\GitHubDoctrineType\PullRequest\PullRequestIdType;
use DevboardLib\GitHubDoctrineType\PullRequest\PullRequestNumberType;
use DevboardLib\GitHubDoctrineType\PullRequest\PullRequestRootIdType;
use DevboardLib\GitHubDoctrineType\PullRequest\PullRequestStateType;
use DevboardLib\GitHubDoctrineType\PullRequest\PullRequestTitleType;
use DevboardLib\GitHubDoctrineType\PullRequest\PullRequestUpdatedAtType;
use DevboardLib\GitHubDoctrineType\ReferenceNameType;
use DevboardLib\GitHubDoctrineType\Repo\RepoAccessPermissionsType;
use DevboardLib\GitHubDoctrineType\Repo\RepoCreatedAtType;
use DevboardLib\GitHubDoctrineType\Repo\RepoDescriptionType;
use DevboardLib\GitHubDoctrineType\Repo\RepoEndpoints\RepoApiUrlType;
use DevboardLib\GitHubDoctrineType\Repo\RepoEndpoints\RepoGitUrlType;
use DevboardLib\GitHubDoctrineType\Repo\RepoEndpoints\RepoHtmlUrlType;
use DevboardLib\GitHubDoctrineType\Repo\RepoEndpoints\RepoSshUrlType;
use DevboardLib\GitHubDoctrineType\Repo\RepoEndpointsType;
use DevboardLib\GitHubDoctrineType\Repo\RepoFullNameType;
use DevboardLib\GitHubDoctrineType\Repo\RepoHomepageType;
use DevboardLib\GitHubDoctrineType\Repo\RepoIdType;
use DevboardLib\GitHubDoctrineType\Repo\RepoLanguageType;
use DevboardLib\GitHubDoctrineType\Repo\RepoMirrorUrlType;
use DevboardLib\GitHubDoctrineType\Repo\RepoNameType;
use DevboardLib\GitHubDoctrineType\Repo\RepoOwnerType;
use DevboardLib\GitHubDoctrineType\Repo\RepoParentType;
use DevboardLib\GitHubDoctrineType\Repo\RepoPushedAtType;
use DevboardLib\GitHubDoctrineType\Repo\RepoStats\RepoSizeType;
use DevboardLib\GitHubDoctrineType\Repo\RepoStatsType;
use DevboardLib\GitHubDoctrineType\Repo\RepoTimestampsType;
use DevboardLib\GitHubDoctrineType\Repo\RepoUpdatedAtType;
use DevboardLib\GitHubDoctrineType\Status\StatusContextType;
use DevboardLib\GitHubDoctrineType\Status\StatusCreatorType;
use DevboardLib\GitHubDoctrineType\Status\StatusDescriptionType;
use DevboardLib\GitHubDoctrineType\Status\StatusIdType;
use DevboardLib\GitHubDoctrineType\Status\StatusStateType;
use DevboardLib\GitHubDoctrineType\Status\StatusTargetUrlType;
use DevboardLib\GitHubDoctrineType\Tag\TagNameType;
use DevboardLib\GitHubDoctrineType\User\UserApiUrlType;
use DevboardLib\GitHubDoctrineType\User\UserAvatarUrlType;
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
        // Application
        'ApplicationId' => ApplicationIdType::class,

        'GitHubAccountApiUrl'    => AccountApiUrlType::class,
        'GitHubAccountAvatarUrl' => AccountAvatarUrlType::class,
        'GitHubAccountHtmlUrl'   => AccountHtmlUrlType::class,
        'GitHubAccountId'        => AccountIdType::class,
        'GitHubAccountLogin'     => AccountLoginType::class,
        'GitHubAccountType'      => AccountTypeType::class,

        // Builds
        'GitHubBuildStatus' => BuildStatusType::class,
        'GitHubBuildId'     => BuildIdType::class,

        // References
        'GitHubBranchName' => BranchNameType::class,
        'GitHubTagName'    => TagNameType::class,

        // Commit
        'GitHubCommitAuthorName'    => AuthorNameType::class,
        'GitHubCommitCommitterName' => CommitterNameType::class,
        'GitHubCommitDate'          => CommitDateType::class,
        'GitHubCommitMessage'       => CommitMessageType::class,
        'GitHubCommitSha'           => CommitShaType::class,
        'GitHubCommitAuthor'        => CommitAuthorType::class,
        'GitHubCommitCommitter'     => CommitCommitterType::class,
        'CommitApiUrl'              => CommitApiUrlType::class,
        'CommitAuthorDetails'       => CommitAuthorDetailsType::class,
        'CommitCommitterDetails'    => CommitCommitterDetailsType::class,
        'CommitHtmlUrl'             => CommitHtmlUrlType::class,
        'ParentApiUrl'              => ParentApiUrlType::class,
        'ParentHtmlUrl'             => ParentHtmlUrlType::class,
        'CommitParent'              => CommitParentType::class,
        'CommitTree'                => CommitTreeType::class,
        'CommitVerification'        => CommitVerificationType::class,
        'TreeApiUrl'                => TreeApiUrlType::class,
        'VerificationPayload'       => VerificationPayloadType::class,
        'VerificationReason'        => VerificationReasonType::class,
        'VerificationSignature'     => VerificationSignatureType::class,
        'VerificationVerified'      => VerificationVerifiedType::class,

        // External
        'ExternalService' => ExternalServiceType::class,

        // Installation
        'InstallationAccessTokenUrl'      => InstallationAccessTokenUrlType::class,
        'InstallationAccount'             => InstallationAccountType::class,
        'InstallationCreatedAt'           => InstallationCreatedAtType::class,
        'InstallationEvents'              => InstallationEventsType::class,
        'InstallationHtmlUrl'             => InstallationHtmlUrlType::class,
        'InstallationId'                  => InstallationIdType::class,
        'InstallationPermissions'         => InstallationPermissionsType::class,
        'InstallationRepositoriesUrl'     => InstallationRepositoriesUrlType::class,
        'InstallationRepositorySelection' => InstallationRepositorySelectionType::class,
        'InstallationUpdatedAt'           => InstallationUpdatedAtType::class,

        // Issue
        'IssueApiUrl'             => IssueApiUrlType::class,
        'IssueAssigneeCollection' => IssueAssigneeCollectionType::class,
        'IssueAssignee'           => IssueAssigneeType::class,
        'IssueAuthor'             => IssueAuthorType::class,
        'IssueBody'               => IssueBodyType::class,
        'IssueClosedAt'           => IssueClosedAtType::class,
        'IssueCreatedAt'          => IssueCreatedAtType::class,
        'IssueHtmlUrl'            => IssueHtmlUrlType::class,
        'IssueId'                 => IssueIdType::class,
        'IssueNumber'             => IssueNumberType::class,
        'IssueState'              => IssueStateType::class,
        'IssueTitle'              => IssueTitleType::class,
        'IssueUpdatedAt'          => IssueUpdatedAtType::class,

        // IssueComment
        'IssueCommentApiUrl'    => IssueCommentApiUrlType::class,
        'IssueCommentAuthor'    => IssueCommentAuthorType::class,
        'IssueCommentBody'      => IssueCommentBodyType::class,
        'IssueCommentCreatedAt' => IssueCommentCreatedAtType::class,
        'IssueCommentHtmlUrl'   => IssueCommentHtmlUrlType::class,
        'IssueCommentId'        => IssueCommentIdType::class,
        'IssueCommentUpdatedAt' => IssueCommentUpdatedAtType::class,

        // Label
        'LabelApiUrl' => LabelApiUrlType::class,
        'LabelColor'  => LabelColorType::class,
        'LabelId'     => LabelIdType::class,
        'LabelName'   => LabelNameType::class,

        // Milestone
        'MilestoneApiUrl'      => MilestoneApiUrlType::class,
        'MilestoneClosedAt'    => MilestoneClosedAtType::class,
        'MilestoneCreatedAt'   => MilestoneCreatedAtType::class,
        'MilestoneCreator'     => MilestoneCreatorType::class,
        'MilestoneDescription' => MilestoneDescriptionType::class,
        'MilestoneDueOn'       => MilestoneDueOnType::class,
        'MilestoneHtmlUrl'     => MilestoneHtmlUrlType::class,
        'MilestoneId'          => MilestoneIdType::class,
        'MilestoneNumber'      => MilestoneNumberType::class,
        'MilestoneState'       => MilestoneStateType::class,
        'MilestoneTitle'       => MilestoneTitleType::class,
        'MilestoneUpdatedAt'   => MilestoneUpdatedAtType::class,

        // PullRequest
        'GitHubPullRequestApiUrl'             => PullRequestApiUrlType::class,
        'GitHubPullRequestAssigneeCollection' => PullRequestAssigneeCollectionType::class,
        'GitHubPullRequestAssignee'           => PullRequestAssigneeType::class,
        'GitHubPullRequestAuthor'             => PullRequestAuthorType::class,
        'GitHubPullRequestBody'               => PullRequestBodyType::class,
        'GitHubPullRequestClosedAt'           => PullRequestClosedAtType::class,
        'GitHubPullRequestCreatedAt'          => PullRequestCreatedAtType::class,
        'GitHubPullRequestHtmlUrl'            => PullRequestHtmlUrlType::class,
        'GitHubPullRequestId'                 => PullRequestIdType::class,
        'GitHubPullRequestNumber'             => PullRequestNumberType::class,
        'GitHubPullRequestState'              => PullRequestStateType::class,
        'GitHubPullRequestTitle'              => PullRequestTitleType::class,
        'GitHubPullRequestUpdatedAt'          => PullRequestUpdatedAtType::class,
        'GitHubPullRequestRootId'             => PullRequestRootIdType::class,

        // Repo
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
        'RepoAccessPermissions' => RepoAccessPermissionsType::class,
        'RepoSshUrl'            => RepoSshUrlType::class,
        'RepoHomepage'          => RepoHomepageType::class,
        'RepoLanguage'          => RepoLanguageType::class,
        'RepoMirrorUrl'         => RepoMirrorUrlType::class,

        // Status
        'GitHubStatusState'   => StatusStateType::class,
        'GitHubStatusContext' => StatusContextType::class,
        'StatusCreator'       => StatusCreatorType::class,
        'StatusDescription'   => StatusDescriptionType::class,
        'StatusId'            => StatusIdType::class,
        'StatusTargetUrl'     => StatusTargetUrlType::class,

        // User
        'GitHubUserApiUrl'    => UserApiUrlType::class,
        'GitHubUserAvatarUrl' => UserAvatarUrlType::class,
        'GitHubUserHtmlUrl'   => UserHtmlUrlType::class,
        'GitHubUserId'        => UserIdType::class,
        'GitHubUserLogin'     => UserLoginType::class,

        // Generix
        'GravatarId'   => GravatarIdType::class,
        'EmailAddress' => EmailAddressType::class,

        // RepoOwner
        'GitHubRepoOwner'      => RepoOwnerType::class,
        'GitHubRepoParent'     => RepoParentType::class,
        'GitHubRepoEndpoints'  => RepoEndpointsType::class,
        'GitHubRepoTimestamps' => RepoTimestampsType::class,
        'GitHubRepoStats'      => RepoStatsType::class,

        // Reference
        'GitHubReferenceName' => ReferenceNameType::class,
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
