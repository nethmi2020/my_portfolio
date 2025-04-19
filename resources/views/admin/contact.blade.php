<!DOCTYPE html>
<html>
<head>
    <title>Demo Email</title>
</head>
<body>
    <p>Hello Nethmi,</p>

    <p><strong>{{ $data['name'] }}</strong> has sent you a message through your portfolio's contact form.</p>

    <p><strong>Email:</strong> {{ $data['email'] }}</p>

    @if(!empty($subject))
        <p><strong>Subject:</strong> {{ $data['subject'] }}</p>
    @endif

   
        <p><strong>Message:</strong> {{ $data['content'] }}</p>


   
    <p>Thank you</p>
</body>
</html>
