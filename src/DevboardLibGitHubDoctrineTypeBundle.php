<?php

declare(strict_types=1);

namespace DevboardLib\GitHubDoctrineTypeBundle;

use DevboardLib\GitHubDoctrineType\Account\AccountAvatarUrlType;
use DevboardLib\GitHubDoctrineType\Account\AccountIdType;
use DevboardLib\GitHubDoctrineType\Account\AccountLoginType;
use DevboardLib\GitHubDoctrineType\Account\AccountTypeType;
use DevboardLib\GitHubDoctrineType\Application\ApplicationIdType;
use DevboardLib\GitHubDoctrineType\Branch\BranchNameType;
use DevboardLib\GitHubDoctrineType\Build\BuildIdType;
use DevboardLib\GitHubDoctrineType\Build\BuildStatusType;
use DevboardLib\GitHubDoctrineType\Commit\AuthorNameType;
use DevboardLib\GitHubDoctrineType\Commit\CommitAuthorDetailsType;
use DevboardLib\GitHubDoctrineType\Commit\CommitAuthorType;
use DevboardLib\GitHubDoctrineType\Commit\CommitCommitterDetailsType;
use DevboardLib\GitHubDoctrineType\Commit\CommitCommitterType;
use DevboardLib\GitHubDoctrineType\Commit\CommitDateType;
use DevboardLib\GitHubDoctrineType\Commit\CommitMessageType;
use DevboardLib\GitHubDoctrineType\Commit\CommitParentType;
use DevboardLib\GitHubDoctrineType\Commit\CommitShaType;
use DevboardLib\GitHubDoctrineType\Commit\CommitterNameType;
use DevboardLib\GitHubDoctrineType\Commit\CommitTreeType;
use DevboardLib\GitHubDoctrineType\Commit\CommitVerificationType;
use DevboardLib\GitHubDoctrineType\Commit\Verification\VerificationPayloadType;
use DevboardLib\GitHubDoctrineType\Commit\Verification\VerificationReasonType;
use DevboardLib\GitHubDoctrineType\Commit\Verification\VerificationSignatureType;
use DevboardLib\GitHubDoctrineType\Commit\Verification\VerificationVerifiedType;
use DevboardLib\GitHubDoctrineType\External\ExternalServiceType;
use DevboardLib\GitHubDoctrineType\Generix\EmailAddressType;
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
use DevboardLib\GitHubDoctrineType\Issue\IssueAssigneeCollectionType;
use DevboardLib\GitHubDoctrineType\Issue\IssueAssigneeType;
use DevboardLib\GitHubDoctrineType\Issue\IssueAuthorType;
use DevboardLib\GitHubDoctrineType\Issue\IssueBodyType;
use DevboardLib\GitHubDoctrineType\Issue\IssueClosedAtType;
use DevboardLib\GitHubDoctrineType\Issue\IssueCreatedAtType;
use DevboardLib\GitHubDoctrineType\Issue\IssueIdType;
use DevboardLib\GitHubDoctrineType\Issue\IssueNumberType;
use DevboardLib\GitHubDoctrineType\Issue\IssueStateType;
use DevboardLib\GitHubDoctrineType\Issue\IssueTitleType;
use DevboardLib\GitHubDoctrineType\Issue\IssueUpdatedAtType;
use DevboardLib\GitHubDoctrineType\IssueComment\IssueCommentAuthorType;
use DevboardLib\GitHubDoctrineType\IssueComment\IssueCommentBodyType;
use DevboardLib\GitHubDoctrineType\IssueComment\IssueCommentCreatedAtType;
use DevboardLib\GitHubDoctrineType\IssueComment\IssueCommentIdType;
use DevboardLib\GitHubDoctrineType\IssueComment\IssueCommentUpdatedAtType;
use DevboardLib\GitHubDoctrineType\Label\LabelColorType;
use DevboardLib\GitHubDoctrineType\Label\LabelIdType;
use DevboardLib\GitHubDoctrineType\Label\LabelNameType;
use DevboardLib\GitHubDoctrineType\Milestone\MilestoneClosedAtType;
use DevboardLib\GitHubDoctrineType\Milestone\MilestoneCreatedAtType;
use DevboardLib\GitHubDoctrineType\Milestone\MilestoneCreatorType;
use DevboardLib\GitHubDoctrineType\Milestone\MilestoneDescriptionType;
use DevboardLib\GitHubDoctrineType\Milestone\MilestoneDueOnType;
use DevboardLib\GitHubDoctrineType\Milestone\MilestoneIdType;
use DevboardLib\GitHubDoctrineType\Milestone\MilestoneNumberType;
use DevboardLib\GitHubDoctrineType\Milestone\MilestoneStateType;
use DevboardLib\GitHubDoctrineType\Milestone\MilestoneTitleType;
use DevboardLib\GitHubDoctrineType\Milestone\MilestoneUpdatedAtType;
use DevboardLib\GitHubDoctrineType\PullRequest\PullRequestAssigneeCollectionType;
use DevboardLib\GitHubDoctrineType\PullRequest\PullRequestAssigneeType;
use DevboardLib\GitHubDoctrineType\PullRequest\PullRequestAuthorType;
use DevboardLib\GitHubDoctrineType\PullRequest\PullRequestBodyType;
use DevboardLib\GitHubDoctrineType\PullRequest\PullRequestClosedAtType;
use DevboardLib\GitHubDoctrineType\PullRequest\PullRequestCreatedAtType;
use DevboardLib\GitHubDoctrineType\PullRequest\PullRequestIdType;
use DevboardLib\GitHubDoctrineType\PullRequest\PullRequestNumberType;
use DevboardLib\GitHubDoctrineType\PullRequest\PullRequestRootIdType;
use DevboardLib\GitHubDoctrineType\PullRequest\PullRequestStateType;
use DevboardLib\GitHubDoctrineType\PullRequest\PullRequestTitleType;
use DevboardLib\GitHubDoctrineType\PullRequest\PullRequestUpdatedAtType;
use DevboardLib\GitHubDoctrineType\PullRequestReview\PullRequestReviewBodyType;
use DevboardLib\GitHubDoctrineType\PullRequestReview\PullRequestReviewIdType;
use DevboardLib\GitHubDoctrineType\PullRequestReview\PullRequestReviewStateType;
use DevboardLib\GitHubDoctrineType\PullRequestReview\PullRequestReviewSubmittedAtType;
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
use DevboardLib\GitHubDoctrineType\Status\StatusStateType;
use DevboardLib\GitHubDoctrineType\StatusCheck\StatusCheckContextType;
use DevboardLib\GitHubDoctrineType\StatusCheck\StatusCheckCreatorType;
use DevboardLib\GitHubDoctrineType\StatusCheck\StatusCheckDescriptionType;
use DevboardLib\GitHubDoctrineType\StatusCheck\StatusCheckIdType;
use DevboardLib\GitHubDoctrineType\StatusCheck\StatusCheckStateType;
use DevboardLib\GitHubDoctrineType\StatusCheck\StatusCheckTargetUrlType;
use DevboardLib\GitHubDoctrineType\Tag\TagNameType;
use DevboardLib\GitHubDoctrineType\User\UserAvatarUrlType;
use DevboardLib\GitHubDoctrineType\User\UserIdType;
use DevboardLib\GitHubDoctrineType\User\UserLoginType;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\Type;
use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class DevboardLibGitHubDoctrineTypeBundle extends Bundle
{
    /** @var array */
    private $types = [
        // Application
        'ApplicationId' => ApplicationIdType::class,

        'GitHubAccountAvatarUrl' => AccountAvatarUrlType::class,
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
        'GitHubCommitAuthorName'          => AuthorNameType::class,
        'GitHubCommitCommitterName'       => CommitterNameType::class,
        'GitHubCommitDate'                => CommitDateType::class,
        'GitHubCommitMessage'             => CommitMessageType::class,
        'GitHubCommitSha'                 => CommitShaType::class,
        'GitHubCommitAuthor'              => CommitAuthorType::class,
        'GitHubCommitCommitter'           => CommitCommitterType::class,
        'CommitAuthorDetails'             => CommitAuthorDetailsType::class,
        'CommitCommitterDetails'          => CommitCommitterDetailsType::class,
        'GitHubCommitParent'              => CommitParentType::class,
        'GitHubCommitTree'                => CommitTreeType::class,
        'GitHubCommitVerification'        => CommitVerificationType::class,
        'VerificationPayload'             => VerificationPayloadType::class,
        'VerificationReason'              => VerificationReasonType::class,
        'VerificationSignature'           => VerificationSignatureType::class,
        'VerificationVerified'            => VerificationVerifiedType::class,

        // External
        'ExternalService' => ExternalServiceType::class,

        // Installation
        'GitHubInstallationAccessTokenUrl'      => InstallationAccessTokenUrlType::class,
        'GitHubInstallationAccount'             => InstallationAccountType::class,
        'GitHubInstallationCreatedAt'           => InstallationCreatedAtType::class,
        'GitHubInstallationEvents'              => InstallationEventsType::class,
        'GitHubInstallationHtmlUrl'             => InstallationHtmlUrlType::class,
        'GitHubInstallationId'                  => InstallationIdType::class,
        'GitHubInstallationPermissions'         => InstallationPermissionsType::class,
        'GitHubInstallationRepositoriesUrl'     => InstallationRepositoriesUrlType::class,
        'GitHubInstallationRepositorySelection' => InstallationRepositorySelectionType::class,
        'GitHubInstallationUpdatedAt'           => InstallationUpdatedAtType::class,

        // Issue
        'GitHubIssueAssigneeCollection' => IssueAssigneeCollectionType::class,
        'GitHubIssueAssignee'           => IssueAssigneeType::class,
        'GitHubIssueAuthor'             => IssueAuthorType::class,
        'GitHubIssueBody'               => IssueBodyType::class,
        'GitHubIssueClosedAt'           => IssueClosedAtType::class,
        'GitHubIssueCreatedAt'          => IssueCreatedAtType::class,
        'GitHubIssueId'                 => IssueIdType::class,
        'GitHubIssueNumber'             => IssueNumberType::class,
        'GitHubIssueState'              => IssueStateType::class,
        'GitHubIssueTitle'              => IssueTitleType::class,
        'GitHubIssueUpdatedAt'          => IssueUpdatedAtType::class,

        // IssueComment
        'GitHubIssueCommentAuthor'    => IssueCommentAuthorType::class,
        'GitHubIssueCommentBody'      => IssueCommentBodyType::class,
        'GitHubIssueCommentCreatedAt' => IssueCommentCreatedAtType::class,
        'GitHubIssueCommentId'        => IssueCommentIdType::class,
        'GitHubIssueCommentUpdatedAt' => IssueCommentUpdatedAtType::class,

        // Label
        'GitHubLabelColor'  => LabelColorType::class,
        'GitHubLabelId'     => LabelIdType::class,
        'GitHubLabelName'   => LabelNameType::class,

        // Milestone
        'GitHubMilestoneClosedAt'    => MilestoneClosedAtType::class,
        'GitHubMilestoneCreatedAt'   => MilestoneCreatedAtType::class,
        'GitHubMilestoneCreator'     => MilestoneCreatorType::class,
        'GitHubMilestoneDescription' => MilestoneDescriptionType::class,
        'GitHubMilestoneDueOn'       => MilestoneDueOnType::class,
        'GitHubMilestoneId'          => MilestoneIdType::class,
        'GitHubMilestoneNumber'      => MilestoneNumberType::class,
        'GitHubMilestoneState'       => MilestoneStateType::class,
        'GitHubMilestoneTitle'       => MilestoneTitleType::class,
        'GitHubMilestoneUpdatedAt'   => MilestoneUpdatedAtType::class,

        // PullRequest
        'GitHubPullRequestAssigneeCollection' => PullRequestAssigneeCollectionType::class,
        'GitHubPullRequestAssignee'           => PullRequestAssigneeType::class,
        'GitHubPullRequestAuthor'             => PullRequestAuthorType::class,
        'GitHubPullRequestBody'               => PullRequestBodyType::class,
        'GitHubPullRequestClosedAt'           => PullRequestClosedAtType::class,
        'GitHubPullRequestCreatedAt'          => PullRequestCreatedAtType::class,
        'GitHubPullRequestId'                 => PullRequestIdType::class,
        'GitHubPullRequestNumber'             => PullRequestNumberType::class,
        'GitHubPullRequestState'              => PullRequestStateType::class,
        'GitHubPullRequestTitle'              => PullRequestTitleType::class,
        'GitHubPullRequestUpdatedAt'          => PullRequestUpdatedAtType::class,
        'GitHubPullRequestRootId'             => PullRequestRootIdType::class,

        // PullRequestReview
        'GitHubPullRequestReviewBody'           => PullRequestReviewBodyType::class,
        'GitHubPullRequestReviewId'             => PullRequestReviewIdType::class,
        'GitHubPullRequestReviewState'          => PullRequestReviewStateType::class,
        'GitHubPullRequestReviewSubmittedAt'    => PullRequestReviewSubmittedAtType::class,

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
        'GitHubStatusState'       => StatusStateType::class,

        // StatusCheck
        'GitHubStatusCheckState'       => StatusCheckStateType::class,
        'GitHubStatusCheckContext'     => StatusCheckContextType::class,
        'GitHubStatusCheckCreator'     => StatusCheckCreatorType::class,
        'GitHubStatusCheckDescription' => StatusCheckDescriptionType::class,
        'GitHubStatusCheckId'          => StatusCheckIdType::class,
        'GitHubStatusCheckTargetUrl'   => StatusCheckTargetUrlType::class,

        // User
        'GitHubUserAvatarUrl' => UserAvatarUrlType::class,
        'GitHubUserId'        => UserIdType::class,
        'GitHubUserLogin'     => UserLoginType::class,

        // Generix
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

    public function boot(): void
    {
        foreach (array_keys($this->types) as $name) {
            $this->getDatabasePlatform()->registerDoctrineTypeMapping($name, $name);
        }
    }

    private function getDatabasePlatform(): AbstractPlatform
    {
        return $this->container
            ->get('doctrine.orm.entity_manager')
            ->getConnection()
            ->getDatabasePlatform();
    }
}
