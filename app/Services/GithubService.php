<?php

/**
 * This file is part of laravel.su package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace App\Services;

use Github\Client as GithubClient;

/**
 * TODO Это надо переписать всё на:%*(:%№уй"!!1111
 */
class GithubService
{
    /**
     * @var GithubClient
     */
    private $githubClient;

    private $github_user;

    private $github_repository;

    public function __construct($github_user, $github_repository)
    {
        $this->githubClient = new GithubClient;
        $this->githubClient->authenticate(
            config("laravelsu.github_client_id"),
            config("laravelsu.github_client_secret"),
            GithubClient::AUTH_URL_CLIENT_ID
        );

        $this->github_user = $github_user;
        $this->github_repository = $github_repository;
    }

    public function getLastCommit($branch, $filename)
    {
        $response = $this->githubClient->api('repo')->commits()->all(
            $this->github_user, $this->github_repository, [
                'sha'  => $branch,
                'path' => $filename,
            ]
        );

        if (count($response)) {
            return $response[0];
        }

        return null;
    }

    public function getCommit($commit_id)
    {
        $response = $this->githubClient->api('repo')->commits()->show(
            $this->github_user, $this->github_repository, $commit_id
        );

        if (count($response)) {
            return $response;
        }

        return null;
    }

    public function getCommits($branch, $filename, $since)
    {
        $since = date('c', strtotime((string)$since));

        $response = $this->githubClient->api('repo')->commits()->all(
            $this->github_user, $this->github_repository, [
                'sha'   => $branch,
                'path'  => $filename,
                'since' => $since,
            ]
        );

        return $response;
    }

    public function getFile($branch, $filename, $commit_id = '')
    {
        if (! $commit_id) {
            $commit_id = $this->getLastCommitId($branch, $filename);

            if (! $commit_id) {
                return null;
            }
        }

        $content = file_get_contents('https://raw.githubusercontent.com/'
            . $this->github_user . '/'
            . $this->github_repository
            . "/$commit_id/$filename"
        );

        return $content;
    }

    public function getLastCommitId($branch, $filename)
    {
        $response = $this->githubClient->api('repo')->commits()->all(
            $this->github_user, $this->github_repository, [
                'sha'  => $branch,
                'path' => $filename,
            ]
        );

        if (count($response)) {
            return $response[0]['sha'];
        }

        return null;
    }

}

