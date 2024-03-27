<?php

namespace Database\Seeders;

use App\Models\Parameter;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ParameterSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('parameters')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        $airframes = [
            'PHANTOM 2',
            'PHANTOM 2 VISION+',
            'PHANTOM 3 STANDARD',
            'PHANTOM 3 ADVANCED',
            'PHANTOM 3 PROFESSIONAL',
            'PHANTOM 4',
            'PHANTOM 4 ADVANCED',
            'PHANTOM 4 ADVANCED+',
            'PHANTOM 4 PRO',
            'PHANTOM 4 PRO+',
            'PHANTOM 4 PRO V2.0',
            'PHANTOM 4 PRO+ V2.0',
            'PHANTOM 4 PRO Obsidian',
            'PHANTOM 4 PRO Obsidian +',
            'PHANTOM 4 RTK',
            'P4 Multispectral',
            'INSPIRE 1',
            'INSPIRE 1 V2.0',
            'INSPIRE 1 PRO',
            'INSPIRE 1 RAW',
            'INSPIRE 2',
            'MAVIC PRO',
            'MAVIC PRO PLATINUM',
            'MAVIC 2 PRO',
            'MAVIC 2 ZOOM',
            'MAVIC 2 ENTERPRISE',
            'MAVIC 2 ENTERPRISE DUAL',
            'MAVIC AIR',
            'MAVIC AIR 2',
            'DJI AIR 2S',
            'DJI FPV',
            'DJI MATRICE 30',
            'DJI MATRICE T30',
            'DJI MAVIC 3',
            'DJI MAVIC 3 Cine',
            'DJI MINI 2',
            'DJI MINI 3',
            'DJI MINI3Pro',
            'MATRICE 100',
            'MATRICE 200',
            'MATRICE 200 V2',
            'MATRICE 210',
            'MATRICE 210 V2',
            'MATRICE 210 RTK',
            'MATRICE 210 RTK V2',
            'MATRICE 300 RTK',
            'MATRICE 600',
            'MATRICE 600 PRO',
            'Spreading Wings S800 EVO',
            'Spreading Wings S900',
            'Spreading Wings S1000',
            'SPARK',
            'AGRAS MG-1',
            'AGRAS MG-1S ADVANCED',
            'AGRAS MG-1P RTK',
            'AGRAS MG-1P',
            'MATRICE 600 PRO for TS',
            'MG-1K',
            'MG-1SAK',
            'MG-1RTK',
            'RMAX (L15)',
            'RMAX TypeIIG(L171)',
            'RMAX TypeII(L172)',
            'RMAX G1 (L20)',
            'FAZER (L30)',
            'FAZER R (L31)',
            'FAZER R G2 (L28)',
            'YMR-08 (L80)',
            'YFA8 (L80)',
            'YMR-08AP (L83)',
            'YMR-08 (L89)',
            'YFA8 (L95)',
            'YFA8AP (L96)',
            'MS-06LA (13inch)',
            'MS-06LA (15inch)',
            'Solo',
            'QC730TS',
            'ARS-S1',
        ];

        $droneTypes = [
            'multi',
            'helicopter',
            'fixed-wing',
            'e-vtol'
        ];

        $flightMethods = [
            'visually',
            'out-of-sight',
            'program'
        ];

        $flightPurposes = [
            'helicopter-shot',
            'training',
            'logistics',
            'inspection',
            'spraying',
            'experiment',
            'others'
        ];

        $manufacturers = [
            'DJI',
            'TOPCON',
            '3D Robotics, Inc.',
        ];

        $noFlyZoneMethods = [
            'flights-around-airports',
            'flight-over-150m',
            'emergency-airspace',
            'did-overflight',
            'night-flight',
            'flight-beyond-visual-line-of-sight',
            'flight-less-than-30m',
            'the-sky-above-the-venue',
            'hazardous-materials-transportation',
            'property-drop',
            'not-applicable'
        ];

        foreach($airframes as $item) {
            Parameter::create([
                'name' => $item,
                'type' => 'AIRFRAME'
            ]);
        }

        foreach($droneTypes as $item) {
            Parameter::create([
                'name' => $item,
                'type' => 'DRONE_TYPE'
            ]);
        }

        foreach($flightMethods as $item) {
            Parameter::create([
                'name' => $item,
                'type' => 'FLIGHT_METHOD'
            ]);
        }

        foreach($flightPurposes as $item) {
            Parameter::create([
                'name' => $item,
                'type' => 'FLIGHT_PURPOSE'
            ]);
        }

        foreach($manufacturers as $item) {
            Parameter::create([
                'name' => $item,
                'type' => 'MANUFACTURER'
            ]);
        }

        foreach($noFlyZoneMethods as $item) {
            Parameter::create([
                'name' => $item,
                'type' => 'NO_FLY_ZONE_METHOD'
            ]);
        }
    }
}
