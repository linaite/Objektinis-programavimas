<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Objektinis programavimas</title>
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/cruises.css">
</head>

<body>
<?php
include 'constants.php';
include 'entities/Cruise.php';
include 'entities/CruiseStop.php';
include 'entities/Location.php';
include 'entities/ShipPort.php';
include 'entities/Ship.php';
include 'viewModels/CruiseCardGridViewModel.php';

$dateFormat = 'Y-m-d H:i';

//Sukurti lokacijas
$barcelona = new ShipPort('A-Port', 'Barselona', 'Spain', 41.390205, 2.154007);
$marseillePort = new ShipPort('Marseille port', 'Marseille', 'France', 43.296398, 5.370000);
$nicePort = new ShipPort('Nice port', 'Nice', 'France', 43.675819, 7.289429);
$genoa = new ShipPort('B-Port', 'Genoa', 'Italy', 44.414165, 8.942184);
$hamburg = new ShipPort('A-Port', 'Hamburg', 'Germany', 53.551086, 9.993682);
$hagaPort = new ShipPort('Haga Port', 'Haga', 'Netherlands', 52.07344, 4.312055);
$maiamiPort = new ShipPort('Port of Maiami', 'Maiami', 'USA', 25.778803, -80.177994);
$havanaPort = new ShipPort('Havana Port', 'Havana', 'Cuba', 23.113592, -82.366592);
$guardalavaca = new ShipPort('B-Port', 'Guardalavaca', 'Cuba', 21.12059, -75.827248);


// 1. Nuo Rugsėjo 15, 18 valandos(GMT +1) Barselona(Spain)
//  iki Rugsėjo 18, 14 valandos(GMT +1) Genoa(Italy) - 240 eurų
$startDate = DateTime::createFromFormat(DATE_FORMAT, '2020-09-15 18:00', new DateTimeZone('Etc/GMT+1'));
$finishDate = DateTime::createFromFormat(DATE_FORMAT, '2020-09-18 14:00', new DateTimeZone('Etc/GMT+1'));
$cruiseSimple = new Cruise($startDate, $finishDate, $barcelona, $genoa, 240);

// 2. Nuo Rugsėjo 17, 15 valandos(GMT +1) Hamburgas(Vokietija)
//  iki Spalio 8, 11 valandos(GMT -5) Guardalavaca(Cuba) - 2240 eurų
$cruiseFancy = new Cruise(
    DateTime::createFromFormat(DATE_FORMAT, '2020-09-17 18:00', new DateTimeZone('Etc/GMT+1')),
    DateTime::createFromFormat(DATE_FORMAT, '2020-10-08 11:00', new DateTimeZone('Etc/GMT-4')),
    $hamburg, $guardalavaca, 2240
);


// 3. Sukurti savo kelionę, kurioje mielai sudalyvautum
$myCruise = new Cruise(
    DateTime::createFromFormat(DATE_FORMAT, '2020-10-11 18:00', new DateTimeZone('Etc/GMT')),
    DateTime::createFromFormat(DATE_FORMAT, '2020-10-12 08:00', new DateTimeZone('Etc/GMT+1')),
    'Riga/Latvia', 'Stockholm/Sweden', 120
);

//var_dump($myCruise);

// 3. Sukurti 2 laivus. Vieną didelį(500 kambarių) kita vidutinio dydžio(100 kambarių)
$ship = new Ship('Marex', 'C300', 500);
$ship->addOnePic('https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRYFEPlbCpSjn4zFY8S4OpePgA1B1Fv-juabQ&usqp=CAU');
$fancyShip = new Ship('Shipy', '45C', 100);
$fancyShip->addOnePic('https://media.bizj.us/view/img/10192205/bliss*1200xx6733-3788-1683-1733.jpg');

//var_dump($cruiseSimple);
//var_dump($cruiseFancy);

//4. Priskirti laivus kruizams
$cruiseSimple->setShip($ship);
$cruiseFancy->setShip($fancyShip);

//5. Sukurti Kruizams stoteles
$marseilleStop = new CruiseStop(
    $marseillePort,
    DateTime::createFromFormat(DATE_FORMAT, '2020-09-16 11:00', new DateTimeZone('Etc/GMT+1')),
    DateTime::createFromFormat(DATE_FORMAT, '2020-09-16 20:00', new DateTimeZone('Etc/GMT+1')),
);

$niceStop = new CruiseStop(
    $nicePort,
    DateTime::createFromFormat(DATE_FORMAT, '2020-09-17 09:00', new DateTimeZone('Etc/GMT+1')),
    DateTime::createFromFormat(DATE_FORMAT, '2020-09-17 22:00', new DateTimeZone('Etc/GMT+1')),
);

$cruiseSimple->setStop([$marseilleStop, $niceStop]);

$cruiseFancy->setStop([
    new CruiseStop(
        $hagaPort,
        DateTime::createFromFormat(DATE_FORMAT, '2020-09-19 08:00', new DateTimeZone('Etc/GMT+1')),
        DateTime::createFromFormat(DATE_FORMAT, '2020-09-17 20:00', new DateTimeZone('Etc/GMT+1')),
    ),
    new CruiseStop(
        $maiamiPort,
        DateTime::createFromFormat(DATE_FORMAT, '2020-09-26 08:00', new DateTimeZone('Etc/GMT-5')),
        DateTime::createFromFormat(DATE_FORMAT, '2020-09-27 20:00', new DateTimeZone('Etc/GMT-5')),
    ),
    new CruiseStop(
        $havanaPort,
        DateTime::createFromFormat(DATE_FORMAT, '2020-09-28 11:00', new DateTimeZone('Etc/GMT-5')),
        DateTime::createFromFormat(DATE_FORMAT, '2020-09-30 22:00', new DateTimeZone('Etc/GMT-5')),
    )
]);

//6.Prideti kruizams po 5 nuotraukas

$cruiseSimple->addOnePic('https://www.click2houston.com/resizer/6cpx2hwjGS349PSDbT8mplRLwR4=/1280x720/smart/filters:format(jpeg):strip_exif(true):strip_icc(true):no_upscale(true):quality(65)/cloudfront-us-east-1.images.arcpublishing.com/gmg/L2HF2CSBXREHBBAV3XN6RM5CHE.jpg');
$cruiseSimple->addOnePic('https://media.bizj.us/view/img/10192205/bliss*1200xx6733-3788-1683-1733.jpg');
$cruiseSimple->addOnePic('https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQJyrtJznkzDCkkB4hOciUQ1LUfqhPr1GGczg&usqp=CAU');
$cruiseSimple->addOnePic('https://cdn1.parksmedia.wdprapps.disney.com/resize/mwImage/1/870/544/75/dam/disney-cruise-line/ships/wonder/disney-wonder-sunset-16x9.jpeg?1599668093709');
$cruiseSimple->addOnePic('https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRYFEPlbCpSjn4zFY8S4OpePgA1B1Fv-juabQ&usqp=CAU');


$cruiseFancy->addOnePic(IMAGES . 'havanaport.jpg');
$cruiseFancy->addOnePic(IMAGES . 'maiami.jpg');
$cruiseFancy->addOnePic(IMAGES . 'haga-port.jpeg');
$cruiseFancy->addOnePic(IMAGES . 'haga-port.jpeg');
$cruiseFancy->addOnePic('https://cdn.cnn.com/cnnnext/dam/assets/200421145514-costa-deliziosa-2-1.jpg');


$cruiseGrid = new CruiseCardGridViewModel('All cruises', [
    $cruiseSimple,
    $cruiseFancy
]);

$cruiseGrid->render();




