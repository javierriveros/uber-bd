<?php

namespace App\Http\Controllers;

use App\Factura;
use App\User;
use App\Charts\UserChart;
use Illuminate\Http\Request;

class UserChartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function usuarios()
    {
        $datos = collect([]);
        $dias = collect([]);
        for ($days_backwards = 7; $days_backwards >= 0; $days_backwards--) {
            $datos->push(User::whereDate('created_at', today()->subDays($days_backwards))->count());
            if ($days_backwards == 0)
                $dias->push("Hoy");
            elseif ($days_backwards == 7)
                $dias->push("Hace una semana");
            else
                $dias->push("Hace $days_backwards días");
        }

        $reporte = new UserChart;
        $reporte->title('Flujo de usuarios registrados', 30, "rgb(255, 99, 132)", true);
        $reporte->displayLegend(false);
        $reporte->labels($dias);
        $reporte->dataset('últimos usuarios registrados', 'line', $datos)
            ->backgroundColor('transparent')
            ->color('#007bff');


        return view('charts.users', [ 'reporteUsuarios' => $reporte ] );
    }

    public function facturas()
    {
        $total = Factura::obtenerTotal();
        $datos = collect([]);
        $fechas = collect([]);

        foreach ($total as $dato) {
            $datos->push($dato->total);
            $fechas->push(date('F d Y',strtotime($dato->fecha)));
        }

        $reporte = new UserChart;
        $reporte->title('Ganancia de viajes realizados por día', 30, "rgb(255, 99, 132)", true);
        $reporte->labels($fechas);

        $reporte->dataset('Ganancia del día', 'line', $datos)
            ->color("rgb(255, 99, 132)")
            ->backgroundcolor("rgb(255, 99, 132)")
            ->fill(false);
        $reporte->barwidth(0.0);
        $reporte->displaylegend(false);


        return view('charts.facturas', [ 'reporteFacturas' => $reporte ] );
    }

    public function roles()
    {
        $borderColors = [
            "rgba(255, 99, 132, 1.0)",
            "rgba(22,160,133, 1.0)",
            "rgba(255, 205, 86, 1.0)",
            "rgba(51,105,232, 1.0)",
            "rgba(244,67,54, 1.0)",
            "rgba(34,198,246, 1.0)",
            "rgba(153, 102, 255, 1.0)",
            "rgba(255, 159, 64, 1.0)",
            "rgba(233,30,99, 1.0)",
            "rgba(205,220,57, 1.0)"
        ];
        $fillColors = [
            "rgba(255, 99, 132, 0.2)",
            "rgba(22,160,133, 0.2)",
            "rgba(255, 205, 86, 0.2)",
            "rgba(51,105,232, 0.2)",
            "rgba(244,67,54, 0.2)",
            "rgba(34,198,246, 0.2)",
            "rgba(153, 102, 255, 0.2)",
            "rgba(255, 159, 64, 0.2)",
            "rgba(233,30,99, 0.2)",
            "rgba(205,220,57, 0.2)"

        ];
        $reporte = new UserChart;
        $datos = collect([]);

        $datos->push(User::obtenerPasajeros()->count);
        $datos->push(User::obtenerConductores()->count);
        $datos->push(User::obtenerAdministradores()->count);

        $reporte->labels(['Pasajeros', 'Conductores', 'Administradores']);
        $reporte->title('Reporte de usuarios registrados', 30, "rgb(255, 99, 132)", true);
        $reporte->displayAxes(false);
        $reporte->dataset('Rol de usuario', 'doughnut', $datos)
            ->color($borderColors)
            ->backgroundcolor($fillColors);
        return view('charts.roles', [ 'reporte' => $reporte ] );

    }
}
