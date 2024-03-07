<?=
/* Using an echo tag here so the `<? ... ?>` won't get parsed as short tags */
'<?xml version="1.0" encoding="UTF-8"?>'.PHP_EOL
?>
<rss version="2.0">
    <channel>
        <title><![CDATA[{{ config('site.name') }}]]></title>
        <link><![CDATA[{{ config('app.url') }}]]></link>
        <description><![CDATA[{{ config('site.description') }}]]></description>
        <language>{{ config('app.locale') }}</language>
        <pubDate>{{ $posts->first()?->created_at->toRssString() }}</pubDate>

        @foreach($posts as $post)
            <item>
                <title><![CDATA[{{ $post->title }}]]></title>
                <link>{{ route('post.show', $post) }}</link>
                {{-- <description><![CDATA[{!! $post->title !!}]]></description> --}}
                <guid isPermaLink="false">{{ $post->id }}</guid>
                <pubDate>{{ $post->created_at->toRssString() }}</pubDate>
                <enclosure url="{{ route('cover', ['text' => $post->title]) }}" length="0" type="image/jpg" />
            </item>
        @endforeach
    </channel>
</rss>
