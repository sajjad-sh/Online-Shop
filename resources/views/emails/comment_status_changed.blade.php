@component('mail::message')
# Introduction

@if($comment->is_verify == 2)
  کامنت شما تعلیق شد
  علت لغو: {{ $comment->cancel_reason }}
@else
  کاربر گرامی کامنت شما (#{{ $comment->id }}) تائید شد
@endif


@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
