@extends('mails.layout.main')

@section('content')

<?php  
$mailTitle ='Reset Password';
?>

<table id="u_content_text_3" style="font-family:'Montserrat',sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
  <tbody>
    <tr>
      <td class="v-container-padding-padding" style="overflow-wrap:break-word;word-break:break-word;padding:10px 60px 50px;font-family:'Montserrat',sans-serif;" align="left">
        
        <div style="color: #444444; line-height: 170%; text-align: justify; word-wrap: break-word;">
          <p style="font-size: 14px; line-height: 170%; text-align: left;">
            <span style="font-size: 16px; line-height: 27.2px;">Dear {{ $user->username }},</span>
          </p>

          <br/>

          <p style="font-size: 14px; line-height: 170%;">
            <span style="font-size: 16px; line-height: 27.2px;">
              You are receiving this email because we have received a verify email request for your account.
            </span>
          </p>

          <table id="u_content_button_1" style="font-family:'Montserrat',sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
            <tbody>
              <tr>
                <td class="v-container-padding-padding" style="overflow-wrap:break-word;word-break:break-word;padding:10px 10px 50px;font-family:'Montserrat',sans-serif;" align="left">
                  
                  <div align="center">
                    <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="border-spacing: 0; border-collapse: collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;font-family:'Montserrat',sans-serif;"><tr><td class="v-button-colors" style="font-family:'Montserrat',sans-serif;" align="center"><v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" href="https://unlayer.com/" style="height:47px; v-text-anchor:middle; width:164px;" arcsize="8.5%" stroke="f" fillcolor="#cca250"><w:anchorlock/><center style="color:#FFFFFF;font-family:'Montserrat',sans-serif;"><![endif]-->
                      <a href="{{ env('APP_URL') }}/user/verify/{{base64_encode($user->email)}}/{{base64_encode($user->verification_code)}}" target="_blank" class="v-button-colors" style="box-sizing: border-box;display: inline-block;font-family:'Montserrat',sans-serif;text-decoration: none;-webkit-text-size-adjust: none;text-align: center;color: #FFFFFF; background-color: #343a40; border-radius: 4px;-webkit-border-radius: 4px; -moz-border-radius: 4px; width:auto; max-width:100%; overflow-wrap: break-word; word-break: break-word; word-wrap:break-word; mso-border-alt: none;">
                        <span style="display:block;padding:14px 33px;line-height:120%;"><strong><span style="font-size: 16px; line-height: 19.2px;">Verify Email &rarr;</span></strong></span>
                      </a>
                    <!--[if mso]></center></v:roundrect></td></tr></table><![endif]-->
                  </div>
          
                </td>
              </tr>
            </tbody>
          </table>

          <p style="font-size: 14px; line-height: 170%;">
            <span style="font-size: 16px; line-height: 27.2px;">
              this links expires in 15 minutes. if you did not request a password reset, no further action is required.
            </span>
          </p>
          <hr>
          <p style="font-size: 14px; line-height: 170%;">
            <span style="font-size: 16px; line-height: 27.2px;">
              if your are having trouble clicking the "Verify Email" button, please copy and paste the link below into your web browser.
              <a href="{{ env('APP_URL') }}/user/verify/{{base64_encode($user->email)}}/{{base64_encode($user->verification_code)}}">{{ env('APP_URL') }}/user/verify/{{base64_encode($user->email)}}/{{base64_encode($user->verification_code)}}</a>
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