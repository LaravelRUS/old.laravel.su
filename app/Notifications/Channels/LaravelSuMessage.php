<?php

declare(strict_types=1);

namespace App\Notifications\Channels;

use Carbon\Carbon;
use Illuminate\Notifications\Messages\DatabaseMessage;

class LaravelSuMessage extends DatabaseMessage
{
    /**
     * @param array $data
     */
    public function __construct(array $data = [])
    {
        parent::__construct($data);

        $this->data['time'] ??= Carbon::now();
    }

    /**
     * @param string $title
     *
     * @return $this
     */
    public function title(string $title): self
    {
        $this->data['title'] = $title;

        return $this;
    }

    /**
     * @param string $title
     *
     * @return $this
     */
    public function message(string $title): self
    {
        $this->data['message'] = $title;

        return $this;
    }

    /**
     * @param string $action
     *
     * @return $this
     */
    public function action(string $action): self
    {
        $this->data['action'] = $action;

        return $this;
    }

    /**
     * @param string $timeZone
     *
     * @return $this
     */
    public function timeZone(string $timeZone): self
    {
        $this->data['time'] = Carbon::now($timeZone);

        return $this;
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setDownloadAttribute(string $value = ''): self
    {
        $this->data['downloadAttribute'] = true;
        $this->data['downloadAttributeValue'] = $value;

        return $this;
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setUseClipboard(string $value): self
    {
        $this->data['useClipboard'] = true;
        $this->data['clipboardData'] = $value;

        return $this;
    }
}
