<?php
class Bike {
    private $id;
    private $titulo;
    private $descripcion;
    private $precio;
    private $codigo;
    private $marca;
    private $tipoDeBicicleta;
    private $portadaDesktop;
    private $portadaTablet;
    private $portadaMobile;
    private $fechaDePublicacion;
    private $especificacionesTecnicas;

    /**
     * Devuelve todos los datos de la bicicleta.
     *
     * @return array Devuelve un array con todos los datos de la bicicleta publicada.
     */
    public static function allBike(): array {
        $bringBikesFileJSON = file_get_contents('data/bikes.json');
        $bikesJSON = json_decode($bringBikesFileJSON);

        foreach ($bikesJSON as $value) {
            $bike = new self();

            $bike->id                        = $value->id;
            $bike->titulo                    = $value->titulo;
            $bike->descripcion               = $value->descripcion;
            $bike->precio                    = $value->precio;
            $bike->codigo                    = $value->codigo;
            $bike->marca                     = $value->marca;
            $bike->tipoDeBicicleta           = $value->tipo_de_bicicleta;
            $bike->portadaDesktop            = $value->portada_desktop;
            $bike->portadaTablet             = $value->portada_tablet;
            $bike->portadaMobile             = $value->portada_mobile;
            $bike->fechaDePublicacion        = $value->fecha_de_publicacion;
            $bike->especificacionesTecnicas  = (array) $value->especificaciones_tecnicas;
        
            $bikes[] = $bike;
        }

        return $bikes;
    }

    /**
     * Filtra bicicletas por una propiedad y valor específico.
     *
     * @param array $bikes El array de todas las bicicletas.
     * @param string $property El nombre de la propiedad por la que se quiere filtrar.
     * @param mixed $value El valor que se quiere filtrar en la propiedad especificada.
     * @return array Un array de las bicicletas filtradas.
     */
    public static function filter(array $bikes, string $property, $value): array {
        $filteredBikes = [];

        foreach ($bikes as $bike) {
            $getterMethod = 'get' . ucfirst($property);

            if (method_exists($bike, $getterMethod)) {
                $propertyValue = $bike->$getterMethod();

                if ($propertyValue === $value) {
                    $filteredBikes[] = $bike;
                }
            }
        }

        return $filteredBikes;
    }


    /**
     * Con el ID único de la bicicleta, devuelve las especificaciones técnicas de la bicicleta. En otras palabras devuelve el detalle de dicha bicicleta.
     *
     * @param int $idBike Es el ID único de la bicicleta.
     * @return ?Bike Devuelve un objeto bike con todas las especificaciones técnicas de la bicicleta o null.
     */
    public static function bikeById(int $idBike): ?Bike {
        $bikes = self::allBike();
        $result = [];

        foreach ($bikes as $bike) {
            if ($bike->id == $idBike) {
                return $result[] = $bike;
            }
        }

        return null;
    }

    /**
     * Esta función devuelve las primeras x palabras de un párrafo.
     *
     * @param int $amount Esta es la cantidad de palabras a extraer. Este valor es opcional, de no existir se asumirá valor 12.
     * @return string La cantidad de palabras solicitadas con un elipsis (...) concatenando al final, en caso de ser necesario.
     */
    public function cutOutWords(int $amount = 12): string {
        $text = $this->descripcion;

        $wordCollection = explode(' ', $text);

        if (count($wordCollection) <= $amount) {
            $result = $text;
        } else {
            array_splice($wordCollection, $amount);
            $result = implode(' ', $wordCollection) . '...';
        }

        return $result;
    }

    /**
     * Devuelve el precio de la bicicleta formateado de la siguiente manera: (Ej: $1.000,00).
     *
     * @return string El precio convertido a string con su correcto formateo.
     */
    public function formattedPrice(): string {
        return '$ ' . number_format($this->precio, 2, ",", ".");
    }

    /**
     * Agrega acentos y caracteres especiales a las keys del array de especificaciones técnicas.
     *
     * @param array $especificacionesTecnicas El array original de especificaciones técnicas.
     * @return array El array de especificaciones técnicas con las claves modificadas.
     */
    public static function accentsAndSpecialCharactersToKeys(array $especificacionesTecnicas): array {
        $newsKeys = [
            'pinon'             => 'Piñón',
            'cano_de_asiento'   => 'Caño de asiento'
        ];

        $result = [];
        foreach ($especificacionesTecnicas as $key => $value) {
            $newKey = isset($newsKeys[$key]) ? $newsKeys[$key] : $key;
            $result[$newKey] = is_array($value) ? self::accentsAndSpecialCharactersToKeys($value) : $value;
        }
        return $result;
    }

