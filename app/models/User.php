<?php
namespace formacom\models;
use Illuminate\Database\Eloquent\model;
class User extends Model{
    protected $table="user";
    protected $primaryKey = 'user_id';
    
    // Habilitar timestamps automáticos
    public $timestamps = true;
    
    // Especificar los nombres de las columnas de timestamp
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    
    // Campos que deben ser seleccionados por defecto
    protected $attributes = [
        'created_at' => null,
        'updated_at' => null
    ];
    
    // Asegurar que siempre se seleccionen estos campos
    protected static function boot()
    {
        parent::boot();
        
        static::addGlobalScope('withTimestamps', function ($builder) {
            $builder->select('*');
        });
    }
    
    // Campos que pueden ser asignados masivamente
    protected $fillable = [
        'username',
        'email', 
        'first_name',
        'last_name',
        'password'
    ];
      // Campos que deben ser ocultados en arrays/JSON
    protected $hidden = [
        'password'
    ];
    
    /**
     * Obtener la fecha de registro formateada
     */
    public function getFormattedCreatedAt() {
        if (!$this->created_at) {
            return "Fecha no disponible";
        }
        
        try {
            $date = new \DateTime($this->created_at);
            $now = new \DateTime();
            $interval = $now->diff($date);
            
            $formattedDate = $date->format('d/m/Y');
            
            if ($interval->y > 0) {
                return $formattedDate . " (hace " . $interval->y . " año" . ($interval->y > 1 ? "s" : "") . ")";
            } elseif ($interval->m > 0) {
                return $formattedDate . " (hace " . $interval->m . " mes" . ($interval->m > 1 ? "es" : "") . ")";
            } elseif ($interval->d > 0) {
                return $formattedDate . " (hace " . $interval->d . " día" . ($interval->d > 1 ? "s" : "") . ")";
            } else {
                return $formattedDate . " (hoy)";
            }
        } catch (\Exception $e) {
            return "Fecha no válida";
        }
    }

}

?>