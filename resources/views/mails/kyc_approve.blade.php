@extends('mails.layout.main')

@section('content')

<?php  
$mailTitle ='KYC Notification';
?>

<table id="u_content_text_3" style="font-family:'Montserrat',sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
  <tbody>
    <tr>
      <td class="v-container-padding-padding" style="overflow-wrap:break-word;word-break:break-word;padding:10px 60px 50px;font-family:'Montserrat',sans-serif;" align="left">
        
        <div style="color: #444444; line-height: 170%; text-align: justify; word-wrap: break-word;">
          <p style="font-size: 14px; line-height: 170%; text-align: left;">
            <span style="font-size: 16px; line-height: 27.2px;">Dear {{ $username }},</span>
          </p>

          <br/>

          <p style="font-size: 14px; line-height: 170%;">
            <span style="font-size: 16px; line-height: 27.2px;">
              Your KYC document have been approved, hence your account is fully activated. We holds the right to resist you from transacting in the advent of suspicious activities or you uploaded invalid documents. Happy Trading
            </span>
          </p>

          <br/>
          <p style="font-size: 14px; line-height: 170%; text-align: left;">
            <span style="font-size: 16px; line-height: 27.2px;">Thank You <br/>{{env('APP_NAME')}}</span>
          </p>

        </div>

      </td>
    </tr>
  </tbody>
</table>

  <!--[if (!mso)&(!IE)]><!--></div><!--<![endif]-->
  </div>
</div>
<!--[if (mso)|(IE)]></td><![endif]-->
      <!--[if (mso)|(IE)]></tr></table></td></tr></table><![endif]-->
    </div>
  </div>
</div>

@endsection