<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ColeccionPalacio extends Model
{
    protected $table = 'PalacioNacional';
    protected $primaryKey='Id';
  
      public $timestamps = false;
      protected $fillable = ['Numero_de_inventario', 'Consecutivo_sala','Tipo_de_objeto','Nombre_o_tema','Descripcion','Estado_de_conservacion','Avaluo','Ubicacion','Verificado','Epoca','Alto','Largo','Profundidad','Tecnica_de_manufactura','Inscripciones','Titulo_descriptivo','Autor','Observaciones'];
      protected $guarded = [ "Id" ];

}
