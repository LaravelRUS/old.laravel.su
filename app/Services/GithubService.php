<?php namespace App\Services;

use Github\Client as GithubClient;

class GithubService {
    /**
     * @var \Github\Client
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

    public function getLastCommitId($branch, $filename)
    {
        $response = $this->githubClient->api('repo')->commits()->all(
            $this->github_user, $this->github_repository, [
                'sha' => $branch,
                'path' => $filename
            ]
        );

        if (count($response)) return $response[0]['sha'];

        return null;
    }

    public function getLastCommit($branch, $filename)
    {
        $response = $this->githubClient->api('repo')->commits()->all(
            $this->github_user, $this->github_repository, [
                'sha' => $branch,
                'path' => $filename
            ]
        );

        if (count($response)) return $response[0];

        return null;
    }

    public function getCommit($commit_id)
    {
        $response = $this->githubClient->api('repo')->commits()->show(
            $this->github_user, $this->github_repository, $commit_id
        );

        if (count($response)) return $response;

        return null;
    }

    public function getCommits($branch, $filename, $since)
    {
        $since = date('c', strtotime($since));

        $response = $this->githubClient->api('repo')->commits()->all(
            $this->github_user, $this->github_repository, [
                'sha' => $branch,
                'path' => $filename,
                'since' => $since
            ]
        );

        return $response;
    }

    public function getFile($branch, $filename, $commit_id = '')
    {
        if ( ! $commit_id)
        {
            $commit_id = $this->getLastCommitId($branch, $filename);

            if ( ! $commit_id) return null;
        }

        $content = file_get_contents('https://raw.githubusercontent.com/'
            . $this->github_user . '/'
            . $this->github_repository
            . "/$commit_id/$filename"
        );

        return $content;
    }

}

