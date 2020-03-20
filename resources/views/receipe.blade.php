@component('mail::message')
# Introduction

The receipe has been stored.

{{$receipe->name}}

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
