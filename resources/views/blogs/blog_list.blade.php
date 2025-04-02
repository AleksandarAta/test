<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @if ($blog && $blog->use_global == true)
    <meta name="keywords" content="{{ env(" G_KEYW", "keyword" ) . ', ' . $blog->keywords }}">
    @else
    <meta name="keywords" content="{{ $blog->keywords }}">
    @endif
    @if ($blog && $blog->use_global == true)
    <meta name="description" content="{{ env(" G_DESC", "Description" ) . ' ' . $blog->description }}">
    @else
    <meta name="description" content="{{ $blog->description }}">
    @endif
    <meta name="author" content="{{ $blog->author }}">
    <meta property="og:title" content="{{ $blog->title }}">
    <meta property="og:description" content="{{ $blog->description }}">
    <meta property="og:image" content="{{ $blog->image }}">
    <meta property="og:url" content="{{ url()->full() }}">
    <meta name="twitter:card" content="summary_large_image">
    <title>{{$blog->title}}</title>
</head>

<body>
    {{ $blog->body }}
</body>

</html>