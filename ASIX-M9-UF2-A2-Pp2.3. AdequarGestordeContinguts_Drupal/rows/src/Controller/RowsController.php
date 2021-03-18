<?php
namespace Drupal\rows\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\user\UserInterface;

class RowsController extends ControllerBase {

    public function rows($numero) {
      $header = [
        'col1' => t('Has solicitado la creacion de ' .$numero. ' filas'),
      ];
      $rows=array();
      for($i=1;$i<=(int)$numero;$i++) {
        array_push($rows,array((string)$i));
      }

      return [
        '#type' => 'table',
        '#header' => $header,
        '#rows' => $rows,
      ];
    }

}
