<x-mail::message>

You have contact request

**Name:**  {{ $name }}

**Email:** {{ $email }}

**Body:**  {{ $body }}


<x-mail::button :url="config('app.url')"  color="success">
Go To Main Page
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
