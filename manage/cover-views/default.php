    <style>
        /* Default Template */
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
        .cover{width: 900px; min-height: 1250px; background-color: #fff; padding: 6em; margin: 0px auto;}

        .aligncenter{text-align:center;}
        .alignright{text-align:right;}

        .fullwidth{width:100%; }
        .width-80{width: 80%; margin: 0px auto;}
        .cover .thintext{font-size:14.5px; padding: 3em 20px; background-color: #fafafa;}
        .cover .thintext .bio{line-height: 2.5;}
        .cover h1{font-weight: 300; margin-bottom: 24px; font-size: 61px;}
        .cover .flexcenter{display: flex; align-content: center; flex-flow: row;}
        .cover .flexcenter > div{flex: 1 1 auto;}
        .cover .hidediv{display:none;}
        .cover .socials a{padding:0px .5em;}

        .cover .skillset{width:100%;}
        .cover .skillset .skillbx{width: 100%; float: left; margin: 19px 0px;}
        .cover .skillset .skillbx .skilldesc{width: 42%; float: left;}
        .cover .skillset .skillbx .progbar{width: 50%; background-color: #e0e0e0; float: left; height: 11px; border-radius: 200px; margin-top: 6px;}
        .cover .skillset .skillbx .progbar .range{width: 100%; height: 11px; background-color: #164966; border-radius: 200px;}

    </style>
</head>
<body>
    <div class="cover">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="aligncenter" id="cfullname"></h3>
                <p class="aligncenter" id="coccupation"></p>
                <div class="aligncenter fullwidth flexcenter" id="cpersonalinfo">
                    <div id="cemail" class="hidediv"></div>
                    <div id="ctel" class="hidediv"></div>
                    <div id="caddressbx" class="hidediv"><span style="float:left" id="caddress"></span><span style="float:left" id="cpostalcode"></span></div>
                    <div id="ccity" class="hidediv"></div>
                    <div id="ccountry" class="hidediv"></div>
                </div>
                <div class="aligncenter fullwidth flexcenter">
                    <div id="cwebsite" class="hidediv"></div>
                    <div id="cfacebook" class="hidediv"></div>
                    <div id="clinkedin" class="hidediv"></div>
                    <div id="ctwitter" class="hidediv"></div>
                </div>
                <p>&nbsp;</p>
                <div class="alignright fullwidth"><span id="cdate"></span></div>
                <p>&nbsp;</p>
                <p>
                    <span id="crecipient"></span>
                    <span id="ccompany"></span>
                    <span id="ccomaddress"></span>
                    <span id="ccomcity"></span>
                    <span id="ccomountry"></span>
                </p>
                <p>&nbsp;</p>
                <div id="cref" class="hidediv"></div>
            </div>
            <div class="col-lg-12">
                <div id="cbody"></div>
            </div>    
        </div>
    </div>
    
