<x-mail::message>
# Website Contact Form Submission

A new contact message has been submitted through the Wabag District Development Authority website.

**Sender Name:** {{ $data['name'] ?? 'N/A' }}

**Sender Email:** {{ $data['email'] ?? 'N/A' }}

**Subject:** {{ $data['subject'] ?? 'N/A' }}

**Message Details:**  
{{ $data['message'] ?? 'No message provided.' }}

Regards,<br>
{{ config('app.name') }}
</x-mail::message>