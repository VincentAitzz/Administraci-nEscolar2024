<?php
                    $server = "localhost";
                    $user = "root";
                    $pass = "";
                    $db = "colegioweb";

                    $conexion = new mysqli($server, $user, $pass, $db);
                    if ($conexion->connect_error) {
                        die("Connection failed: " . $conexion->connect_error);
                    }

                    $CBNivel = "SELECT ID, Categoria, Grado FROM Nivel";
                    $result = $conexion->query($CBNivel);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row["ID"] . "'>" . $row["Grado"] . " (" . $row["Categoria"] . ")</option>";
                        }
                    } else {
                        echo "<option value=''>No hay niveles disponibles</option>";
                    }
                ?>