<?php
    header('Content-Type:application/json');
    $data = [
        ['nome'=>'Mario', 'cognome'=>'Rossi', 'email'=>'mario.rossi@example.it'],
        ['nome'=>'Luca', 'cognome'=>'Verdi', 'email'=>'luca.verdi@example.it'],
        ['nome'=>'Federico', 'cognome'=>'Bordi', 'email'=>'federico.bordi@example.it']
    ];

    echo json_encode($data);
?>