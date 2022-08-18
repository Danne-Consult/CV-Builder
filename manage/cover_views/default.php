<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700&display=swap" rel="stylesheet">
    <style>

        :root{
            --white: #fff;
            --black: #171717;
            --gray: #85888C;
            --orange: #faa31d;
            --navyblue:#114356;
            --navyblur-light:#256179;
            --light-orange: #f9ba5d;
            --success-green:#e1ecd4;
            --error-red:#ecd4d4;

        }
        .cover{width: 900px; height: 1250px;background-color: #fff; padding: 3em;}

        .aligncenter{text-align:center;}
        .alignright{text-align:right;}

        .fullwidth{width:100%}
        .cvpage{background-color: #fff; padding: 3em;}
        .cvpage .thintext{font-size:14.5px; padding: 3em 20px; background-color: #fafafa;}
        .cvpage .thintext .bio{line-height: 2.5;}
        .cvpage h1{font-weight: 300; margin-bottom: 24px; font-size: 61px;}
        .cvpage .socials{font-size:20px;}
        .cvpage .socials a{padding:0px .5em;}

        .cvpage .skillset{width:100%;}
        .cvpage .skillset .skillbx{width: 100%; float: left; margin: 19px 0px;}
        .cvpage .skillset .skillbx .skilldesc{width: 42%; float: left;}
        .cvpage .skillset .skillbx .progbar{width: 50%; background-color: #e0e0e0; float: left; height: 11px; border-radius: 200px; margin-top: 6px;}
        .cvpage .skillset .skillbx .progbar .range{width: 100%; height: 11px; background-color: #164966; border-radius: 200px;}

        .cvpage .fullcont{ padding-left: 30px;}
        .cvpage .fullcont h5{font-weight: 700; font-size: 17px;}
        .cvpage .fullcont h5 span{color: #898989; }
        .cvpage .refbx{margin-bottom:30px;}
    </style>
</head>
<body>
    <div class="cover">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="aligncenter" id="cfullname"></h3>
                <p class="aligncenter" id="coccupation"></p>
                <div class="aligncenter fullwidth" id="cpersonalinfo"></div>
                <p>&nbsp;</p>
                <div class="alignright fullwidth"><span id="cdate"></span></div>
                <p>&nbsp;</p>
                <p>
                    <span id="crecipient"></span><br />
                    <span id="ccompany"></span><br />
                    <span id="ccomaddress"></span><br />
                </p>
                <p>&nbsp;</p>
                <div id="cref"></div>
            </div>
            <div class="col-lg-12">
                <div id="cbody"></div>
            </div>    
        </div>
    </div>
</body>
</html>
