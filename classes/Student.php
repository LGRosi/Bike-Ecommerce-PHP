<?php
class Student {
    private $portadaDesktop;
    private $portadaTablet;
    private $portadaMobile;
    private $nombreApellido;
    private $edad;
    private $correoElectronico;

    /**
     * Devuelve todos los datos del alumno.
     *
     * @return array Devuelve un array con todos los datos del alumno.
     */
    public static function allDataStudent(): array
    {
        $bringStudentFileJSON = file_get_contents('data/student.json');
        $studentJSON = json_decode($bringStudentFileJSON);

        foreach ($studentJSON as $value) {
            $student = new self();

            $student->portadaDesktop        = $value->portada_desktop;
            $student->portadaTablet         = $value->portada_tablet;
            $student->portadaMobile         = $value->portada_mobile;
            $student->nombreApellido        = $value->nombre_y_apellido;
            $student->edad                  = $value->edad;
            $student->correoElectronico     = $value->correo_electronico;

            $students[] = $student;
        }

        return $students;
    }

    /**
     * Obtiene el valor de la portada desktop.
     */ 
    public function getPortadaDesktop()
    {
        return $this->portadaDesktop;
    }

    /**
     * Establece el valor de la portada desktop.
     *
     * @return  self
     */ 
    public function setPortadaDesktop($portadaDesktop)
    {
        $this->portadaDesktop = $portadaDesktop;

        return $this;
    }

    /**
     * Obtiene el valor de la portada tablet.
     */ 
    public function getPortadaTablet()
    {
        return $this->portadaTablet;
    }

    /**
     * Establece el valor de la portada tablet.
     *
     * @return  self
     */ 
    public function setPortadaTablet($portadaTablet)
    {
        $this->portadaTablet = $portadaTablet;

        return $this;
    }

    /**
     * Obtiene el valor de la portada mobile.
     */
    public function getPortadaMobile()
    {
        return $this->portadaMobile;
    }

    /**
     * Establece el valor de la portada mobile.
     *
     * @return  self
     */ 
    public function setPortadaMobile($portadaMobile)
    {
        $this->portadaMobile = $portadaMobile;

        return $this;
    }

    /**
     * Obtiene el valor del nombre y del apellido.
     */ 
    public function getNombreApellido()
    {
        return $this->nombreApellido;
    }

    /**
     * Establece el valor del nombre y del apellido.
     *
     * @return  self
     */ 
    public function setNombreApellido($nombreApellido)
    {
        $this->nombreApellido = $nombreApellido;

        return $this;
    }

    /**
     * Obtiene el valor de la edad.
     */ 
    public function getEdad()
    {
        return $this->edad;
    }

    /**
     * Establece el valor de la edad.
     *
     * @return  self
     */ 
    public function setEdad($edad)
    {
        $this->edad = $edad;

        return $this;
    }

    /**
     * Obtiene el valor del correo electrónico.
     */ 
    public function getCorreoElectronico()
    {
        return $this->correoElectronico;
    }

    /**
     * Establece el valor del correo electrónico.
     *
     * @return  self
     */ 
    public function setCorreoElectronico($correoElectronico)
    {
        $this->correoElectronico = $correoElectronico;

        return $this;
    }
}
?>