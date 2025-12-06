@extends('common::layouts.dashboard.master')
@section('css')
    <style>
        .nav-tabs .nav-link {
            border: none;
            color: #6c757d;
            transition: all 0.3s ease;
            background-color: transparent;
            padding: 0.75rem 1rem;
        }

        .nav-tabs .nav-link:hover {
            color: #1976d2;
            background-color: rgba(25, 118, 210, 0.05);
            border: none;
        }

        .nav-tabs .nav-link.active {
            color: #fff;
            background: linear-gradient(135deg, #1976d2 0%, #64b5f6 100%);
            border: none;
            box-shadow: 0 2px 8px rgba(25, 118, 210, 0.3);
            transform: translateY(-2px);
        }

        .nav-tabs .nav-link.active i {
            color: #fff;
        }

        .card-header {
            background-color: #f8f9fa;
            border-bottom: 2px solid #e9ecef;
        }
    </style>
@endsection

@section('content')
    <div class="container-fluid py-4">
        <!-- Dashboard Header -->
        <div class="bg-gradient-primary text-white rounded-4 p-4 mb-5 shadow"
            style="background: linear-gradient(135deg, #1976d2 0%, #64b5f6 100%);">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center">
                <div>
                    <h1 class="h4 fw-semibold mb-1">
                        <i class="bi bi-building me-2"></i>
                        Building Report Dashboard
                    </h1>
                    <p class="mb-0 opacity-75 small">
                        Mega Building Report for <span class="fw-semibold">{{ $megaBuilding->name }}</span>
                    </p>
                </div>
                <div class="mt-3 mt-md-0 d-flex justify-content-center align-content-center gap-2">
                    <a href="{{ route('index') }}" class="btn btn-light btn-sm rounded-pill d-flex align-items-center"
                        style="font-size: 0.9rem; padding: 0.35rem 1.2rem;">
                        <i class="bi bi-house-door me-1"></i>
                        Home
                    </a>
                    <a href="{{ route('mega-buildings.index') }}"
                        class="btn btn-light btn-sm rounded-pill d-flex align-items-center"
                        style="font-size: 0.9rem; padding: 0.35rem 1.2rem;">
                        <i class="bi bi-building me-1"></i>
                        Mega Buildings
                    </a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <ul class="nav nav-tabs card-header-tabs d-flex" id="reportTabs" role="tablist">
                            <li class="nav-item flex-fill" role="presentation">
                                <button class="nav-link active w-100" id="report-tab" data-bs-toggle="tab"
                                    data-bs-target="#report" type="button" role="tab">
                                    <i class="bi bi-file-text me-2"></i>Report
                                </button>
                            </li>
                            <li class="nav-item flex-fill" role="presentation">
                                <button class="nav-link w-100" id="gauges-tab" data-bs-toggle="tab" data-bs-target="#gauges"
                                    type="button" role="tab">
                                    <i class="bi bi-speedometer2 me-2"></i>Gauges
                                </button>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="reportTabsContent">
                            <!-- Report Tab -->
                            <div class="tab-pane fade show active" id="report" role="tabpanel">
                                <div class="row">
                                    <!-- Left Column: Mega Building and Building Types List -->
                                    <div class="col-md-3">
                                        <!-- Mega Building Section -->
                                        <div class="mb-4 p-3 border rounded" style="background-color: #e3f2fd;">
                                            <h5 class="fw-bold mb-3">MEGA BUILDING</h5>

                                            @foreach (['Sustainable', 'Healthy', 'Intelligent'] as $classification)
                                                <div class="mb-3">
                                                    <h6 class="fw-bold">{{ strtoupper($classification) }}</h6>
                                                    <div class="ms-3">
                                                        <div>Essential Items =
                                                            ({{ $megaBuildingData[$classification]['ap'] }})
                                                        </div>
                                                        <div>Earned Points =
                                                            ({{ $megaBuildingData[$classification]['ep'] }}) of
                                                            ({{ $megaBuildingData[$classification]['total'] }})
                                                        </div>
                                                        <div>Earned Points =
                                                            ({{ $megaBuildingData[$classification]['percentage'] }})% of
                                                            (100)%
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>

                                        <!-- Building Types List -->
                                        <div class="mt-4">
                                            <h6 class="fw-bold mb-3">CONTAINING AND CONNECTING:</h6>
                                            <ol class="ps-3">
                                                @foreach ($buildingTypes as $buildingType)
                                                    <li class="mb-2">{{ $buildingType->name }}</li>
                                                @endforeach
                                            </ol>
                                        </div>
                                    </div>

                                    <!-- Right Column: Building Type Assessments Grid -->
                                    <div class="col-md-9">
                                        <div class="row g-3">
                                            @foreach ($buildingTypes as $buildingType)
                                                <div class="col-md-6 col-lg-4">
                                                    <div class="p-3 border rounded h-100"
                                                        style="background-color: #f5f5f5;">
                                                        <h6 class="fw-bold mb-3 text-center">
                                                            {{ strtoupper($buildingType->name) }}
                                                        </h6>

                                                        @php
                                                            $data = $buildingTypesData[$buildingType->id] ?? [];
                                                        @endphp

                                                        @foreach (['Sustainable', 'Healthy', 'Intelligent'] as $classification)
                                                            <div class="mb-3">
                                                                <h6 class="fw-bold small">{{ strtoupper($classification) }}
                                                                </h6>
                                                                <div class="ms-2 small">
                                                                    <div>Essential Items =
                                                                        ({{ $data[$classification]['ap'] ?? 0 }})
                                                                    </div>
                                                                    <div>Earned Points =
                                                                        ({{ $data[$classification]['ep'] ?? 0 }})
                                                                        of ({{ $data[$classification]['total'] ?? 0 }})
                                                                    </div>
                                                                    <div>Earned Points =
                                                                        ({{ $data[$classification]['percentage'] ?? 0 }})
                                                                        % of
                                                                        (100)%</div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Gauges Tab -->
                            <div class="tab-pane fade" id="gauges" role="tabpanel">
                                <div class="row">
                                    <!-- Left Column: 4 Gauges -->
                                    <div class="col-md-3">
                                        <!-- Main Mega Building Gauge -->
                                        <div class="mb-4 text-center">
                                            <h6 class="fw-bold mb-2">IAM-SHIMB</h6>
                                            <p class="small mb-3">SUSTAINABLE HEALTHY INTELLIGENT MEGA BUILDING</p>
                                            <div id="gauge-mega-building-overall" style="width: 100%; height: 200px;"></div>
                                            <div class="mt-2 p-2 text-white rounded" style="background-color: #FF7043;">
                                                <div class="small" style="font-size: 0.7rem;">EARNED POINTS</div>
                                                @php
                                                    $totalEP =
                                                        $megaBuildingData['Sustainable']['ep'] +
                                                        $megaBuildingData['Healthy']['ep'] +
                                                        $megaBuildingData['Intelligent']['ep'];
                                                    $totalAP =
                                                        $megaBuildingData['Sustainable']['total'] +
                                                        $megaBuildingData['Healthy']['total'] +
                                                        $megaBuildingData['Intelligent']['total'];
                                                @endphp
                                                <div class="fw-bold" style="font-size: 0.75rem;">EP:
                                                    {{ round($totalEP, 2) }} / AP: {{ round($totalAP, 2) }}</div>
                                            </div>
                                        </div>

                                        <!-- Sustainable Across All Building Types -->
                                        <div class="mb-4 text-center">
                                            <div id="gauge-sustainable-all" style="width: 100%; height: 200px;"></div>
                                            <div class="mt-2 p-2 text-white rounded" style="background-color: #64b5f6;">
                                                <div class="small" style="font-size: 0.7rem;">EARNED POINTS</div>
                                                @php
                                                    $sustEP = collect($buildingTypesData)->sum(function ($data) {
                                                        return $data['Sustainable']['ep'] ?? 0;
                                                    });
                                                    $sustAP = collect($buildingTypesData)->sum(function ($data) {
                                                        return $data['Sustainable']['total'] ?? 0;
                                                    });
                                                @endphp
                                                <div class="fw-bold" style="font-size: 0.75rem;">EP:
                                                    {{ round($sustEP, 2) }} / AP: {{ round($sustAP, 2) }}</div>
                                            </div>
                                            <p class="small mt-2 fw-bold">SUSTAINABLE BUILDING</p>
                                        </div>

                                        <!-- Healthy Across All Building Types -->
                                        <div class="mb-4 text-center">
                                            <div id="gauge-healthy-all" style="width: 100%; height: 200px;"></div>
                                            <div class="mt-2 p-2 text-white rounded" style="background-color: #66bb6a;">
                                                <div class="small" style="font-size: 0.7rem;">EARNED POINTS</div>
                                                @php
                                                    $healthEP = collect($buildingTypesData)->sum(function ($data) {
                                                        return $data['Healthy']['ep'] ?? 0;
                                                    });
                                                    $healthAP = collect($buildingTypesData)->sum(function ($data) {
                                                        return $data['Healthy']['total'] ?? 0;
                                                    });
                                                @endphp
                                                <div class="fw-bold" style="font-size: 0.75rem;">EP:
                                                    {{ round($healthEP, 2) }} / AP: {{ round($healthAP, 2) }}</div>
                                            </div>
                                            <p class="small mt-2 fw-bold">HEALTHY BUILDING</p>
                                        </div>

                                        <!-- Intelligent Across All Building Types -->
                                        <div class="mb-4 text-center">
                                            <div id="gauge-intelligent-all" style="width: 100%; height: 200px;"></div>
                                            <div class="mt-2 p-2 text-white rounded" style="background-color: #ff9800;">
                                                <div class="small" style="font-size: 0.7rem;">EARNED POINTS</div>
                                                @php
                                                    $intelEP = collect($buildingTypesData)->sum(function ($data) {
                                                        return $data['Intelligent']['ep'] ?? 0;
                                                    });
                                                    $intelAP = collect($buildingTypesData)->sum(function ($data) {
                                                        return $data['Intelligent']['total'] ?? 0;
                                                    });
                                                @endphp
                                                <div class="fw-bold" style="font-size: 0.75rem;">EP:
                                                    {{ round($intelEP, 2) }} / AP: {{ round($intelAP, 2) }}</div>
                                            </div>
                                            <p class="small mt-2 fw-bold">INTELLIGENT BUILDING</p>
                                        </div>
                                    </div>

                                    <!-- Middle Column: Building Types with Gauges -->
                                    <div class="col-md-9">
                                        @php
                                            $buildingTypesChunks = $buildingTypes->chunk(5);
                                        @endphp

                                        @foreach ($buildingTypesChunks as $chunk)
                                            <div class="row mb-4">
                                                @foreach ($chunk as $buildingType)
                                                    <div class="col">
                                                        @php
                                                            $data = $buildingTypesData[$buildingType->id] ?? [];
                                                            $totalEP =
                                                                ($data['Sustainable']['ep'] ?? 0) +
                                                                ($data['Healthy']['ep'] ?? 0) +
                                                                ($data['Intelligent']['ep'] ?? 0);
                                                            $totalAP =
                                                                ($data['Sustainable']['total'] ?? 0) +
                                                                ($data['Healthy']['total'] ?? 0) +
                                                                ($data['Intelligent']['total'] ?? 0);
                                                        @endphp

                                                        <!-- Building Type Overall Gauge -->
                                                        <div class="text-center mb-3">
                                                            <div id="gauge-building-type-{{ $buildingType->id }}"
                                                                style="width: 100%; height: 180px;"></div>
                                                            <div class="mt-2 p-2 text-white rounded"
                                                                style="background-color: #b39ddb;">
                                                                <div class="small" style="font-size: 0.7rem;">EARNED
                                                                    POINTS</div>
                                                                <div class="fw-bold" style="font-size: 0.75rem;">EP:
                                                                    {{ round($totalEP, 2) }} / AP:
                                                                    {{ round($totalAP, 2) }}</div>
                                                            </div>
                                                            <p class="small mt-2 fw-bold" style="white-space: nowrap;">
                                                                {{ strtoupper($buildingType->name) }}</p>
                                                        </div>

                                                        <!-- Sustainable Gauge -->
                                                        <div class="text-center mb-3">
                                                            <div id="gauge-sustainable-{{ $buildingType->id }}"
                                                                style="width: 100%; height: 180px;"></div>
                                                            <div class="mt-2 p-2 text-white rounded"
                                                                style="background-color: #64b5f6;">
                                                                <div class="small" style="font-size: 0.7rem;">EARNED
                                                                    POINTS</div>
                                                                <div class="fw-bold" style="font-size: 0.75rem;">EP:
                                                                    {{ round($data['Sustainable']['ep'] ?? 0, 2) }} / AP:
                                                                    {{ round($data['Sustainable']['total'] ?? 0, 2) }}
                                                                </div>
                                                            </div>
                                                            <p class="small mt-2 fw-bold">SUSTAINABLE BUILDING</p>
                                                        </div>

                                                        <!-- Healthy Gauge -->
                                                        <div class="text-center mb-3">
                                                            <div id="gauge-healthy-{{ $buildingType->id }}"
                                                                style="width: 100%; height: 180px;"></div>
                                                            <div class="mt-2 p-2 text-white rounded"
                                                                style="background-color: #66bb6a;">
                                                                <div class="small" style="font-size: 0.7rem;">EARNED
                                                                    POINTS</div>
                                                                <div class="fw-bold" style="font-size: 0.75rem;">EP:
                                                                    {{ round($data['Healthy']['ep'] ?? 0, 2) }} / AP:
                                                                    {{ round($data['Healthy']['total'] ?? 0, 2) }}</div>
                                                            </div>
                                                            <p class="small mt-2 fw-bold">HEALTHY BUILDING</p>
                                                        </div>

                                                        <!-- Intelligent Gauge -->
                                                        <div class="text-center mb-3">
                                                            <div id="gauge-intelligent-{{ $buildingType->id }}"
                                                                style="width: 100%; height: 180px;"></div>
                                                            <div class="mt-2 p-2 text-white rounded"
                                                                style="background-color: #ff9800;">
                                                                <div class="small" style="font-size: 0.7rem;">EARNED
                                                                    POINTS</div>
                                                                <div class="fw-bold" style="font-size: 0.75rem;">EP:
                                                                    {{ round($data['Intelligent']['ep'] ?? 0, 2) }} / AP:
                                                                    {{ round($data['Intelligent']['total'] ?? 0, 2) }}
                                                                </div>
                                                            </div>
                                                            <p class="small mt-2 fw-bold">INTELLIGENT BUILDING</p>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <!-- JustGage Library -->
    {{-- <script src="https://cdn.jsdelivr.net/npm/raphael@2.3.0/raphael.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/justgage@1.6.1/justgage.min.js"></script> --}}

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Function to apply gradient to gauge (from items/index.blade.php)
            function applyGradient(gaugeId, gradientId, colors, bgColor) {
                setTimeout(function() {
                    const gaugeElement = document.getElementById(gaugeId);
                    if (!gaugeElement) return;

                    const svg = gaugeElement.querySelector('svg');
                    if (!svg) return;

                    const defs = svg.querySelector('defs') || svg.insertBefore(
                        document.createElementNS('http://www.w3.org/2000/svg', 'defs'),
                        svg.firstChild
                    );

                    defs.querySelector('#' + gradientId)?.remove();

                    const gradient = document.createElementNS('http://www.w3.org/2000/svg',
                        'linearGradient');
                    gradient.setAttribute('id', gradientId);
                    gradient.setAttribute('x1', '0%');
                    gradient.setAttribute('y1', '0%');
                    gradient.setAttribute('x2', '100%');
                    gradient.setAttribute('y2', '0%');

                    colors.forEach(([offset, color]) => {
                        const stop = document.createElementNS('http://www.w3.org/2000/svg', 'stop');
                        stop.setAttribute('offset', offset);
                        stop.setAttribute('stop-color', color);
                        stop.setAttribute('stop-opacity', '1');
                        gradient.appendChild(stop);
                    });

                    defs.appendChild(gradient);

                    svg.querySelectorAll('path').forEach(function(path) {
                        const fill = path.getAttribute('fill');
                        if (fill && fill !== '#ffffff' && fill !== bgColor && fill !== 'none') {
                            path.setAttribute('fill', 'url(#' + gradientId + ')');
                        }
                    });
                }, 100);
            }

            // Function to create gauge with proper colors
            function createGauge(id, value, title, gaugeColor, levelColor, gradientId, gradientColors) {
                const gauge = new JustGage({
                    id: id,
                    value: Math.min(value, 100), // Cap at 100%
                    min: 0,
                    max: 100,
                    title: title,
                    label: "%",
                    gaugeWidthScale: 0.6,
                    pointer: true,
                    counter: true,
                    decimals: 2,
                    gaugeColor: gaugeColor,
                    levelColors: [levelColor],
                    textRenderer: function(value) {
                        return value.toFixed(2) + "%";
                    }
                });

                applyGradient(id, gradientId, gradientColors, gaugeColor);
                return gauge;
            }

            // Initialize gauges when gauges tab is shown
            const gaugesTab = document.getElementById('gauges-tab');
            let gaugesInitialized = false;

            gaugesTab.addEventListener('shown.bs.tab', function() {
                if (gaugesInitialized) return;
                gaugesInitialized = true;

                // Left Column Gauges
                // Mega Building - coral-orange gradient
                createGauge('gauge-mega-building-overall', {{ $overallMegaBuildingPercentage }},
                    'IAM-SHIMB',
                    '#fff4f0', '#ffe0d6', 'megaBuildingGradient',
                    [
                        ['0%', '#FFB380'],
                        ['50%', '#FF7043'],
                        ['100%', '#D84315']
                    ]);

                // Sustainable - blue gradient
                createGauge('gauge-sustainable-all', {{ $averageSustainable }}, 'SUSTAINABLE',
                    '#f3f7fc', '#e3f2fd', 'sustainableGradient',
                    [
                        ['0%', '#90caf9'],
                        ['50%', '#64b5f6'],
                        ['100%', '#1565c0']
                    ]);

                // Healthy - green gradient
                createGauge('gauge-healthy-all', {{ $averageHealthy }}, 'HEALTHY',
                    '#f5f8f4', '#e5f7e5', 'healthyGradient',
                    [
                        ['0%', '#81c784'],
                        ['50%', '#66bb6a'],
                        ['100%', '#1b5e20']
                    ]);

                // Intelligent - orange gradient
                createGauge('gauge-intelligent-all', {{ $averageIntelligent }}, 'INTELLIGENT',
                    '#fff8f0', '#ffe0b2', 'intelligentGradient',
                    [
                        ['0%', '#ffb74d'],
                        ['50%', '#ff9800'],
                        ['100%', '#e65100']
                    ]);

                // Building Type Overall Gauges - purple gradient
                @foreach ($buildingTypes as $buildingType)
                    createGauge('gauge-building-type-{{ $buildingType->id }}',
                        {{ $buildingTypesOverall[$buildingType->id] ?? 0 }},
                        '{{ strtoupper($buildingType->name) }}',
                        '#f5f0ff', '#e0d7ff', 'buildingTypeGradient{{ $buildingType->id }}',
                        [
                            ['0%', '#d1c4e9'],
                            ['50%', '#b39ddb'],
                            ['100%', '#673ab7']
                        ]);
                @endforeach

                // Classification Gauges for each Building Type
                @foreach ($buildingTypes as $buildingType)
                    @php
                        $data = $buildingTypesData[$buildingType->id] ?? [];
                    @endphp
                    // Sustainable
                    createGauge('gauge-sustainable-{{ $buildingType->id }}',
                        {{ $data['Sustainable']['percentage'] ?? 0 }}, 'SUSTAINABLE',
                        '#f3f7fc', '#e3f2fd', 'sustainableGradient{{ $buildingType->id }}',
                        [
                            ['0%', '#90caf9'],
                            ['50%', '#64b5f6'],
                            ['100%', '#1565c0']
                        ]);

                    // Healthy
                    createGauge('gauge-healthy-{{ $buildingType->id }}',
                        {{ $data['Healthy']['percentage'] ?? 0 }}, 'HEALTHY',
                        '#f5f8f4', '#e5f7e5', 'healthyGradient{{ $buildingType->id }}',
                        [
                            ['0%', '#81c784'],
                            ['50%', '#66bb6a'],
                            ['100%', '#1b5e20']
                        ]);

                    // Intelligent
                    createGauge('gauge-intelligent-{{ $buildingType->id }}',
                        {{ $data['Intelligent']['percentage'] ?? 0 }}, 'INTELLIGENT',
                        '#fff8f0', '#ffe0b2', 'intelligentGradient{{ $buildingType->id }}',
                        [
                            ['0%', '#ffb74d'],
                            ['50%', '#ff9800'],
                            ['100%', '#e65100']
                        ]);
                @endforeach
            });
        });
    </script>
@endsection
