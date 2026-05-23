<h2>New Contact Message</h2>

<p><strong>From:</strong> {{ $contact['firstname'] }} {{ $contact['lastname'] }}</p>
<p><strong>Email:</strong> {{ $contact['email'] }}</p>
<p><strong>Subject:</strong> {{ $contact['subject'] ?? 'No subject' }}</p>

<h3>Message:</h3>
<p>{{ $contact['message'] }}</p>