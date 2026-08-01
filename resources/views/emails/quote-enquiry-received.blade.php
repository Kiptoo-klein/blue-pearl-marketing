<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>New Website Enquiry</title>
</head>
<body>
    <h1>New website enquiry</h1>

    <p><strong>Name:</strong> {{ $quoteRequest->name }}</p>

    @if ($quoteRequest->phone)
        <p><strong>Phone:</strong> {{ $quoteRequest->phone }}</p>
    @endif

    @if ($quoteRequest->email)
        <p><strong>Email:</strong> {{ $quoteRequest->email }}</p>
    @endif

    <p>
        <strong>Service:</strong>
        {{ ucwords(str_replace('-', ' ', $quoteRequest->service)) }}
    </p>

    <p><strong>Message:</strong></p>
    <p>{!! nl2br(e($quoteRequest->message)) !!}</p>
</body>
</html>