    /**
     * Formatear la fecha de publicación de la bicicleta con el siguiente formato: DD/MM/YYYY.
     *
     * @return string La fecha de publicación en el formato: DD/MM/YYYY.
     */
    public function formatPublicationDate(): string {
        $publicationDate = new DateTime($this->fechaDePublicacion);
        return $publicationDate->format('d/m/Y');
    }


    /**
     * Obtiene el valor del id.
     */ 
    public function getId() {
        return $this->id;
    }

    /**
     * Establece el valor del id.
     *
     * @return self
     */ 
    public function setId($id) {
        $this->id = $id;

        return $this;
    }

    /**
     * Obtiene el valor del título.
     */ 
    public function getTitulo() {
        return $this->titulo;
    }

    /**
     * Establece el valor del título.
     *
     * @return self
     */ 
    public function setTitulo($titulo) {
        $this->titulo = $titulo;

        return $this;
    }

    /**
     * Obtiene el valor de la descripción.
     */ 
    public function getDescripcion() {
        return $this->descripcion;
    }

    /**
     * Establece el valor de la descripción.
     *
     * @return self
     */ 
    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Obtiene el valor del precio.
     */ 
    public function getPrecio() {
        return $this->precio;
    }

    /**
     * Establece el valor del precio.
     *
     * @return self
     */ 
    public function setPrecio($precio) {
        $this->precio = $precio;

        return $this;
    }

    /**
     * Obtiene el valor del código.
     */ 
    public function getCodigo() {
        return $this->codigo;
    }

    /**
     * Establece el valor del código.
     *
     * @return self
     */ 
    public function setCodigo($codigo) {
        $this->codigo = $codigo;

        return $this;
    }

    /**
     * Obtiene el valor de la marca.
     */ 
    public function getMarca() {
        return $this->marca;
    }

    /**
     * Establece el valor de la marca.
     *
     * @return self
     */ 
    public function setMarca($marca) {
        $this->marca = $marca;

        return $this;
    }

    /**
     * Obtiene el valor del tipo de bicicleta.
     */ 
    public function getTipoDeBicicleta() {
        return $this->tipoDeBicicleta;
    }

    /**
     * Establece el valor del tipo de bicicleta.
     *
     * @return self
     */ 
    public function setTipoDeBicicleta($tipoDeBicicleta) {
        $this->tipoDeBicicleta = $tipoDeBicicleta;

        return $this;
    }

    /**
     * Obtiene el valor de la portada desktop.
     */ 
    public function getPortadaDesktop() {
        return $this->portadaDesktop;
    }

    /**
     * Establece el valor de la portada desktop.
     *
     * @return self
     */ 
    public function setPortadaDesktop($portadaDesktop) {
        $this->portadaDesktop = $portadaDesktop;

        return $this;
    }

    /**
     * Obtiene el valor de la portada tablet.
     */ 
    public function getPortadaTablet() {
        return $this->portadaTablet;
    }

    /**
     * Establece el valor de la portada tablet.
     *
     * @return self
     */ 
    public function setPortadaTablet($portadaTablet) {
        $this->portadaTablet = $portadaTablet;

        return $this;
    }

    /**
     * Obtiene el valor de la portada mobile.
     */ 
    public function getPortadaMobile() {
        return $this->portadaMobile;
    }

    /**
     * Establece el valor de la portada mobile.
     *
     * @return self
     */ 
    public function setPortadaMobile($portadaMobile) {
        $this->portadaMobile = $portadaMobile;

        return $this;
    }

    /**
     * Obtiene el valor de la fecha de publicación.
     */ 
    public function getFechaDePublicacion() {
        return $this->fechaDePublicacion;
    }

    /**
     * Establece el valor de la fecha de publicación.
     *
     * @return self
     */ 
    public function setFechaDePublicacion($fechaDePublicacion) {
        $this->fechaDePublicacion = $fechaDePublicacion;

        return $this;
    }

    /**
     * Obtiene el valor de las especificaciones técnicas.
     */ 
    public function getEspecificacionesTecnicas() {
        return $this->especificacionesTecnicas;
    }

    /**
     * Establece el valor de las especificaciones técnicas.
     *
     * @return self
     */ 
    public function setEspecificacionesTecnicas($especificacionesTecnicas) {
        $this->especificacionesTecnicas = $especificacionesTecnicas;

        return $this;
    }
}
?>