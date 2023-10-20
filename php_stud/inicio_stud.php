<?php
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['user'])) {
    // Si no ha iniciado sesión, redirigir a la página de inicio de sesión
    header('Location: ../index.html');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Hessen - Bibloteca Virtual</title>
        <link rel="icon" href="../img/hessen icono.png" type="image/x-icon">
        <!-- Favicon-->
        <!-- Core theme CSS (includes Bootstrap)-->
        <link rel="stylesheet" href="../css/princ_stud.css">
    </head>
    <style>
        .filtro{
            display: none;
            }
        .navbar-scroll {
        background-color: rgba(255, 255, 255, 0.9) !important; /* Ajusta el último valor (0.9) para controlar la opacidad */
        transition: background-color 0.3s ease; /* Agrega una transición suave */
        }
        body{
            background-color: rgba(151, 148, 148, 0.602);
        }
    </style>
    <body>

        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light" id="navbar">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand"><img src="../img/hessen2.png" alt=""></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="#">INICIO</a></li>
                        <li class="nav-item"><a class="nav-link" href="../php_stud/fisico_stud.php">LIBROS FISICOS</a></li>
                        
                    </ul>
                    <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Buscar" id="buscar" aria-label="Buscar">
                        <button class="btn btn-outline-primary" type="submit">Buscar</button>
                    </form>
                </div>
            </div>
        </nav>
        <!-- Header-->
        <header class="bg-dark py-5 mt-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">BIBLIOTECA VIRTUAL HESSEN</h1>
                    <p class="lead fw-normal text-white-50 mb-0">Explora un mundo de conocimiento a través de nuestra amplia colección de libros digitales </p>
                </div>
            </div>
        </header>
        <!-- Section 1-->
        <div class="secciones">
        <strong>SECCION: MEDICINA</strong>
        </div>
        <hr class="linea">
        <section class="py-5" >
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    <!-- INICIO DE LOS LIBROS 1-->
                    <div class="col mb-5" id="a1">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="../img/medicina.jpg" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">SIglas Medicas</h5>
                                    <!-- Product price-->
                                    Curar es un arte, aprender es la clave.
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="https://drive.google.com/file/d/1nJqjpBPDkRkKO6_1okc6e8RiyRqDhrzw/preview">Leer Ahora</a></div>
                            </div>
                        </div>
                    </div>
                    <!--2-->
                    <div class="col mb-5" id="a1">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="../img/medicina.jpg" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder" >Medicamentos</h5>
                                    <!-- Product price-->
                                    Curar es un arte, aprender es la clave.
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="https://drive.google.com/file/d/1B60LBckzf6U-5u7RADjZZEXPUbBT6Jyx/preview">Leer Ahora</a></div>
                            </div>
                        </div>
                    </div>
                     <!--3-->
                    <div class="col mb-5" id="a1">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="../img/medicina.jpg" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">Principios Medic..1</h5>
                                    <!-- Product price-->
                                    Curar es un arte, aprender es la clave.
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="https://drive.google.com/file/d/1x7K2-b-ZHPGnmOo4d0O7y7qG1p19uRBF/preview">Leer Ahora</a></div>
                            </div>
                        </div>
                    </div>
                    <!--4-->
                    <div class="col mb-5" id="a1">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="../img/medicina.jpg" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">Principios Medic..2</h5>
                                    <!-- Product price-->
                                    Curar es un arte, aprender es la clave.
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="https://drive.google.com/file/d/1qXnN7D0fFrjmyBAS0ksLW-QAGfuaLDi9/preview">Leer Ahora</a></div>
                            </div>
                        </div>
                    </div>
                    <!--5-->
                    <div class="col mb-5" id="a1">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="../img/medicina.jpg" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">Temas Medic..1</h5>
                                    <!-- Product price-->
                                    Curar es un arte, aprender es la clave.
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="https://drive.google.com/file/d/1Wxvzv6Wi9rYBnYxjnoeqGtJVxHEv9CPk/preview">Leer Ahora</a></div>
                            </div>
                        </div>
                    </div>
                    <!--6-->
                    <div class="col mb-5" id="a1">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="../img/medicina.jpg" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">Temas Medic..2</h5>
                                    <!-- Product price-->
                                    Curar es un arte, aprender es la clave.
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="https://drive.google.com/file/d/14mriWK_FJoqLLe2noi8qk4sSjQ2J4JUd/preview">Leer Ahora</a></div>
                            </div>
                        </div>
                    </div>
                    <!--7-->
                    <div class="col mb-5" id="a1">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="../img/medicina.jpg" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">Medic. Legal</h5>
                                    <!-- Product price-->
                                    Curar es un arte, aprender es la clave.
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="https://drive.google.com/file/d/1vd8nL70vk7Z2Wi7Av_XYd15wg9CbIPPm/preview">Leer Ahora</a></div>
                            </div>
                        </div>
                    </div>
                    <!--8-->
                    <div class="col mb-5" id="a1">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="../img/medicina.jpg" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">Balistica y Glos..</h5>
                                    <!-- Product price-->
                                    Curar es un arte, aprender es la clave.
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="https://drive.google.com/file/d/1vd8nL70vk7Z2Wi7Av_XYd15wg9CbIPPm/preview">Leer Ahora</a></div>
                            </div>
                        </div>
                    </div>
                    <!--9-->
                    <div class="col mb-5" id="a1">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="../img/medicina.jpg" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">Guías Prac..</h5>
                                    <!-- Product price-->
                                    Curar es un arte, aprender es la clave.
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="https://drive.google.com/file/d/1GnvnqFKJiUikknD3lqX2j98_zgsUT0K0/preview">Leer Ahora</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="secciones1">
        <strong>SECCION: FARMACOLOGIA</strong>
        </div>
        <hr class="linea1">
        <!-- Section 2-->
        <section class="hide" id="oclt">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    <!-- INICIO DE LOS LIBROS 1-->
                    <div class="col mb-5" id="a1">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="../img/farmacologia.jpg" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">farmac. Basic..</h5>
                                    <!-- Product price-->
                                    Moléculas que sanan, dosis de vida.
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="https://drive.google.com/file/d/1IGe7x1LOAO0neIDg60e19kRpyPYs0d_d/preview">Leer Ahora</a></div>
                            </div>
                        </div>
                    </div>
                    <!--2-->
                    <div class="col mb-5" id="a1">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="../img/farmacologia.jpg" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder" >Farmacos Card..</h5>
                                    <!-- Product price-->
                                    Moléculas que sanan, dosis de vida.
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="https://drive.google.com/file/d/1kLL2siS8fhoXOSvbPlcHD21HzQBYzghk/preview">Leer Ahora</a></div>
                            </div>
                        </div>
                    </div>
                     <!--3-->
                    <div class="col mb-5" id="a1">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="../img/farmacologia.jpg" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">Farmac. Ocular</h5>
                                    <!-- Product price-->
                                    Moléculas que sanan, dosis de vida.
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="https://drive.google.com/file/d/1nS12IbwWwo-qdmPl-hsFI4RI-fmWGcqJ/preview">Leer Ahora</a></div>
                            </div>
                        </div>
                    </div>
                    <!--4-->
                    <div class="col mb-5" id="a1">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="../img/farmacologia.jpg" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">Farmac. Embaraz..</h5>
                                    <!-- Product price-->
                                    Moléculas que sanan, dosis de vida.
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="https://drive.google.com/file/d/11O0tK3el6ubUNpZoJgg7cshKA9ud_kV8/preview">Leer Ahora</a></div>
                            </div>
                        </div>
                    </div>
                    <!--5-->
                    <div class="col mb-5" id="a1">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="../img/farmacologia.jpg" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">Farmacologia</h5>
                                    <!-- Product price-->
                                    Moléculas que sanan, dosis de vida.
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="https://drive.google.com/file/d/1xLYVgsnM8VkHBlqt3bjLm0rUaVlQw-yF/preview">Leer Ahora</a></div>
                            </div>
                        </div>
                    </div>
                    <!--6-->
                    <div class="col mb-5" id="a1">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="../img/farmacologia.jpg" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">Farmac. Ilustr..</h5>
                                    <!-- Product price-->
                                    Moléculas que sanan, dosis de vida.
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="https://drive.google.com/file/d/1FOLFxDmg3G2vieXH18JIcRJxIxkexitn/preview">Leer Ahora</a></div>
                            </div>
                        </div>
                    </div>
                    <!--7-->
                    <div class="col mb-5" id="a1">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="../img/farmacologia.jpg" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">Manual Farmac..</h5>
                                    <!-- Product price-->
                                    Moléculas que sanan, dosis de vida.
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="https://drive.google.com/file/d/1-w11TKbkuYbitkH3eKId2z1Udd5A9m9E/preview">Leer Ahora</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="center-button">
            <button class="se1" id="most">Mostrar Mas</button>
        </div>
        <div class="secciones2">
        <strong>SECCION: ENFERMERIA</strong>
        </div>
        <hr class="linea2">
         <!-- Section 3-->
         <section class="hide" id="oclt1">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    <!-- INICIO DE LOS LIBROS 1-->
                    <div class="col mb-5" id="a1">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="../img/enfermeria.jpg" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">Actuacion Enf..</h5>
                                    <!-- Product price-->
                                    Cuidar con amor, sanar con empatía
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="https://drive.google.com/file/d/1iIXdITDyRSGGL31oIGnFcK70Ka7Mhyt2/preview">Leer Ahora</a></div>
                            </div>
                        </div>
                    </div>
                    <!--2-->
                    <div class="col mb-5" id="a1">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="../img/enfermeria.jpg" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder" >Cuidados Basic..</h5>
                                    <!-- Product price-->
                                    Cuidar con amor, sanar con empatía
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="https://drive.google.com/file/d/1lX7Iqv9LXtgmvcoGwiG4nhc7VJUfroHY/preview">Leer Ahora</a></div>
                            </div>
                        </div>
                    </div>
                     <!--3-->
                    <div class="col mb-5" id="a1">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="../img/enfermeria.jpg" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">Tecnicas y Proc..</h5>
                                    <!-- Product price-->
                                    Cuidar con amor, sanar con empatía
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="https://drive.google.com/file/d/1q7eW9ANhc11LHv6ghdoG6uVZ0F1ZSG-8/preview">Leer Ahora</a></div>
                            </div>
                        </div>
                    </div>
                    <!--4-->
                    <div class="col mb-5" id="a1">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="../img/enfermeria.jpg" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">Urgencias</h5>
                                    <!-- Product price-->
                                    Cuidar con amor, sanar con empatía
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="https://drive.google.com/file/d/1vnRDGcozWOCdgfBlOeXOls0g8DtPGM6Q/preview">Leer Ahora</a></div>
                            </div>
                        </div>
                    </div>
                    <!--5-->
                    <div class="col mb-5" id="a1">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="../img/enfermeria.jpg" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">Manual Enf..</h5>
                                    <!-- Product price-->
                                    Cuidar con amor, sanar con empatía
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="https://drive.google.com/file/d/1SaGZLRjwBRKBapFZLGTccqHZ9iuH_Na5/preview">Leer Ahora</a></div>
                            </div>
                        </div>
                    </div>
                    <!--6-->
                    <div class="col mb-5" id="a1">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="../img/enfermeria.jpg" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">Tecnicas Com..</h5>
                                    <!-- Product price-->
                                    Cuidar con amor, sanar con empatía
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="https://drive.google.com/file/d/1qtbCMkhwWLCFwiZT2gsHtFk8j_54EeMK/preview">Leer Ahora</a></div>
                            </div>
                        </div>
                    </div>
                    <!--7-->
                    <div class="col mb-5" id="a1">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="../img/enfermeria.jpg" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">Cuidado Paci..</h5>
                                    <!-- Product price-->
                                    Cuidar con amor, sanar con empatía
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="https://drive.google.com/file/d/1mMd12DjYeaFWu4ZkUiB1tjxRVW944xwn/preview">Leer Ahora</a></div>
                            </div>
                        </div>
                    </div>
                    <!--8-->
                    <div class="col mb-5" id="a1">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="../img/enfermeria.jpg" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">Historia Enf..</h5>
                                    <!-- Product price-->
                                    Cuidar con amor, sanar con empatía
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="https://drive.google.com/file/d/1_f5dZTnEaToqVFi19PCbFyHzrx6tzrWN/preview">Leer Ahora</a></div>
                            </div>
                        </div>
                    </div>
                    <!--9-->
                    <div class="col mb-5" id="a1">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="../img/enfermeria.jpg" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">Adimist. de Servic..</h5>
                                    <!-- Product price-->
                                    Cuidar con amor, sanar con empatía
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="https://drive.google.com/file/d/1FmSQQ3cXC9uwQcN2-ddIptkQuHUdGkgV/preview">Leer Ahora</a></div>
                            </div>
                        </div>
                    </div>
                    <!--10-->
                    <div class="col mb-5" id="a1">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="../img/enfermeria.jpg" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">Anticoagulacion</h5>
                                    <!-- Product price-->
                                    Cuidar con amor, sanar con empatía
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="https://drive.google.com/file/d/17qZu8N026CWfU25vm174xWDaHuTrZFm7/preview">Leer Ahora</a></div>
                            </div>
                        </div>
                    </div>
                    <!--11-->
                    <div class="col mb-5" id="a1">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="../img/enfermeria.jpg" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">ECG</h5>
                                    <!-- Product price-->
                                    Cuidar con amor, sanar con empatía
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="https://drive.google.com/file/d/1LRQMRYYfA4FbIArlYvxKeOtHbzEFmwRk/preview">Leer Ahora</a></div>
                            </div>
                        </div>
                    </div>
                    <!--12-->
                    <div class="col mb-5" id="a1">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="../img/enfermeria.jpg" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">Ginecoobstétrica</h5>
                                    <!-- Product price-->
                                    Cuidar con amor, sanar con empatía
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="https://drive.google.com/file/d/1ZNeK9-F-CG9_9Fh29JayhyNgilQmwz-X/preview">Leer Ahora</a></div>
                            </div>">Leer Ahora</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="center-button">
            <button class="se12" id="most1">Mostrar Mas</button>
        </div>
        <div class="secciones3">
        <strong>SECCION: ANESTESIA</strong>
        </div>
        <hr class="linea3">
         <!-- Section 4-->
         <section class="hide" id="oclt2">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    <!-- INICIO DE LOS LIBROS 1-->
                    <div class="col mb-5" id="a1">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="../img/anestesia.jpg" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">Manual Anest..</h5>
                                    <!-- Product price-->
                                    Silencio que alivia, sueños que protegen
                                </div>
                            </div>
                            <!-- enlace del libro-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="https://drive.google.com/file/d/1MEQsblySpNIOE2TACxSAIrglR8gGPntn/preview">Leer Ahora</a></div>
                            </div>
                        </div>
                    </div>
                    <!--2-->
                    <div class="col mb-5" id="a1">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="../img/anestesia.jpg" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder" >Historia Anest..</h5>
                                    <!-- Product price-->
                                    Silencio que alivia, sueños que protegen
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="https://drive.google.com/file/d/1bcbb-BZTuIlI90HxWZfIVELf411h33xG/preview">Leer Ahora</a></div>
                            </div>
                        </div>
                    </div>
                     <!--3-->
                    <div class="col mb-5" id="a1">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="../img/anestesia.jpg" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">Anest. Pediatr..</h5>
                                    <!-- Product price-->
                                    Silencio que alivia, sueños que protegen
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="https://drive.google.com/file/d/1nAJcLN67lWOohvXIs7Yvd0k_maViG4-x/preview">Leer Ahora</a></div>
                            </div>
                        </div>
                    </div>
                    <!--4-->
                    <div class="col mb-5" id="a1">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="../img/anestesia.jpg" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">Coceptos Basic..</h5>
                                    <!-- Product price-->
                                    Silencio que alivia, sueños que protegen
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="https://drive.google.com/file/d/1I4M4GDUiHMxNy1rF2mbt1fSQD-xR-j6n/preview">Leer Ahora</a></div>
                            </div>
                        </div>
                    </div>
                    <!--5-->
                    <div class="col mb-5" id="a1">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="../img/anestesia.jpg" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">Anest. para Transp..</h5>
                                    <!-- Product price-->
                                    Silencio que alivia, sueños que protegen
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="https://drive.google.com/file/d/1uKp_Dh3_El_jCJhO2Z7lCOrtaltUOdCd/preview">Leer Ahora</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="center-button">
            <button class="se13" id="most2">Mostrar Mas</button>
        </div>
        <div class="secciones4">
        <strong>SECCION: ANATOMIA</strong>
        </div>
        <hr class="linea4">
        <!--Section 5-->
        <section class="hide" id="oclt3">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    <!-- INICIO DE LOS LIBROS 1-->
                    <div class="col mb-5" id="a1">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="../img/anatomia.jpg" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">Manual Anat..</h5>
                                    <!-- Product price-->
                                    Descubriendo la maravilla bajo la piel
                                </div>
                            </div>
                            <!-- enlace del libro-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="https://drive.google.com/file/d/1pxvtzISvX1y5MtCLWZeV4cJvxGjR4iI6/preview">Leer Ahora</a></div>
                            </div>
                        </div>
                    </div>
                    <!--2-->
                    <div class="col mb-5" id="a1">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="../img/anatomia.jpg" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder" >Diccionario Anat..</h5>
                                    <!-- Product price-->
                                    Descubriendo la maravilla bajo la piel
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="https://drive.google.com/file/d/1XlgJmhVWGerIm-tlICTk2nKKB4K2Wwhk/preview">Leer Ahora</a></div>
                            </div>
                        </div>
                    </div>
                     <!--3-->
                    <div class="col mb-5" id="a1">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="../img/anatomia.jpg" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">Introduccion Anat..</h5>
                                    <!-- Product price-->
                                    Descubriendo la maravilla bajo la piel
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="https://drive.google.com/file/d/1sEqNFkpyahUPciTXNp43HWXNpJvI7F6i/preview">Leer Ahora</a></div>
                            </div>
                        </div>
                    </div>
                    <!--4-->
                    <div class="col mb-5" id="a1">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="../img/anatomia.jpg" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">Corazon</h5>
                                    <!-- Product price-->
                                    Descubriendo la maravilla bajo la piel
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="https://drive.google.com/file/d/1BqbMMRXxYXmkdIBC3e_729cXfq9-MufC/preview">Leer Ahora</a></div>
                            </div>
                        </div>
                    </div>
                    <!--5-->
                    <div class="col mb-5" id="a1">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="../img/anatomia.jpg" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">Sistm. Respiratorio</h5>
                                    <!-- Product price-->
                                    Descubriendo la maravilla bajo la piel
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="https://drive.google.com/file/d/1knYGbc0VSAGPHjzPx1oN9MDVY9uozA80/preview">Leer Ahora</a></div>
                            </div>
                        </div>
                    </div>
                    <!--6-->
                    <div class="col mb-5" id="a1">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="../img/anatomia.jpg" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">Sistm. Muscular</h5>
                                    <!-- Product price-->
                                    Descubriendo la maravilla bajo la piel
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="https://drive.google.com/file/d/1JaA1I55sC6Auu-qyVeU2-54xTV4NZsnV/preview">Leer Ahora</a></div>
                            </div>
                        </div>
                    </div>
                    <!--7-->
                    <div class="col mb-5" id="a1">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="../img/anatomia.jpg" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">Ojos</h5>
                                    <!-- Product price-->
                                    Descubriendo la maravilla bajo la piel
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="https://drive.google.com/file/d/1SFyK19FjoFwkBAYwZ6_G33f-ZykoE5o9/preview">Leer Ahora</a></div>
                            </div>
                        </div>
                    </div>
                    <!--8-->
                    <div class="col mb-5" id="a1">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="../img/anatomia.jpg" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">Anat. Humana</h5>
                                    <!-- Product price-->
                                    Descubriendo la maravilla bajo la piel
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="https://drive.google.com/file/d/1Po2aIgJp0MmM4QoeztJpw3S1L5cacP_V/preview">Leer Ahora</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="center-button">
            <button class="se14" id="most3">Mostrar Mas</button>
        </div>
        <div class="spacer"></div>
        <!-- Footer-->
        <footer class=" bg-dark mt-5" >
            <div class="container"><p class="m-0 text-center text-white">By Josue Cotera</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- js de la pag-->
        <script src="../js/mostr4.js"></script>
        <script src="../js/mostr3.js"></script>
        <script src="../js/mostr2.js"></script>
        <script src="../js/mostr1.js"></script>
        <script src="../js/deslis.js"></script>
        <script src="../js/busq_stud.js"></script>
        <script src="../js/studScript.js"></script>
    </body>
</html>