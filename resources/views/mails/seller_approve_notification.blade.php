@extends('mails.layout.main')

@section('content')

<?php  
$mailTitle ='Approval Notification';
?>

<table id="u_content_text_3" style="font-family:'Montserrat',sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
  <tbody>
    <tr>
      <td class="v-container-padding-padding" style="overflow-wrap:break-word;word-break:break-word;padding:10px 60px 50px;font-family:'Montserrat',sans-serif;" align="left">
        
        <div style="color: #444444; line-height: 170%; text-align: justify; word-wrap: break-word;">
          <p style="font-size: 14px; line-height: 170%; text-align: left;">
            <span style="font-size: 16px; line-height: 27.2px;">Dear {{ $seller_username }},</span>
          </p>

          <br/>

          <p style="font-size: 14px; line-height: 170%;">
            <span style="font-size: 16px; line-height: 27.2px;">
              You have approved your payment from {{ $buyer_username }} based on agreed terms on Trade (Trade No. {{$merging_id}}) you placed on the marketplace.  Your wallet has be deducted with equivalent amount as agreed. Please ensure to drop a review of the other party to help other sellers with transacting with the buyer, to do so, login to your dashboard, go to trades, locate the trade under ongoing trade, cick on it, locate the review section.
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
                    <h1 style="color:#e7af03">UPDATE!</h1>
                    <h2 style="color:#e7af03">Approval Notification</h2>

                  </td>
                </tr>
              </table>
            </center>
          </div>
          <!--[if gte mso 9]>
            </v:textbox>
          </v:rect>
          <![endif]-->
        </td>
      </tr>
      <tr>
        <td valign="top">
          <center>
            <table cellspacing="0" cellpadding="0" width="500" class="w320">
              <tr>
                <td>

                  <table cellspacing="0" cellpadding="0" width="100%">
                    <tr>
                      <td class="mobile-padding" style="text-align:left;">
                      <br>
                      <br>
                        Hi {{ $seller_username }},<br><br>

                        You have approved your payment from {{ $buyer_username }} based on agreed terms on ADS (Order No. {{$merging_id}}) you placed on the marketplace

                        <br><br>

                            Your wallet has be deducted with equivalent amount as agreed.
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
