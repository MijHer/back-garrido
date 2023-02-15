<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AlumnoController;
use App\Http\Controllers\Api\AnioacademicoController;
use App\Http\Controllers\Api\ApoderadoController;
use App\Http\Controllers\Api\CursoController;
use App\Http\Controllers\Api\DepartamentoController;
use App\Http\Controllers\Api\DistritoController;
use App\Http\Controllers\Api\GradoController;
use App\Http\Controllers\Api\MatriculaController;
use App\Http\Controllers\Api\PagoController;
use App\Http\Controllers\Api\ProfesorController;
use App\Http\Controllers\Api\ProvinciaController;
use App\Http\Controllers\Api\TipousuarioController;
use App\Http\Controllers\Api\UserController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
/* Route::middleware(['auth', 'second'])->group(function () {
    
}); */
Route::post("/v1/user/login", [UserController::class, "login"]);


Route::middleware('auth:sanctum')->group(function () {
    Route::get("/v1/user/index", [UserController::class, "index"]);
    Route::post("/v1/user/registro", [UserController::class, "registro"]);
    Route::get("/v1/user/show", [UserController::class, "show"]);
    Route::patch("/v1/user/update/{id}", [UserController::class, "update"]);
    Route::delete("/v1/user/destroy/{id}", [UserController::class, "destroy"]);

// ASIGNAR DOCENTE A LOS CURSOS
    Route::post("/v1/curso/{id}/asignar-profesor", [CursoController::class, "asignarProfesor"]);
    Route::post("/v1/curso/{id}/quitar-profesor", [CursoController::class, "quitarProfesor"]);

//ASIGNAR CURSO A LOS GRADOS
    Route::post("/v1/grado/{id}/asignar-curso", [GradoController::class, "asignarCurso"]);
    Route::post("/v1/grado/{id}/quitar-curso", [GradoController::class, "quitarCurso"]);

//LLAMAR ASISTENCIA UNO POR UNO
    Route::post("/v1/alumno/{id}/llamar-asistencia", [AlumnoController::class, "asistenciaAlumno"]);

//LLAMAR ASISTENCIA MASIVO
    Route::post("/v1/alumno/registrar-asistencia", [AlumnoController::class, "registrarAsistencia"]);

/* CONTAR CANTIDAD DE ALUMNOS INSCRITOS AL SISTEMA */
    Route::get("/v1/alumno/contar-alumnos", [AlumnoController::class, "contarAlumnos"]);

/* CONTAR CANTIDAD DE ALUMNOS MATRICULADOS */
    Route::get("/v1/matricula/contar-matriculados", [MatriculaController::class, "contarMatriculas"]);

    Route::get("/v1/profesor/contar-profesores", [ProfesorController::class, "contarProfesoresSi"]);

    Route::get("/v1/profesor/contar-profesorestotal", [ProfesorController::class, "contarProfesores"]);

    Route::get("/v1/user/contar-users", [UserController::class, "contarUsers"]);

    Route::get("/v1/pago/contar-pagos", [PagoController::class, "contarPagos"]);

//BUSCA ALUMNO PARA MATRICULAS Y PAGOS
    Route::get("/v1/alumno/buscar", [AlumnoController::class, "buscarAlumno"]);

    /* MUESTRA LOS CURSOS PARA QUE EL DOCENTE LLAMA LA LISTA */
    Route::get("/v1/profesor/vistacursos-asistencia", [ProfesorController::class, "cursosParaAsistencia"]);
    
    Route::get("/v1/alumno-curso/{curso_id}/grado/{grado_id}/seccion={seccion}", [AlumnoController::class, "listaCursoGradoSeccion"]);


    Route::apiResource("v1/alumno", AlumnoController::class);
    Route::apiResource("v1/anioacademico", AnioacademicoController::class);
    Route::apiResource("v1/apoderado", ApoderadoController::class);
    Route::apiResource("v1/curso", CursoController::class);
    Route::apiResource("v1/departamento", DepartamentoController::class);
    Route::apiResource("v1/distrito", DistritoController::class);
    Route::apiResource("v1/grado", GradoController::class);
    Route::apiResource("v1/matricula", MatriculaController::class);
    Route::apiResource("v1/pago", PagoController::class);
    Route::apiResource("v1/profesor", ProfesorController::class);
    Route::apiResource("v1/provincia", ProvinciaController::class);
    Route::apiResource("v1/tipousuario", TipousuarioController::class);
});
