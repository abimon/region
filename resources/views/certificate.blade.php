<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style type="text/css">
    * {
        margin: 0;
        padding: 0;
        text-indent: 0;
    }

    h1 {
        color: black;
        font-family: "Palatino Linotype", serif;
        font-style: normal;
        font-weight: bold;
        text-decoration: none;
        font-size: 24pt;
    }

    h3 {
        color: black;
        font-family: "Palatino Linotype", serif;
        font-style: normal;
        font-weight: bold;
        text-decoration: none;
        font-size: 16pt;
    }

    .s1 {
        color: #3684C4;
        font-family: "Palatino Linotype", serif;
        font-style: normal;
        font-weight: normal;
        text-decoration: none;
        font-size: 30pt;
    }

    .s2 {
        color: black;
        font-family: "Palatino Linotype", serif;
        font-style: normal;
        font-weight: normal;
        text-decoration: none;
        font-size: 18pt;
    }

    h2 {
        color: black;
        font-family: "Palatino Linotype", serif;
        font-style: normal;
        font-weight: bold;
        text-decoration: none;
        font-size: 18pt;
    }

    .h4 {
        color: black;
        font-family: "Palatino Linotype", serif;
        font-style: normal;
        font-weight: bold;
        text-decoration: none;
        font-size: 12pt;
        vertical-align: 5pt;
    }

    p {
        color: black;
        font-family: "Palatino Linotype", serif;
        font-style: normal;
        font-weight: normal;
        text-decoration: none;
        font-size: 17.5pt;
        margin: 0pt;
    }

    .s4 {
        color: black;
        font-family: "Palatino Linotype", serif;
        font-style: normal;
        font-weight: normal;
        text-decoration: none;
        font-size: 11pt;
    }

    .s5 {
        color: black;
        font-family: "Palatino Linotype", serif;
        font-style: normal;
        font-weight: normal;
        text-decoration: none;
        font-size: 11pt;
        vertical-align: 1pt;
    }

    li {
        display: block;
    }

    #l1 {
        padding-left: 0pt;
        counter-reset: c1 1;
    }

    #l1>li>*:first-child:before {
        counter-increment: c1;
        content: counter(c1, decimal)". ";
        color: black;
        font-family: "Palatino Linotype", serif;
        font-style: normal;
        font-weight: normal;
        text-decoration: none;
        font-size: 17.5pt;
    }

    #l1>li:first-child>*:first-child:before {
        counter-increment: c1 0;
    }

    /* Container holding the image and the text */
    .container {
        position: relative;
        text-align: center;
        color: white;
    }

    /* Centered text */
    .centered {
        position: absolute;
        top: 50%;
        left: 50%;
        color: black;
        transform: translate(-50%, -50%);
    }
</style>

<body>
    <?php $users = [
        'Joylin Jebet',
        'Lukio .O Onyango',
        'Samuel Oketch',
        'Annette Nyaboke',
        'James Omondi Omondi',
        'Amon Kipkoech',
        'Meshack Okari',
        'Florence Kemunto',
        'Dickens Omwoyo',
        'Denis Nduati',
        'Alvin Ayub',
        'Felix Meitamei',
        'Ruth Mamai',
        'George Kevin Wise',
        'Dianah Mayioro',
        'Tracy Akoth',
        'Elizabeth Makori',
        'Steve Opapa',
        'Philip Mboya',
        'Sarah Kemunto',
        'Bonface Ochanda',
        'OKemwa Jane Nyanchama',
        'Fidel Oyugi',
        'Cynthia Marion Kerubo',
        'Arori Josiah .M',
        'Sarah Thoya',
        'Sharon Moraa',
        'Mark Onyango',
        'Javan Kiprotich',
        'Christine James',
        'Edimon Ombati'
    ];
    // $users=['Christine James'];
    ?>
    @foreach($users as $user)
    <div class="container">
        <img src="{{asset('cert.jpg')}}" alt="Snow" style="width:100%;">
        <div class="centered" style="width: 80%;">
            <div>
                <h1 style="padding-left: 13pt;text-indent: 0pt;line-height: 30pt;text-align: center; "><a>CENTRAL KENYA
                        CONFERENCE</a></h1>
                <h3 style="padding-top: 1pt;padding-left: 26pt;text-indent: 0pt;line-height: 20pt;text-align: center;">
                    MASTERGUIDE UNIVERSITIES REGION</h3>
                <p class="s1" style="padding-left: 13pt;text-indent: 0pt;line-height: 38pt;text-align: center;">
                    Certificate of
                    Attendance</p>
                <p class="s2" style="padding-left: 14pt;text-indent: 0pt;line-height: 23pt;text-align: center; ">This acknowledges that</p>
                <h2 style="text-indent: 0pt;text-align: center; text-transform: uppercase;text-decoration: underline;font-size: 26; color: rgb(0, 119, 255); font-family:'Times New Roman', Times, serif" ;>{{$user}}</h2>
                <p class="s2" style="padding-left: 26pt;text-indent: 0pt;line-height: 22pt;text-align: center;">
                    Successfully attended the <b>University Region </b>campout held on</p>
                <h2 style="padding-left: 26pt;text-indent: 0pt;line-height: 22pt;text-align: center;">29<span class="h4">th
                    </span>October 2023 <span class="s2">at </span><i>YMCA Campsite Naivasha</i></h2>
                <p style="padding-top: 6pt;padding-left: 11pt;text-indent: 0pt;text-align: center;">Lessons covered
                    include:-
                </p>
                <ol id="l1" style="display: inline-block; columns: 2;-webkit-columns: 2;-moz-columns: 2;">
                    <li>
                        <p style="padding-left: 32pt;text-indent: -27pt;line-height: 19pt;text-align: left;">Fire
                            Building</p>
                    </li>
                    <li>
                        <p style="padding-left: 32pt;text-indent: -27pt;line-height: 22pt;text-align: left;">Basic Water
                            Safety
                        </p>
                    </li>
                    <li>
                        <p style="padding-left: 32pt;text-indent: -27pt;line-height: 19pt;text-align: left;">Nutrition
                        </p>
                    </li>
                    <li>
                        <p style="padding-left: 32pt;text-indent: -27pt;line-height: 22pt;text-align: left;">Camp Safety
                        </p>
                    </li>
                    <li>
                        <p style="padding-left: 32pt;text-indent: -27pt;line-height: 19pt;text-align: left;">Pathfinder
                            Story
                        </p>
                    </li>
                    <li>
                        <p style="padding-left: 32pt;text-indent: -27pt;line-height: 22pt;text-align: left;">Effective
                            Master
                            Guide
                        </p>
                    </li>
                </ol>

                <p style="text-indent: 0pt;text-align: left;"><br /></p>
                <div style=" text-align:center;padding-top: 25pt;">
                    <h3>CONFERENCE YOUTH DIRECTOR &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        &nbsp;REGION COORDINATOR</h3>
                </div>
                <div style=" text-align:center;padding-top: 0pt;">
                    <h3>Pr. Charles Mutugi &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        &nbsp;Bro. Edimon Ombati</h3>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</body>

</html>