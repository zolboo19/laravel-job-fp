@component('mail::message')
# Танилцуулга

Сайн байна уу?, {{ $data['friend_email'] }}, {{ $data['your_name'] }}({{ $data['your_email'] }})-тэй хэрэглэгч таньд энэхүү ажлын байрыг санал болгож байна. Та доорх линкэн дээр дарж ажлын байрны дэлгэрэнгүй мэдээлэлтэй танилцана уу?

@component('mail::button', ['url' => $data['jobUrl']])
Ажлын байрлуу холбогдох линк
@endcomponent

Баярлалаа,<br>
{{ config('app.name') }}
@endcomponent
