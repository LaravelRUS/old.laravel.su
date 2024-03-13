<?php

declare(strict_types=1);

namespace App\Notifications\Channels;

use App\Models\Enums\NotificationTypeEnum;
use Carbon\Carbon;
use Illuminate\Notifications\Messages\DatabaseMessage;
use Illuminate\Support\Traits\Conditionable;

class SiteMessage extends DatabaseMessage
{
    use Conditionable;

    /**
     * @param array $data
     */
    public function __construct(array $data = [])
    {
        parent::__construct($data);

        $this->data['time'] ??= Carbon::now();
        $this->data['type'] ??= NotificationTypeEnum::Default;
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
    public function action(string $action, ?string $text = null): self
    {
        $this->data['action'] = $action;
        is_null($text) ?: $this->data['action_text'] = $text;

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

    public function img(string $src): self
    {
        $this->data['img'] = $src;

        return $this;
    }

    public function setCommentAuthor(string $author): self
    {
        $this->data['type'] = NotificationTypeEnum::ReplyComment;
        $this->data['author'] = $author;

        return $this;
    }
}
