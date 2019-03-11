<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>KARDEX DE CALIFICACIONES</title>
    <style>
        .rTable {
            display: table;
            width: 100%;
        }
        .rTableRow {
            display: table-row;
        }
        .rTableHeading {
            display: table-header-group;
            background-color: #ddd;
        }
        .rTableCell, .rTableHead {
            display: table-cell;
            padding: 3px 10px;
            border: 1px solid #999999;
        }
        .rTableHeading {
            display: table-header-group;
            background-color: #ddd;
            font-weight: bold;
        }
        .rTableFoot {
            display: table-footer-group;
            font-weight: bold;
            background-color: #ddd;
        }
        .rTableBody {
            display: table-row-group;
        }

        /*Index*/

    </style>
</head>
<body>
    <?php    //$period = App\Models\Period::find(2);
    $user = App\User::find(Auth::user()->id);
    $student = $user->student;
    //$matters = $student->matters->where('period', $period->id);
    $matters = $student->matters;
    $conteo = count($matters);
    $periods = $matters;
    $reports = $student->reports;
    $conta = App\Models\Report::where('student_id', $student->id)->count();
    ?>
    <table style=" border: gray 5px solid;">    
            <thead>
             <tr>
                <th style="background-color: #3c8dbc; color:white;";>No. Control</th>
                <th style="background-color: #3c8dbc; color:white";>Nombre del Alumno</th>
                <th colspan="2" style="background-color: #3c8dbc; color:white;";>Semestre</th>
            </tr>
            <tr>
                <th>{{ $student->enrollment }}</th>
                <th>{{ $student->fullname }}</th>
                <th colspan="2">{{ $student->lapse }}</th>
            </tr> 
            <tr>
                <th style="background-color: #3c8dbc; color:white;";>Ciclo de Estudios</th>
                <th colspan="2" style="background-color: #3c8dbc; color:white;";><center>Carrera</center></th>
                <th colspan="2" style="background-color: #3c8dbc; color:white;";><center>Grupo</center></th>          
            </tr>  
            <tr>
                <th>Bachillerato</th>
                <th colspan="2"><center>{{ $student->degree }}</center></th>
                <th colspan="2"><center>{{ $student->group }}</center></th>
            </tr> 
        </thead>
        </table>
        <br>
        <br>
        <br>
        <br>
        <br>
    <div class="rTable">
        <div class="rTableRow">
            <div class="rTableHead"><strong>Id</strong></div>
            <div class="rTableHead"><span style="font-weight: bold;">Materia</span></div>
            <div class="rTableHead"><span style="font-weight: bold;">Periodo</span></div>
            <div class="rTableHead"><span style="font-weight: bold;">Promedio</span></div>
        </div>

        <?php      
        foreach ($matters as $matter) {
            $id_materia = $matter->id;
            $evaluations = App\Models\Evaluation::where('student_id', $student->id)->where('matter_id', $matter->id)->get();
            $conta = App\Models\Evaluation::where('student_id', $student->id)->where('matter_id', $matter->id)->count();
            $sum = App\Models\Evaluation::where('student_id', $student->id)->where('matter_id', $matter->id)->sum('calification');
            if ($conta > 0) {
                $promedio = $sum / $conta;
            }else
            {
                $promedio = 'Sin captura de calificación';  
            } 

            $period = App\Models\Period::find($matter->period);
            ?>
            <div class="rTableRow">
                <div class="rTableCell">{{$matter->id}}</div>
                <div class="rTableCell">{{$matter->name}}</div>
                <div class="rTableCell">{{$period->period}}</div>
                <div class="rTableCell">{{$promedio}}</div>
            </div>
            <?php
        }
        ?>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>
    </body>
    </html>