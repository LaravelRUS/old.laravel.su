<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App{
/**
 * Class Article
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string $text
 * @property string $slug
 * @property string|null $source_article_author
 * @property string|null $source_article_url
 * @property \Illuminate\Support\Carbon|null $published_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Article newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Article newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Article onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Article query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Article whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Article whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Article whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Article whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Article wherePublishedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Article whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Article whereSourceArticleAuthor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Article whereSourceArticleUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Article whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Article whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Article whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Article withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Article withoutTrashed()
 */
	class Article extends \Eloquent {}
}

namespace App{
/**
 * Class Documentation
 *
 * @property int $id
 * @property int $version_id
 * @property string $page
 * @property string|null $title
 * @property string|null $text
 * @property string|null $last_commit
 * @property string|null $last_original_commit
 * @property string|null $current_original_commit
 * @property \Illuminate\Support\Carbon|null $last_commit_at
 * @property \Illuminate\Support\Carbon|null $last_original_commit_at
 * @property \Illuminate\Support\Carbon|null $current_original_commit_at
 * @property int|null $original_commits_ahead
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\FrameworkVersion $version
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Documentation byVersion($version)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Documentation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Documentation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Documentation orderByLastCommit()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Documentation page($pageTitle)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Documentation query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Documentation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Documentation whereCurrentOriginalCommit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Documentation whereCurrentOriginalCommitAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Documentation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Documentation whereLastCommit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Documentation whereLastCommitAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Documentation whereLastOriginalCommit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Documentation whereLastOriginalCommitAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Documentation whereOriginalCommitsAhead($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Documentation wherePage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Documentation whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Documentation whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Documentation whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Documentation whereVersionId($value)
 */
	class Documentation extends \Eloquent {}
}

namespace App{
/**
 * Class FrameworkVersion
 *
 * @property int $id
 * @property string $title
 * @property int $is_documented
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Documentation[] $documentation
 * @property-read int|null $documentation_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FrameworkVersion newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FrameworkVersion newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FrameworkVersion query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FrameworkVersion version($version)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FrameworkVersion whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FrameworkVersion whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FrameworkVersion whereIsDocumented($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FrameworkVersion whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FrameworkVersion whereUpdatedAt($value)
 */
	class FrameworkVersion extends \Eloquent {}
}

namespace App{
/**
 * Class Settings
 *
 * @property int $id
 * @property string $key
 * @property string $value
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Settings newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Settings newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Settings query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Settings whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Settings whereKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Settings whereValue($value)
 */
	class Settings extends \Eloquent {}
}

namespace App{
/**
 * Class User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

