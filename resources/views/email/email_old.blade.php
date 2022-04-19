<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:v="urn:schemas-microsoft-com:vml" lang="en">

<head>
    <link rel="stylesheet" type="text/css" hs-webfonts="true" href="https://fonts.googleapis.com/css?family=Lato|Lato:i,b,bi">
    <title>Email template</title>
    <meta property="og:title" content="Email template">

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style type="text/css">

        a{
            text-decoration: underline;
            color: inherit;
            font-weight: bold;
            color: #253342;
        }

        h1 {
            font-size: 56px;
        }

        h2{
            font-size: 28px;
            font-weight: 900;
        }

        p {
            font-weight: 100;
        }

        td {
            vertical-align: top;
        }

        #email {
            margin: auto;
            width: 600px;
            background-color: white;
        }

        button{
            font: inherit;
            background-color: #FF7A59;
            border: none;
            padding: 10px;
            text-transform: uppercase;
            letter-spacing: 2px;
            font-weight: 900;
            color: white;
            border-radius: 5px;
            box-shadow: 3px 3px #d94c53;
        }

        .subtle-link {
            font-size: 9px;
            text-transform:uppercase;
            letter-spacing: 1px;
            color: #CBD6E2;
        }

    </style>

</head>

<body bgcolor="#F5F8FA" style="width: 100%; margin: auto 0; padding:0; font-family:Lato, sans-serif; font-size:18px; color:#33475B; word-break:break-word">

<! View in Browser Link -->

<div id="email">
    <table align="right" role="presentation">
        <tr>
            <td>
                <a class="subtle-link" href="#">View in Browser</a>
            </td>
        <tr>
    </table>


    <! Banner -->
    <table role="presentation" width="100%">
        <tr>

            <td bgcolor="#00A4BD" align="center" style="color: white;">

                <img alt="Flower" src="https://hs-8886753.f.hubspotemail.net/hs/hsstatic/TemplateAssets/static-1.60/img/hs_default_template_images/email_dnd_template_images/ThankYou-Flower.png" width="400px" align="middle">

                <h1> Welcome! </h1>

            </td>
    </table>




    <! First Row -->

    <table role="presentation" border="0" cellpadding="0" cellspacing="10px" style="padding: 30px 30px 30px 60px;">
        <tr>
            @if($card->status == 'accepted')
                <td>
                    <h2>dear &nbsp; {{ $user->name }}</h2>
                    <p style="color: lawngreen"> One of your cards has been verified</p>
                    <br>
                    <h5>card details:</h5>
                    <code>card number : {{ $card->card_number }}</code>
                    <br/>
                    <code>sheba number : {{ $card->sheba_number }}</code>
                </td>
            @elseif($card->status == 'rejected')
                <td>
                    <h2>dear &nbsp; {{ $user->name }}</h2>
                    <p style="color: red"> One of your cards has been rejected</p>
                    <br>
                    <h5>card details:</h5>
                    <code>card number : {{ $card->card_number }}</code>
                    <br/>
                    <code>sheba number : {{ $card->sheba_number }}</code>
                </td>
            @endif

        </tr>
    </table>

    <! Banner Row -->
    <table role="presentation" bgcolor="#EAF0F6" width="100%" style="margin-top: 50px;" >
        <tr>
            <td align="center" style="padding: 30px 30px;">

                <h2> Nullam porta arcu </h2>
                <p>
                    Nam vel lobortis lorem. Nunc facilisis mauris at elit pulvinar, malesuada condimentum erat vestibulum. Pellentesque eros tellus, finibus eget erat at, tempus rutrum justo.

                </p>
                <a href="#"> Ask us a question</a>
            </td>
        </tr>
    </table>

    <! Unsubscribe Footer -->

    <table role="presentation" bgcolor="#F5F8FA" width="100%" >
        <tr>
            <td align="left" style="padding: 30px 30px;">
                <p style="color:#99ACC2"> Made with &hearts; at HubSpot HQ </p>
                <a class="subtle-link" href="#"> Unsubscribe </a>
            </td>
        </tr>
    </table>
</div>
</body>
</html>
