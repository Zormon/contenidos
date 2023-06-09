<?php
global $login;

switch ($_POST['mode']) {
    case 'details':
        echo json_encode( groups\details( array($_POST['id']) ) );
    break;

    case 'add': 
        if ( $login->can['editGroups'] ) {
            groups\add($_POST);
            echo json_encode(["status" => 'ok' ]);
        } else {
            echo json_encode(["status" => 'ko', "error" => 'Permiso denegado' ]);
        }
    break;
    
    case 'edit':
        if ( $login->can['editGroups'] ) {
            groups\edit($_POST);
            echo json_encode(["status" => 'ok' ]);
        } else {
            echo json_encode(["status" => 'ko', "error" => 'Permiso denegado' ]);
        }
    break;

    case 'delete':
        if ( $login->can['editGroups'] ) {
            groups\delete( $_POST['id'] );
            echo json_encode(["status" => 'ok' ]);
        }  else {
            echo json_encode(["status" => 'ko', "error" => 'Permiso denegado' ]);
        }
    break;

    case 'list':
        echo json_encode(groups\listado());
    break;
}

?>