<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">

{{-- header section --}}
@include('mails.common.header')
{{-- end header section --}}

@yield('content')

{{-- footer section --}}
@include('mails.common.footer')
{{-- end footer section --}}