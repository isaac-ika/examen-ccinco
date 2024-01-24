-- Creación de la base de datos
CREATE DATABASE controlescolar1;
GO

-- Uso de la base de datos
USE controlescolar1;
GO

-- Creación de la tabla ALUMNOS
CREATE TABLE ALUMNOS (
    idAlumno INT PRIMARY KEY IDENTITY(1,1),
    Nombre VARCHAR(50) NOT NULL,
    ApellidoPaterno VARCHAR(50) NOT NULL,
    ApellidoMaterno VARCHAR(50),
    Usuario AS LEFT(Nombre, 1) + '.' + ApellidoPaterno + '.' + CAST(FLOOR(RAND() * 100) + 1 AS VARCHAR(3)),
    contrasenia VARCHAR(100),
    CONSTRAINT chk_contrasenia CHECK (
        LEN(contrasenia) BETWEEN 8 AND 20
        AND contrasenia LIKE '%[A-Z]%'
        AND contrasenia LIKE '%[0-9]%'
    )
);
GO

-- Creación de la tabla MATERIAS
CREATE TABLE MATERIAS (
    idMateria INT PRIMARY KEY IDENTITY(1,1),
    Nombre VARCHAR(50),
    Costo DECIMAL(10, 2)
);
GO

-- Creación de la tabla MATERIAS_SELECCIONADAS
CREATE TABLE MATERIAS_SELECCIONADAS (
    idSeleccion INT PRIMARY KEY IDENTITY(1,1),
    idAlumno INT,
    idMateria INT,
    CONSTRAINT unique_alumno_materia UNIQUE (idAlumno, idMateria),
    FOREIGN KEY (idAlumno) REFERENCES ALUMNOS(idAlumno),
    FOREIGN KEY (idMateria) REFERENCES MATERIAS(idMateria)
);
GO

-- Creación del procedimiento almacenado para agregar materias seleccionadas
CREATE PROCEDURE AgregarMateriaSeleccionada
    @p_idAlumno INT,
    @p_idMateria INT
AS
BEGIN
    -- Verificar si la materia ya ha sido seleccionada por el alumno
    IF NOT EXISTS (SELECT 1 FROM MATERIAS_SELECCIONADAS WHERE idAlumno = @p_idAlumno AND idMateria = @p_idMateria)
    BEGIN
        -- Insertar la materia seleccionada
        INSERT INTO MATERIAS_SELECCIONADAS (idAlumno, idMateria) VALUES (@p_idAlumno, @p_idMateria);
    END
END;
GO


INSERT INTO MATERIAS (Nombre, Costo) VALUES ('Matemáticas', 50.00);

INSERT INTO MATERIAS (Nombre, Costo) VALUES ('Historia', 50.00);

INSERT INTO MATERIAS (Nombre, Costo) VALUES ('Ciencias', 50.00);
INSERT INTO MATERIAS (Nombre, Costo) VALUES ('Literatura', 50.00);
INSERT INTO MATERIAS (Nombre, Costo) VALUES ('Inglés', 50.00);}



INSERT INTO ALUMNOS (Nombre, ApellidoPaterno, ApellidoMaterno, contrasenia)
VALUES ('Juan', 'Pérez', 'López', 'Abc12345');


SELECT * FROM ALUMNOS;