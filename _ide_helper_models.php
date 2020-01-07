<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Model{
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
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Article newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Article newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Article onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Article query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Article whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Article whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Article whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Article whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Article wherePublishedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Article whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Article whereSourceArticleAuthor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Article whereSourceArticleUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Article whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Article whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Article whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Article withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Article withoutTrashed()
 */
	final class Article extends \Eloquent {}
}

namespace App\Model{
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
 * @property-read \App\Model\FrameworkVersion $version
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Documentation byVersion(\App\Model\FrameworkVersion $version)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Documentation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Documentation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Documentation orderByLastCommit()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Documentation page($pageTitle)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Documentation query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Documentation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Documentation whereCurrentOriginalCommit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Documentation whereCurrentOriginalCommitAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Documentation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Documentation whereLastCommit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Documentation whereLastCommitAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Documentation whereLastOriginalCommit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Documentation whereLastOriginalCommitAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Documentation whereOriginalCommitsAhead($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Documentation wherePage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Documentation whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Documentation whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Documentation whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Documentation whereVersionId($value)
 */
	final class Documentation extends \Eloquent {}
}

namespace App\Model{
/**
 * Class FrameworkVersion
 *
 * @property int $id
 * @property string $title
 * @property string $menu_page
 * @property int $is_documented
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $default_page
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\Documentation[] $documentation
 * @property-read int|null $documentation_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\FrameworkVersion actual()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\FrameworkVersion documented()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\FrameworkVersion newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\FrameworkVersion newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\FrameworkVersion query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\FrameworkVersion version($version)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\FrameworkVersion whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\FrameworkVersion whereDefaultPage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\FrameworkVersion whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\FrameworkVersion whereIsDocumented($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\FrameworkVersion whereMenuPage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\FrameworkVersion whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\FrameworkVersion whereUpdatedAt($value)
 */
	final class FrameworkVersion extends \Eloquent {}
}

namespace App\Model{
/**
 * Class Settings
 *
 * @property int $id
 * @property string $key
 * @property string $value
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Settings newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Settings newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Settings query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Settings whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Settings whereKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Settings whereValue($value)
 */
	final class Settings extends \Eloquent {}
}

namespace App\Model{
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
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\User query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\User whereUpdatedAt($value)
 */
	final class User extends \Eloquent {}
}

