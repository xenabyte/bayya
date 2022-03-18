@extends('mails.layout.main')

@section('content')

<?php  
$mailTitle ='Support Notification';
?>

<table id="u_content_text_3" style="font-family:'Montserrat',sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
  <tbody>
    <tr>
      <td class="v-container-padding-padding" style="overflow-wrap:break-word;word-break:break-word;padding:10px 60px 50px;font-family:'Montserrat',sans-serif;" align="left">
        
        <div style="color: #444444; line-height: 170%; text-align: justify; word-wrap: break-word;">
          <p style="font-size: 14px; line-height: 170%; text-align: left;">
            <span style="font-size: 16px; line-height: 27.2px;">Dear Admin,</span>
          </p>

          <br/>

          <p style="font-size: 14px; line-height: 170%;">
            <span style="font-size: 16px; line-height: 27.2px;">
              {{ $name }} is encountering a problem with the app. <br/>

              <?php echo $body ?>

              <h2>User Details</h2>
              Email: {{ $email }} <br/>

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


                      <br>
                        Hi Admin,<br><br>
                        <p style="margin: 0;">
                            
                          {{ $name }} is encountering a problem with the app. <br/>

                          {{ $body }}

                          <h2>User Details</h2>
                          Name: {{ $user->username }} <br/>
                          Email: {{ $user->email }} <br/>
                             
                            Kindly ignore if the message is not for you.
                        </p>


                        <br>

                        <br>
                        Thanks for being a customer!<br>
                       {{env('APP_NAME')}}
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>
              <tr>
                <td class="mobile-padding">
                <br>
                <br>

                  <br>&nbsp;
                  <br>
                </td>
              </tr>
            </table>
          </center>
        </td>
      </tr>
      <tr>
        <td style="background-color:#001833;">
          <center>
            <table cellspacing="0" cellpadding="0" width="500" class="w320">
              <tr>
                <td>
                  <center>
                    <table style="margin:0 auto;" cellspacing="0" cellpadding="5" width="100%">
                      <tr>
                        <td style="text-align:center; margin:0 auto;" width="100%">
                           <a href="#" style="text-align:center;">
                             <img style="margin:0 auto;" width="20%" src="{{ env('APP_LOGO') }}" alt="logo link" /><h2><strong>{{ env('APP_NAME') }}</strong></h2>
                           </a>
                        </td>
                      </tr>
                    </table>
                  </center>
                </td>
              </tr>
            </table>
          </center>
        </td>
      </tr>
    </table>
    </td>
  </tr>
</table>
</body>
</html>
